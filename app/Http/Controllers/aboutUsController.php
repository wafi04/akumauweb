<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Berita;
class aboutUsController extends Controller
{
    public function create()
    {
        return view('components.tentang', [
            'kategori' => Kategori::where('status', 'active')->get(),
            'banner' => Berita::where('tipe', 'banner')->get(),
            'logoheader' => Berita::where('tipe', 'logoheader')->latest()->first(),
            'logofooter' => Berita::where('tipe', 'logofooter')->latest()->first()
        ]);
    }
    public  function update()
    {
        
    }
}
