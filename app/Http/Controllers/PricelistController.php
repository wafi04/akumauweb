<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Layanan;
use App\Models\Berita;
use Illuminate\Http\Request;

class PricelistController extends Controller
{
    public function create(Request $request)
    {
        $selectedKategoriId = $request->get('kategori_id');

        $query = Layanan::with('kategori')
            ->whereHas('kategori', function($query) {
                $query->where('status', 'active');
            });

        if ($selectedKategoriId) {
            $query->where('kategori_id', $selectedKategoriId);
        }

        $datas = $query->orderBy('created_at', 'desc')->get();

        $kategoris = Kategori::all();

        $logoheader = Berita::where('tipe', 'logoheader')->latest()->first();
        $logofooter = Berita::where('tipe', 'logofooter')->latest()->first();

        return view('components.pricelist', compact('datas', 'kategoris', 'logoheader', 'logofooter', 'selectedKategoriId'));
    }
}
