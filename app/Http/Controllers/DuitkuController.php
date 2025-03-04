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
use App\Http\Controllers\MooGold;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class DuitkuController extends Controller
{

    public $key,$merchant, $api;

    public function __construct()
    {
        $this->key = ENV("DUITKU_KEY");
        $this->merchant = ENV("DUITKU_MERCHANT");
        $this->api = \DB::table('setting_webs')->where('id',1)->first();
    }

  public function request($amount, $method, $refid, $phone, $email)
{   
    
    $params = [
        'merchantCode' => $this->merchant,
        'paymentAmount' => $amount,
        'merchantOrderId' => $refid,
        'productDetails' => 'Pembayaran #'.$refid,
        'email' => $email,
        'paymentMethod' => $method,
        'customerVaName' => env("APP_NAME"),
        'phoneNumber' => $phone,
        'returnUrl' => route('pembelian', [$refid]),
        'callbackUrl' => env("APP_URL").'/callback',
        'signature' => md5($this->merchant.$refid.$amount.$this->key),
        'expiryPeriod' => 3600
    ];

    $request = $this->connect("https://passport.duitku.com/webapi/api/merchant/v2/inquiry", $params);

    // Log response for debugging
    Log::info('Duitku API Response:', ['request' => $params, 'response' => $request]);

    if (!isset($request['statusCode'])) {
        return array('success' => false, 'message' => 'Invalid response from API: ' . json_encode($request));
    }

    if ($request['statusCode'] != "00") {
        return array('success' => false, 'message' => 'Error from API: ' . $request['statusMessage']);
    }

    if (in_array($method, ["DA", "SA", "OV", "OL", "LA", "FT", "NQ", "SP"])) {
        return array(
            'success' => true,
            'no_pembayaran' => $request['paymentUrl'],
            'reference' => $request['reference'],
            'amount' => isset($request['amount']) ? $request['amount'] : $amount,
            'data' => $request
        );
    } else {
        return array(
            'success' => true,
            'no_pembayaran' => $request['vaNumber'],
            'reference' => $request['reference'],
            'amount' => isset($request['amount']) ? $request['amount'] : $amount,
            'data' => $request
        );
    }
}

    
    public function method()
    {
        $datetime = date('Y-m-d H:i:s');  
        $amount = 10000;
        $signature = hash('sha256',$this->merchant.$amount.$datetime.$this->key);
    
        $params = array(
            'merchantcode' => $this->merchant,
            'amount' => $amount,
            'datetime' => $datetime,
            'signature' => $signature
        );
        
        $request = $this->connect("https://passport.duitku.com/webapi/api/merchant/paymentmethod/getpaymentmethod", $params);
        return $request;
    }
    
    public function fee($jumlah, $code)
    {
        $datetime = date('Y-m-d H:i:s');  
        $amount = 10000;
        $signature = hash('sha256',$this->merchant.$amount.$datetime.$this->key);
    
        $params = array(
            'merchantcode' => $this->merchant,
            'amount' => $amount,
            'datetime' => $datetime,
            'signature' => $signature
        );
        
        $request = $this->connect("https://passport.duitku.com/webapi/api/merchant/paymentmethod/getpaymentmethod", $params);
        foreach ($request['paymentFee'] as $val) {
            if ($val['paymentMethod'] == $code) {
                return $val['totalFee'];
            }
        }
    }
    
    public function handle(Request $request)
    {
        if(!$request->merchantCode || !$request->amount || !$request->merchantOrderId || !$request->signature || !$request->reference){
            return response()->json(['status' => false], 422);
        }
        
        $params = md5($request->merchantCode . $request->amount . $request->merchantOrderId . $this->key);
        
        if($params != $request->signature) return response()->json(['status' => false, 'message' => 'Invalid signature'], 422);
        
        $pembayaran = Pembayaran::where('reference', $request->reference)->where('status', 'Belum Lunas')->first();
        
        if(!$pembayaran) return response()->json(['status' => false, 'message' => 'Payment not found'], 404);
        
        $pembelian = Pembelian::where('order_id', $pembayaran->order_id)->first();
        // Log::info($request->resultCode);
        if($request->resultCode == "01"){
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
            
        $requestPesan = $this->msg($this->api->nomor_admin, $pesanAdmin);
        $pesanPembeli = $this->msg($pembayaran->no_pembeli, $pesan);            
        
        $layanan = Layanan::where('layanan', $pembelian->layanan)->first();
        
        if(!$layanan) return response()->json(['status' => false, 'message' => 'Service not found'], 404);
        
        $kategori = Kategori::where('id', $layanan->kategori_id)->first();
        
        $pembayaran->update(['status' => 'Lunas']);
        
        if($layanan->provider == "digiflazz"){
            $provider_order_id = Str::uuid()->toString(); // Menggunakan UUID
            $digiFlazz = new digiFlazzController;
            $order = $digiFlazz->order($pembelian->user_id, $pembelian->zone, $layanan->provider_id, $provider_order_id);

            if ($order['data']['status'] == "Pending" || $order['data']['status'] == "Sukses") {
                $order['data']['status'] = true;
                $order['transactionId'] = $provider_order_id;
            } else {
                $order['data']['status'] = false;
            }
        }else if($layanan->provider == "moo"){
            $moo = new MooGold;
            $order = $moo->order($pembelian->user_id, $pembelian->zone, $layanan->provider_id, $pembayaran->order_id);
            
            $order['data']['status'] = $order['status'];
            $order['transactionId'] = $pembayaran->order_id;
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
            $provider_order_id = Str::uuid()->toString(); // Menggunakan UUID
            $apigames = new ApiGamesController;
            $order = $apigames->order($pembelian->user_id, $pembelian->zone, $layanan->provider_id, $provider_order_id);

            if($order['data']['status'] == "Sukses"){
                $order['transactionId'] = $provider_order_id;
                $order['data']['status'] = true;
            }else{
                $order['data']['status'] = false;
            }
        }else if($layanan->provider == "gamepoint"){
            // $gp = new GamePoint;
            // $order = $gp->order($pembayaran->order_id, $layanan->provider_id, $pembelian->user_id, $pembelian->zone);
            
            // if($order['status']){
            //     $order['data']['status'] = true;
            //     $order['transactionId'] = $order['transactionId'];
            // }else{
            //     $order['data']['status'] = false;
            // } 
            $order['data']['status'] = true;
            $order['transactionId'] = "WAITING TO PROCESS";
        }else if($layanan->provider == "gamepoint"){
                $gp = new GamePoint();
                $order = $gp->order($order_id, $layanan->provider_id, $pembelian->user_id, $pembelian->zone);

                if($order['status']){
                    $provider_order_id = $order['transactionId'];
                }else{
                    $order['status'] = false;
                }
            }else if($layanan->provider == "gamepointmix"){
                        $gp = new GamePoint();
                        $provider_order_id = '';
                        $providers_id = explode('|',$layanan->provider_id);
                        $order['status'] = '';
                        foreach ($providers_id as $pi) {
                        $provider_order_id = Str::uuid()->toString(); // Menggunakan UUID
                        $order = $gp->order($order_id, $pi, $pembelian->user_id, $pembelian->zone);
    
                        if ($order['status']) {
                            $order['status'] = true;
                        if (isset($order['transactionId'])) {
                                  $provider_order_id = $order['transactionId'];
        } else {
            $provider_order_id = '';
        }
        } else {
        $order['status'] = false;
        }
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
            "Layanan : *$pembelian->layanan*\n" .
            // "Data : *$dataPembeli->user_id ($dataPembeli->zone)*\n" .
            "Harga : *Rp. " . number_format($pembelian->harga, 0, '.', '.') . ",-*\n" .
            "Status Pesanan : *Sukses*\n" .
            "Invoice : " . env("APP_URL") . "/pembelian/invoice/".$pembelian->order_id."\n\n" .
            "Terima kasih, sudah berbelanja. ;)\n\n" .
            "© ". env("APP_NAME") ."";
           
           $pesanSuksesAdmin = 
            "*PESANAN SUKSES*\n\n" .
            "Layanan: *$pembelian->layanan*\n" .
            // "Data : *$dataPembeli->user_id ($dataPembeli->zone)*\n" .
            "Harga: *Rp. " . number_format($pembelian->harga, 0, '.', '.') . ",-*\n" .
            "Status Pesanan : *Sukses*\n\n" .
            "Invoice : " . env("APP_URL") . "/pembelian/invoice/".$pembelian->order_id."\n\n" .
            "*KONTAK PEMBELI*\n" .
            "No. HP : $pembayaran->no_pembeli\n\n" .
            "© ". env("APP_NAME") ."";    
            
            $pembelian->update([
                'provider_order_id' => isset($order['transactionId']) ? $order['transactionId'] : 0,
                'status' => 'Pending',
                'log' => json_encode($order)
            ]);
            
            $requestPesan = $this->msg($this->api->nomor_admin, $pesanSuksesAdmin);
            $pesanPembeli = $this->msg($pembayaran->no_pembeli, $pesanSukses);            
        }else{
            $pembelian->update([
                'log' => json_encode($order),
                'status' => 'Batal'
            ]);
        }
            
        return response()->json(['status' => true]);
    }
    
    public function connect($url, $data = null)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        
        if($data){
            curl_setopt($ch, CURLOPT_POST, TRUE);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        }
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
            'Content-Type: application/json',                                                                                
            'Content-Length: ' . strlen(json_encode($data)))
        );   
        curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        
        $exec = json_decode(curl_exec($ch),true);
        
        return $exec;
    }    
    
public function msg($nomor, $msg)
{
    $api = \DB::table('setting_webs')->where('id',1)->first();
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.fonnte.com/send',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array(
            'target' => $nomor . '|Fonnte|Admin', // Adjusted to use $nomor directly
            'message' => $msg, // Adjusted to use $msg directly
        ),
        CURLOPT_HTTPHEADER => array(
            'Authorization: '.$api->wa_key
        ),
    ));

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