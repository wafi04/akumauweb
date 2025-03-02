<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MooGold extends Controller
{
    public function order($uid = null, $zone = null, $service = null, $order_id = null)
    {
        $service = explode(',', $service);
        
        $api_postdata = array(
            'path' => 'order/create_order',
            'data' => [
                'category' => intval($service[0]),
                'product-id' => intval($service[1]),
                'quantity' => 1,
                'User ID' => $uid,
                'Server ID' => $zone
            ],
            'partnerOrderId' => $order_id,
        );

        $ts = time();

        $header = array(
            'Content-Type: application/json',
            'Authorization: Basic '.base64_encode(ENV("MOO_PARTNER").":".ENV("MOO_PASS")),
            'auth: '.hash_hmac('SHA256', json_encode($api_postdata).$ts.'order/create_order', ENV("MOO_PASS")),
            'timestamp: '.$ts
        );

        return $this->connect("/order/create_order", $api_postdata, $header);
    }
    
    public function status($order_id = null)
    {
        $api_postdata = array(
            'path' => 'order/order_detail_partner_id',
            'partner_order_id' => $order_id,
        );

        $ts = time();

        $header = array(
            'Content-Type: application/json',
            'Authorization: Basic '.base64_encode(ENV("MOO_PARTNER").":".ENV("MOO_PASS")),
            'auth: '.hash_hmac('SHA256', json_encode($api_postdata).$ts.'order/order_detail_partner_id', ENV("MOO_PASS")),
            'timestamp: '.$ts
        );

        return $this->connect("/order/order_detail_partner_id", $api_postdata, $header);
    }
    
    public function product()
    {
        $api_postdata = array(
            'path' => 'product/list_product',
            'category_id' => 50,
        );

        $ts = time();

        $header = array(
            'Content-Type: application/json',
            'Authorization: Basic '.base64_encode(ENV("MOO_PARTNER").":".ENV("MOO_PASS")),
            'auth: '.hash_hmac('SHA256', json_encode($api_postdata).$ts.'product/list_product', ENV("MOO_PASS")),
            'timestamp: '.$ts
        );

        return $this->connect("/product/list_product", $api_postdata, $header);
    }

    public function product_detail($product_id)
    {
        $api_postdata = array(
            'path' => 'product/product_detail',
            'product_id' => $product_id,
        );

        $ts = time();

        $header = array(
            'Content-Type: application/json',
            'Authorization: Basic '.base64_encode(ENV("MOO_PARTNER").":".ENV("MOO_PASS")),
            'auth: '.hash_hmac('SHA256', json_encode($api_postdata).$ts.'product/product_detail', ENV("MOO_PASS")),
            'timestamp: '.$ts
        );

        return $this->connect("/product/product_detail", $api_postdata, $header);
    }
    
    public function tes()
    {
        $api_postdata = array(
            'path' => 'user/balance',
        );

        $ts = time();

        $header = array(
            'Content-Type: application/json',
            'Authorization: Basic '.base64_encode(env("MOO_PARTNER") . ":" . env("MOO_PASS")),
            'auth: '.hash_hmac('SHA256', json_encode($api_postdata) . $ts . 'user/balance', env("MOO_PASS")),
            'timestamp: ' . $ts
        );

        return $this->connect("/user/balance", $api_postdata, $header);
    }
    
    
    
    public function connect($url, $data, $header)
    {
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://moogold.com/wp-json/v1/api".$url);
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
