<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiCheckController extends Controller
{
    public function check($user_id = null, $zone_id = null, $game = null)
    {
        $api = \DB::table('setting_webs')->where('id',1)->first();
        $params = [
            'api_key' => ENV("APIJSG"),
            'game'    => $game,
            'user_id' => $user_id,
            'zone_id' => $zone_id
        ];
        
        $result = $this->connect($params);
        if($result['code'] == 200){
            return array(
                'status' => array('code' => 200),
                'data' => array('userNameGame' => $result['result']['username'])
            );
        }else{
            return array(
                'status'     => array('code' => 1)
            );
        }
    }

    public function connect($data = null)
    {
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,'http://api.jstoregame.com/api/v1/check-game');
        curl_setopt($ch,CURLOPT_POST,true);
        curl_setopt($ch,CURLOPT_POSTFIELDS,http_build_query($data));
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch,CURLOPT_FOLLOWLOCATION,true);
        curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
        
        $chresult = curl_exec($ch);
        curl_close($ch);
        $json_result = json_decode($chresult, true);
        return $json_result;
    }
}