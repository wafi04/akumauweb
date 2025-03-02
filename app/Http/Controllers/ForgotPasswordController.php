<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Http;
use Auth;

class ForgotPasswordController extends Controller
{
    
    public function forgotPassword()
    {
        return view('components.forgotpassword');
    }
    
    
    public function sendOtp(Request $request)
    {
        $request->validate([
            'phone' => 'required|numeric'
        ],
        [
            'phone.required' => 'Harap isi no',
            'phone.numeric' => 'No tidak valid!'
        ]);
        
        $no = $request->phone;
        
        if($no[0] == 0){
            
            $no = substr_replace($no, '62', 0, 1);
        }
        
     
        $cek = \App\Models\User::where('whatsapp',$no)->first();
        
        if(!$cek){
            
            return back()->with('error','No tidak ditemukan!');
            
        }
        
        
        
        $otp = rand(100000,999999);
        
        $cek->update(['otp' => $otp]);
        
        Session::put('no',$no);
        
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
            'target' => $no . '|Fonnte|Admin', // Adjusted to use $nomor directly
            'message' => $otp, // Adjusted to use $msg directly
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

}


    
        
        
        return view('components.verifyotp');
        
        
        
        
    }
    
    
    public function verifyOtp(Request $request)
    {
        
        $no = Session::get('no');
        
        if(!$no){
            
            return redirect('/forgot-password');
            
        }
        
        $otp = $request->otp;
        
        
        $cek = \App\Models\User::where('whatsapp',$no)->where('otp',$otp)->first();
        
        if(!$cek){
            
            return back()->with('error','Kode OTP tidak valid!');
            
        }
        
        $cek->update(['otp' => NULL]);
        
        
        Auth::login($cek);
        
        
        return redirect('/account/setting');
        
        
        
        
        
    }
    
}