<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use App\Models\Layanan;
use App\Models\Kategori;
use App\Models\Pembelian;
use App\Models\Pembayaran;
use App\Http\Controllers\ApiCheckController;
use App\Http\Controllers\digiFlazzController as Digi;
use App\Http\Controllers\VipResellerController;
use App\Http\Controllers\BangjeffController;
use App\Http\Controllers\SmileOneController;
use App\Http\Controllers\ApiGamesController;
use App\Http\Controllers\UniPinController;
use App\Http\Controllers\MengtopupController;
use App\Http\Controllers\AlpharamzController;
use App\Http\Controllers\MooGold;

class DigiflazzController extends Controller
{
    public function store(Request $request)
    {
        $response = array(
            'data'   => [
                'ref_id' => $request->ref_id,
                'code' => $request->pulsa_code,
                'hp' => $request->hp,
                'balance' => "",
                'sn' => ""
            ]
        );
        
        if(!$request->username || !$request->commands || !$request->ref_id || !$request->hp || !$request->pulsa_code || !$request->sign){
            $response['data']['status'] = "2";
            $response['data']['price'] = "0";
            $response['data']['message'] = "Terdapat parameter yang kosong";
            $response['data']['tr_id'] = Str::random(6);
            $response['data']['rc'] = "07";
            
            return response()->json($response);
        }
        
        $serverSign = md5(ENV("DIGI_SELLER_USER").ENV("DIGI_SELLER_KEY").$request->ref_id);
        
        if($serverSign != $request->sign){
            $response['data']['status'] = "2";
            $response['data']['price'] = "0";
            $response['data']['message'] = "Sign tidak valid";
            $response['data']['tr_id'] = Str::random(6);
            $response['data']['rc'] = "204";
            
            return response()->json($response);
        }
        
        $layanan = Layanan::where('id', $request->pulsa_code)->where('status', 'available')->first();
        
        if(!$layanan) {
            $response['data']['status'] = "2";
            $response['data']['price'] = "0";
            $response['data']['message'] = "Product tidak valid";
            $response['data']['tr_id'] = Str::random(6);
            $response['data']['rc'] = "20";
            
            return response()->json($response);
        }
       
       $kategori = Kategori::where('id', $layanan->kategori_id)->first();
       
       $pembelian = Pembelian::where('ref_id', $request->ref_id)->first();
    //   return $pembelian;
       //jika pembelian sudah ada return status
       if($pembelian){
            if($pembelian->status == "Pending" || $pembelian->status == "Processing"){
                $response['data']['status'] = "0";
                $response['data']['rc'] = "39";
                $response['data']['message'] = "Pending";
            }else if($pembelian->status == "Success"){
                $response['data']['status'] = "1";
                $response['data']['rc'] = "00";
                $response['data']['message'] = "Success";
            }else{
                $response['data']['status'] = "2";
                $response['data']['rc'] = "06";
                $response['data']['message'] = "Gagal";
            }
            $response['data']['price'] = strval($pembelian->harga);
            $response['data']['tr_id'] = $pembelian->order_id;
            
            return response()->json($response);
       }
       
$target = $request->hp;
$zone = '';

if (preg_match("/mobile\slegend/i", $kategori->nama)) {
    if (strlen($request->hp) == 13) {
        $target = substr($request->hp, 0, 9);
        $zone = substr($request->hp, 9, 4);
    } else if (strlen($request->hp) == 15) {
        $target = substr($request->hp, 0, 10);
        $zone = substr($request->hp, 10, 5);
    } else if (strlen($request->hp) == 10) {
        $target = substr($request->hp, 0, 6);
        $zone = substr($request->hp, 6, 4);
    } else if (strlen($request->hp) == 12) {
        $target = substr($request->hp, 0, 8);
        $zone = substr($request->hp, 8, 4);
    } else if (strlen($request->hp) == 11) {
        $target = substr($request->hp, 0, 7);
        $zone = substr($request->hp, 7, 4);
    } else if (strlen($request->hp) == 14) {
        $target = substr($request->hp, 0, 10);
        $zone = substr($request->hp, 10, 4);

        // Memanggil ApiCheckController untuk memeriksa target dan zone
        $apicheck = new ApiCheckController();
        $check = $apicheck->check($target, $zone, 'Mobile Legends');
        
        // Jika hasil check menunjukkan validasi yang berbeda, zone tetap 4463
        if ($check['status']['code']) {
            // Tetap menggunakan format yang diinginkan
            $zone = substr($request->hp, 9, 4);
        }
    }

    Log::info(json_encode(['target' => $target, 'zone' => $zone]));
}

       
        $provider_order_id = null;
        $order = array();
        
       if($layanan->provider == "digiflazz"){
           $digi = new Digi;
           $order = $digi->order($request->hp, '', $layanan->provider_id, $request->ref_id);
           $provider_order_id = $request->ref_id;
           
            if ($order['data']['status'] == "Pending" || $order['data']['status'] == "Sukses") {
                $order['status'] = true;
            } else {
                $order['status'] = false;
            }   
       }else if($layanan->provider == "moo"){
                $moo = new MooGold;
                $order = $moo->order($target, $zone, $layanan->provider_id, $request->ref_id);
                // \Illuminate\Support\Facades\Log::info(json_encode($order));
                // dd($order);
                $provider_order_id = $request->ref_id;
       }else if($layanan->provider == "vip"){
            $vip = new VipResellerController;
            $order = $vip->order($target, $zone, $layanan->provider_id);
            
            if($order['result']){
                $order['status'] = true;
                $provider_order_id = $order['data']['trxid'];
            }else{
                $order['status'] = false;
            }
       }else if($layanan->provider == "apigames"){
            $provider_order_id = $request->ref_id;
            $apigames = new ApiGamesController;
            $order = $apigames->order($target, $zone, $layanan->provider_id, $provider_order_id);

            if ($order['data']['status'] == "Sukses") {
                $order['transactionId'] = $provider_order_id;
                $order['status'] = true;
            } else {
                $order['status'] = false;
            }
       }else if($layanan->provider == "alpha"){
                $alpha = new AlpharamzController();
                $order = $alpha->order($target, $zone, $layanan->provider_id);

                if($order['status']){
                    $order['status'] = true;
                    $provider_order_id = $order['data']['id'];
                }else{
                    $order['status'] = false;
                }
       }else if($layanan->provider == "manual"){
                 $provider_order_id = $request->order_id;
                 $order['status'] = true;
       }
       
       Log::info(json_encode($order));
       
       $rand = "VAZZ".rand();
       $pembelian = new Pembelian();
       $pembelian->username = "digiflazz";
       $pembelian->order_id = $rand;
       $pembelian->user_id = $target;
       $pembelian->zone = $zone;
       $pembelian->nickname = $request->hp;
       $pembelian->layanan = $layanan->layanan;
       $pembelian->harga = $layanan->harga_gold;
       $pembelian->profit = '0';
       $pembelian->status = $order['status'] ? 'Pending' : 'Batal';
       $pembelian->provider_order_id = $provider_order_id ? $provider_order_id : "";
       $pembelian->log = json_encode($order);
       $pembelian->is_digi = 1;
       $pembelian->ref_id = $request->ref_id;
       $pembelian->tipe_transaksi = 'game';
       
       $pembelian->save();
       
       if($order['status']){
            $pembayaran = new Pembayaran();
            $pembayaran->order_id = $rand;
            $pembayaran->harga = $layanan->harga_gold;
            $pembayaran->no_pembayaran = "Saldo";
            $pembayaran->no_pembeli = "62895367029265";
            $pembayaran->status = 'Lunas';
            $pembayaran->metode = "Saldo";
            $pembayaran->save();   
            
            if($layanan->provider == "apigames"){
                $response['data']['status'] = "0";
                $response['data']['rc'] = "39";
                $response['data']['message'] = "Pending";
                $response['data']['price'] = strval($layanan->harga_gold);
                $response['data']['tr_id'] = $rand;
            }
       }else{
            $response['data']['status'] = "2";
            $response['data']['rc'] = "14";
            $response['data']['message'] = "Gagal";
            $response['data']['price'] = "0";
            $response['data']['tr_id'] = $rand;
            return response()->json($response);
       }
        
        return response()->json($response);
    }
    
    
    public function connect($url, $data, $header)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.digiflazz.com".$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        $chresult = curl_exec($ch);
        curl_close($ch);
        $json_result = json_decode($chresult, true);
        return $json_result;        
    }    
}