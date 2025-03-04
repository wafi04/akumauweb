<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JstoreController extends Controller
{
    public function order($uid = null, $zone = null, $service = null)
    {
        $target = $uid;
        if($zone){
            $target = $target."|".$zone;
        }
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://jstoregame.com/api/order');
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "api_key=".env("JSG_APIKEY")."&service=".$service."&target=".$target."");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
        $res = json_decode(curl_exec($ch),true);
        return $res;
    }

    public function status($poid = null)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://jstoregame.com/api/status');
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "api_key=".env("JSG_APIKEY")."&trx_id=$poid");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
        $res = json_decode(curl_exec($ch), true);
        return $res;
    }  
    
    public function services()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://jstoregame.com/api/service');
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "api_key=".env("JSG_APIKEY"));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
        $res = json_decode(curl_exec($ch),true);
        return $res;
    }
    
    public function saldo()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://jstoregame.com/api/saldo');
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "api_key=".env("JSG_APIKEY"));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
        $res = json_decode(curl_exec($ch),true);
        return $res;
    }
    
 
    
     
  public function tes()
{
    $ch = curl_init();
    $license = "lQgbFl-IRkIE0-oSfkjf-rGH54D-dHXOQ6";
    $domain = "https://jstoregame.com";

    $postData = [
        'license' => $license,
        'domain' => $domain,
    ];

    curl_setopt($ch, CURLOPT_URL, 'https://jstoregame.com/api/license');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);  
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);

    $res = json_decode(curl_exec($ch), true);

    curl_close($ch);

    return $res;
}

    
    
}
