<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Pembayaran;
use App\Models\Kategori;
use App\Models\Pembelian;
use App\Models\Layanan;
use App\Http\Controllers\VipResellerController;
use App\Http\Controllers\digiFlazzController;
use App\Http\Controllers\ApiGamesController;
use App\Http\Controllers\GamePoint;
use App\Http\Controllers\BangjeffController;
use App\Http\Controllers\MengtopupController;
use App\Http\Controllers\AlpharamzController;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;

class LinkquController extends Controller
{
    private $user;
    private $pin;
    private $secretKey;
    private $clientId;
    private $clientSecret;
    private $endpoint;

    public function __construct($username, $pin, $secretKey, $clientId, $clientSecret)
    {
        $this->user = $username;
        $this->pin = $pin;
        $this->secretKey = $secretKey;
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
        $this->endpoint = 'https://gateway.linkqu.id/';
    }

    public function cekSaldoLQ()
    {
        $url = 'linkqu-partner/akun/resume?username=' . $this->user;
        return $this->sendRequest('GET', $url);
    }

    public function dataBankLQ()
    {
        $url = 'linkqu-partner/masterbank/list';
        return $this->sendRequest('GET', $url);
    }

    public function dataEmoneyLQ()
    {
        $url = 'linkqu-partner/data/emoney?username=' . $this->user;
        $response = $this->sendRequest('GET', $url);
        return $response['data'][0]['dataproduk'];
    }

    public function cekTrxLQ($partner_reff)
    {
        $url = 'linkqu-partner/transaction/payment/checkstatus?username=' . $this->user . '&partnerreff=' . $partner_reff;
        $response = $this->sendRequest('GET', $url);
        return $response;
        //return ($response['rd'] === 'Transaksi tidak ditemukan') ? ['status' => 'Pending'] : $response['data'];
    }

    public function qrisLQ($amount, $partner_reff, $customer_id, $customer_name, $expired, $customer_phone, $customer_email)
    {
        $path = '/transaction/create/qris';
        $method = 'POST';
        $firstValue = $path . $method;
        $secondValue = strtolower(preg_replace('/[^0-9a-zA-Z]/', '', $amount . $expired . $partner_reff . $customer_id . $customer_name . $customer_email . $this->clientId));
        $data = [
            'amount' => $amount,
            'partner_reff' => $partner_reff,
            'customer_id' => $customer_id,
            'customer_name' => $customer_name,
            'expired' => $expired,
            'username' => $this->user,
            'pin' => $this->pin,
            'customer_phone' => $customer_phone,
            'customer_email' => $customer_email,
            'signature' => hash_hmac('sha256', $firstValue . $secondValue, $this->secretKey),
        ];

        $url = 'linkqu-partner/transaction/create/qris';
        return $this->sendRequest('POST', $url, $data);
    }
    
    

    private function sendRequest($method, $url, $data = [])
    {
        $headers = [
            'client-id' => $this->clientId,
            'client-secret' => $this->clientSecret,
        ];

        try {
            $response = Http::withHeaders($headers)->$method($this->endpoint . $url, $data);
            return $response->json();
        } catch (\Exception $e) {
            Log::error('Linkqu Request Failed: ' . $e->getMessage());
            throw new \Exception($e->getMessage());
        }
    }
    
