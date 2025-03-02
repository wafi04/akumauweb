<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class SaldoController extends Controller
{
   public function show(Request $request)
    {
        if(!$request->api_key) return response()->json(['status' => false, 'message' => 'Parameter tidak valid']);
        
        $user = User::where('api_key', $request->api_key)->first();
        
        if(!$user) return response()->json(['status' => false, 'message' => 'Api key tidak valid']);
        
        $orang = User::where('username', $user->username)->where('balance', $user->balance)->where('role', $user->role)->first();
        
        return response()->json([
            'status' => true,
            'data' => array(
                'username' => $orang->username,
                'saldo' => $orang->balance,
                'role' => $orang->role
            )
        ]);
        
    }
}