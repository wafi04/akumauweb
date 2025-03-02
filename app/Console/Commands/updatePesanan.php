<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Pembelian;
use App\Models\Layanan;
use App\Models\Kategori;
use App\Http\Controllers\digiFlazzController;
use App\Http\Controllers\ApiGamesController;
use App\Http\Controllers\ApiCheckController;
use App\Models\Pembayaran;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderSuccess;
use Carbon\Carbon;

class updatePesanan extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'updatePesanan';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $pesanan = Pembelian::whereIn('status', ['Pending', 'Processing'])->get();
        
        $digiFlazz = new digiFlazzController;
        $apigames = new ApiGamesController;
        $apicheck = new ApiCheckController();

        foreach($pesanan as $data)
        {
            $orderCreatedTime = Carbon::parse($data->created_at);
            $currentTime = Carbon::now();
            $minutesDifference = $currentTime->diffInMinutes($orderCreatedTime);

            // Cancel the order if it's been pending for more than 60 minutes
            if ($minutesDifference > 1500) {
                Pembelian::where('provider_order_id', $data->provider_order_id)
                    ->update(['status' => 'Batal', 'log' => 'Order cancelled due to timeout']);
                continue;
            }

            $layanan = Layanan::where('layanan', $data->layanan)->first();
            if(!$layanan) continue;

            // Check if the provider is manual
            if ($layanan->provider == 'manual') {
                // Skip further processing for manual providers
                continue;
            }

            $pesan = "Pembelian *$data->layanan* Telah Berhasil Dikirim\n\nTerima kasih Sudah Order Di vazzuniverse.id\n\n- Follow Instagram kami :\n\n*".
                     "Informasi\nIni Adalah Bot Notifikasi, Jika Kamu Mengalami Kendala Harap Hubungi Admin\n".
                     "Whatsapp : ".env('NOMOR_ADMIN');

            $pembayaran = Pembayaran::where('order_id', $data->order_id)->first();
            if(!$pembayaran || $pembayaran->status !=='Lunas'){
                continue;
            }

            try {
                $providerId = $layanan->provider_id;
                $provider_order_id = $data->provider_order_id;
                $uid = $data->user_id;
                $zone = $data->zone;

                if ($layanan->provider == "digiflazz") {
                    $checking = $digiFlazz->status($provider_order_id, $providerId, $uid, $zone);
                } else if ($layanan->provider == "apigames") {
                    $checking = $apigames->status($provider_order_id);
                } else {
                    $checking['data']['status'] = "success";
                    $checking['data']['sn'] = $data->order_id;
                }

                $status_pembelian = '';
                $status_check = false;

                if (strtolower($checking['data']['status']) == "sukses" || strtolower($checking['data']['status']) == "success") {
                    $status_check = true;
                    $status_pembelian = "Success";
                    if (isset($checking['data']['sn']) || isset($checking['data'][0]['note'])) {
                        $sn = isset($checking['data']['sn']) ? $checking['data']['sn'] : $checking['data'][0]['note'];
                    }
                } else if ($checking['data']['status'] == "Gagal" || $checking['data']['status'] == "Error" || 
                           $checking['data']['status'] == "error" || $checking['data']['status'] == "Partial") {
                    if ($checking['data']['status'] == "Partial" || strtolower($checking['data']['status']) == "error") {
                        $remains = isset($checking['data']['remains']) ? $checking['data']['remains'] : 0;
                    }

                    $status_check = true;
                    $status_pembelian = "Batal";
                }

                if ($status_check) {
                    if ($status_pembelian == "Success") {
                        $requestPesan = $this->msg($pembayaran->no_pembeli, $pesan); 
                        Pembelian::where('provider_order_id', $provider_order_id)
                            ->update(['status' => $status_pembelian, 'sn' => $sn, 'log' => json_encode($checking)]);
                    } else {
                        if ($status_pembelian == "Batal") {
                            if (isset($remains)) {
                                $data->harga *= $remains / $data->zone;
                            }

                            $user = User::where('username', $data->username)->first();
                            if ($user) {
                                $user->update(['balance' => $user->balance + $data->harga]);
                            }
                        }

                        Pembelian::where('provider_order_id', $provider_order_id)
                            ->update(['status' => $status_pembelian, 'log' => json_encode($checking)]);
                    }
                } else {
                    // Handle cases where status check failed
                }
            } catch (\Exception $e) {
                throw $e;
            }
        }
    }

    public function msg($nomor, $msg)
    {
        $api = \DB::table('setting_webs')->where('id', 1)->first();
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => 'https://api.fonnte.com/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => [
                'target' => $nomor . '|Fonnte|Admin', 
                'message' => $msg, 
            ],
            CURLOPT_HTTPHEADER => [
                'Authorization: xczczcdscs'
            ],
        ]);

        $response = curl_exec($curl);
        if (curl_errno($curl)) {
            $error_msg = curl_error($curl);
        }
        curl_close($curl);

        if (isset($error_msg)) {
            return $error_msg;
        }
        return $response;
    }
}
