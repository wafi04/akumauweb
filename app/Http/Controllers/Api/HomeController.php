<?php
// app/Http/Controllers/Api/HomeController.php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Berita;
use App\Models\Seting;
use App\Models\Pembelian;
use App\Models\Rating;

class HomeController extends Controller 
{
    public function getHomeData() 
    {
        return response()->json([
            'kategori' => Kategori::where('status', 'active')->get(),
            'flashsale' => \App\Models\Layanan::join('kategoris', 'kategoris.id','layanans.kategori_id')
                ->select('kategoris.thumbnail AS gmr_thumb','kategoris.kode AS kode_game','layanans.*')
                ->where('layanans.is_flash_sale', 1)
                ->where('layanans.expired_flash_sale', '>=', date('Y-m-d'))
                ->get(),
            'banner' => Berita::where('tipe', 'banner')->get(),
            'logoheader' => Berita::where('tipe', 'logoheader')->latest()->first(),
            'logofooter' => Berita::where('tipe', 'logofooter')->latest()->first(),
            'popup' => Berita::where('tipe', 'popup')->latest()->first(),
        ]);
    }
    
    public function searchCategories(Request $request)
    {
        $data = Kategori::where('nama', 'LIKE', '%' . $request->query('query') . '%')
            ->where('status', 'active')
            ->limit(6)
            ->get(['id', 'nama', 'sub_nama', 'kode']);
            
        return response()->json($data);
    }
}