    public function handle(Request $request)
    {
        info($request);
        if (
        !$request->has('username') ||
        !$request->has('va_code') ||
        !$request->has('transaction_time') ||
        !$request->has('qris_id') ||
        !$request->has('amount') ||
        !$request->has('customer_name') ||
        !$request->has('additionalfee') ||
        !$request->has('status') ||
        !$request->has('partner_reff') ||
        !$request->has('payment_reff') ||
        !$request->has('credit_balance') ||
        !$request->has('balance') ||
        !$request->has('serialnumber') ||
        !$request->has('type') ||
        !$request->has('issuer_bank') ||
        !$request->has('rrn') ||
        !$request->has('signature')
    ) {
        return response()->json(['status' => false], 422);
    }

    $username = env('LINKQU_USERNAME');
    $vaCode = "QRIS";
    $transactionTime = $request->input('transaction_time');
    $qrisId = $request->input('qris_id');
    $amount = $request->input('amount');
    $customerName = $request->input('customer_name');
    $additionalFee = $request->input('additionalfee');
    $status = $request->input('status');
    $partnerReff = $request->input('partner_reff');
    $paymentReff = $request->input('payment_reff');
    $creditBalance = $request->input('credit_balance');
    $balance = $request->input('balance');
    $serialNumber = $request->input('serialnumber');
    $type = $request->input('type');
    $issuerBank = $request->input('issuer_bank');
    $rrn = $request->input('rrn');
    $signature = $request->input('signature');
        
        $pembayaran = Pembayaran::latest()->first();
        info($pembayaran);
        if ($pembayaran->status == 'Lunas') {
            return response()->json(['status' => false, 'message' => 'Pesanan Telah Sukses'], 404);
        }
        if(!$pembayaran) return response()->json(['status' => false, 'message' => 'Payment not found'], 404);
        
        $pembelian = Pembelian::where('order_id', $pembayaran->order_id)->first();
        info($pembelian);
        if($status == "FAILED"){
            $pembayaran->update([
                'status'  => 'Batal'
            ]);
            
            $pembelian->update([
                'status'  => 'Batal'
            ]);
            
            return response()->json(['status' => false, 'message' => 'success']);
        }
        
        $pesan = 
            "*PEMBAYARAN BERHASIL*\n\n" .
            // "No. Invoice: *$order_id*\n" .
            "Invoice : " . env("APP_URL") . "/pembelian/invoice/".$pembayaran->order_id."\n" .
            "Layanan : *$pembelian->layanan*\n" .
            // "Data : *$dataPembeli->user_id $zoneSend*\n" .
            "Jumlah : *Rp. " . number_format($pembelian->harga, 0, '.', '.') . ",-*\n" .
            "Status Pembayaran : *Dibayar*\n" .
            "Metode Pembayaran : *$pembayaran->metode*\n\n" .
            "Mohon ditunggu ya, kami sedang memproses pesanan mu ;)\n\n" .
            "*Estimasi proses :*\n" .
            "• 0-5 Menit, max 24 Jam.\n\n" .
            "© ". env("APP_NAME") ."";

        $pesanAdmin =
            "*PEMBAYARAN BERHASIL*\n\n" .
            "Invoice : " . env("APP_URL") . "/pembelian/invoice/".$pembayaran->order_id."\n" .
            "Layanan : *$pembelian->layanan*\n" .
            // "Data : *$dataPembeli->user_id $zoneSend*\n" .
            "Jumlah : *Rp. " . number_format($pembelian->harga, 0, '.', '.') . ",-*\n" .
            "Status Pembayaran : *Dibayar*\n" .
            "Metode Pembayaran : *$pembayaran->metode*\n\n" .
            "*KONTAK PEMBELI*\n" .
            "No. HP : $pembayaran->no_pembeli\n\n" .
            "© ". env("APP_NAME") ."";        
            
        // $requestPesan = $this->msg($this->api->nomor_admin, $pesanAdmin);
        // $pesanPembeli = $this->msg($pembayaran->no_pembeli, $pesan);            
        
        $layanan = Layanan::where('layanan', $pembelian->layanan)->first();
        
        if(!$layanan) return response()->json(['status' => false, 'message' => 'Service not found'], 404);
        
        $kategori = Kategori::where('id', $layanan->kategori_id)->first();
        
        $pembayaran->update(['status' => 'Lunas']);
        
        if($layanan->provider == "digiflazz"){
            $provider_order_id = rand(1, 10000);
            $digiFlazz = new digiFlazzController;
            $order = $digiFlazz->order($pembelian->user_id, $pembelian->zone, $layanan->provider_id, $provider_order_id);

            if ($order['data']['status'] == "Pending" || $order['data']['status'] == "Sukses") {
                $order['data']['status'] = true;
                $order['transactionId'] = $provider_order_id;
            } else {
                $order['data']['status'] = false;
            }
        }else if($layanan->provider == "vip"){
            $vip = new VipResellerController;
            $order = $vip->order($pembelian->user_id, $pembelian->zone, $layanan->provider_id);
            // Log::info(json_encode($order));
            if($order['result']){
                $order['data']['status'] = $order['result'];
                $order['transactionId'] = $order['data']['trxid'];
            }else{
                $order['data']['status'] = false;
            }
        }else if($layanan->provider == "irvankede"){
            $irvan = new IrvanKedeController;
            $order = $irvan->order(array('service' => $layanan->provider_id,'target' => $pembelian->user_id,'quantity' => $pembelian->zone));
            
            if($order['status']){
                $order['data']['status'] = $order['status'];
                $order['transactionId'] = $order['data']['id'];
            }else{
                $order['data']['status'] = false;
            }
        }else if($layanan->provider == "apigames"){
            $provider_order_id = rand(1, 10000);
            $apigames = new ApiGamesController;
            $order = $apigames->order($pembelian->user_id, $pembelian->zone, $layanan->provider_id, $provider_order_id);

            if($order['data']['status'] == "Sukses"){
                $order['transactionId'] = $provider_order_id;
                $order['data']['status'] = true;
            }else{
                $order['data']['status'] = false;
            }
        }else if($layanan->provider == "gamepoint"){
            $gp = new GamePoint;
            $order = $gp->order($pembayaran->order_id, $layanan->provider_id, $pembelian->user_id, $pembelian->zone);
            
            if($order['status']){
                $order['data']['status'] = true;
                $order['transactionId'] = $order['transactionId'];
            }else{
                $order['data']['status'] = false;
            } 
        }else if($layanan->provider == "bangjeff"){
            $bang = new BangjeffController;
            $order = $bang->order($pembelian->user_id, $pembelian->zone, $layanan->provider_id);
            
            if($order['success']){
                $order['data']['status'] = true;
                $order['transactionId'] = $order['data']['invoice_number'];
            }else{
                $order['data']['status'] = false;
            }
        }else if($layanan->provider == "meng"){
            $meng = new MengtopupController;
            $order = $meng->order($pembelian->user_id, $pembelian->zone, $layanan->provider_id);
            
            if($order['status']){
                $order['data']['status'] = true;
                $order['transactionId'] = $order['data']['id'];
            }else{
                $order['data']['status'] = false;
            }
        }else if($layanan->provider == "alpha"){
            $alpha = new AlpharamzController;
            $order = $alpha->order($pembelian->user_id, $pembelian->zone, $layanan->provider_id);
            
            if($order['status']){
                $order['data']['status'] = true;
                $order['transactionId'] = $order['data']['id'];
            }else{
                $order['data']['status'] = false;
            }
        }else if($layanan->provider == "smileone"){
            $smile = new SmileOneController;
                $provider_ids = explode(',',$layanan->provider_id);
                foreach($provider_ids as $provider_id){
                $order = $smile->order($pembelian->user_id, $pembelian->zone, $provider_id);
                if($order['status']){
                    $poid[] = $order['transactionId'];
                }else{
                    $poid[] = false;
                }
                $buy['status'] = true;
            }   
        }else{
            $order = array(
                'data' => array('status' => true),
                'transactionId' => "Manual"
            );
        }
        
        if($order['data']['status']){
            $pesanSukses = 
            "*PESANAN SUKSES*\n\n" .
            "Invoice : " . env("APP_URL") . "/pembelian/invoice/".$pembelian->order_id."\n" .
            "Layanan : *$pembelian->layanan*\n" .
            // "Data : *$dataPembeli->user_id ($dataPembeli->zone)*\n" .
            "Harga : *Rp. " . number_format($pembelian->harga, 0, '.', '.') . ",-*\n" .
            "Status Pesanan : *Sukses*\n\n" .
            "Terima kasih, sudah berbelanja. ;)\n\n" .
            "© ". env("APP_NAME") ."";
           
           $pesanSuksesAdmin = 
            "*PESANAN SUKSES*\n\n" .
            "Invoice : " . env("APP_URL") . "/pembelian/invoice/".$pembelian->order_id."\n" .
            "Layanan: *$pembelian->layanan*\n" .
            // "Data : *$dataPembeli->user_id ($dataPembeli->zone)*\n" .
            "Harga: *Rp. " . number_format($pembelian->harga, 0, '.', '.') . ",-*\n" .
            "Status Pesanan : *Sukses*\n\n" .
            "*KONTAK PEMBELI*\n" .
            "No. HP : $pembayaran->no_pembeli\n\n" .
            "© ". env("APP_NAME") ."";    
            
            $pembelian->update([
                'provider_order_id' => isset($order['transactionId']) ? $order['transactionId'] : 0,
                'status' => 'Pending',
                'log' => json_encode($order)
            ]);
            
            // $requestPesan = $this->msg($this->api->nomor_admin, $pesanSuksesAdmin);
            // $pesanPembeli = $this->msg($pembayaran->no_pembeli, $pesanSukses);            
        }else{
            $pembelian->update([
                'log' => json_encode($order),
                'status' => 'Batal'
            ]);
        }
            
        return response()->json(['status' => true]);
    }
}