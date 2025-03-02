<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DataGiftCardController extends Controller
{
    public function dataGiftCard()
    {
        $data = \App\Models\Pembelian::where('tipe_transaksi', 'gift_card')->get();
        
        return view('components.admin.datagiftcard', compact('data'));
    }
    
    public function statusGiftCard(Request $request, $order_id, $status)
    {
        \App\Models\Pembelian::where('order_id', $order_id)->update(['status' => $status]);
        
        return back();
    }
    
        public function saveSN(Request $request, $order_id)
{
    // Validasi data SN jika diperlukan
    
    // Simpan perubahan SN ke dalam database
   \App\Models\Pembelian::where('order_id', $order_id)->update([
        'sn' => $request->sn,
        'updated_at' => now()
    ]);

    // Kirim respons sukses
    return response()->json(['message' => 'SN updated successfully']);
}
    
    public function hapusGiftCard(Request $request, $id)
    {
        \App\Models\Pembelian::where('id', $id)->delete();
        
        return back();
    }
}
