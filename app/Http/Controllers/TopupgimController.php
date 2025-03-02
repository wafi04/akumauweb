<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TopupgimController extends Controller
{
    public function saldo()
    {
         $clientId = env('TOPUPGIM_CLIENT_ID');
$secretKey = env('TOPUPGIM_SECRET_KEY');

        $curl = curl_init();

curl_setopt_array($curl, array(
   CURLOPT_URL => 'https://api.topupgim.com/api/reseller/v1.0/profile/details',
   CURLOPT_RETURNTRANSFER => true,
   CURLOPT_ENCODING => '',
   CURLOPT_MAXREDIRS => 10,
   CURLOPT_TIMEOUT => 0,
   CURLOPT_FOLLOWLOCATION => true,
   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
   CURLOPT_CUSTOMREQUEST => 'GET',
   CURLOPT_HTTPHEADER => array(
      "x-client-id: $clientId",
      "x-secret-key: $secretKey",
      'User-Agent: Apidog/1.0.0 (https://apidog.com)'
   ),
));

$response = curl_exec($curl);

if(curl_errno($curl)){
    $error_msg = curl_error($curl);
    curl_close($curl);
    die("cURL error: $error_msg");
}

$httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

curl_close($curl);

if ($httpCode == 200) {
    echo $response;
} else {
    $responseArray = json_decode($response, true);
    $errorMessage = $responseArray['message'] ?? 'Request failed';
    if ($errorMessage == 'IP_RESTRICTED') {
        $errorMessage = 'IP address is restricted. Please ensure your server IP is whitelisted in Topupgim settings.';
    }
    echo "Error ($httpCode): $errorMessage";
}
}
}