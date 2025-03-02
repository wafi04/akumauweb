<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Berita;
use App\Models\Seting;
use App\Models\Pembelian;
use App\Models\Rating;
class indexController extends Controller
{
    public function create()
    {
        
      
        return view('components.index', [
            'kategori' => Kategori::where('status', 'active')->get(),
            'flashsale' => \App\Models\Layanan::join('kategoris', 'kategoris.id','layanans.kategori_id')->select('kategoris.thumbnail AS gmr_thumb','kategoris.kode AS kode_game','layanans.*')->where('layanans.is_flash_sale', 1)->where('layanans.expired_flash_sale', '>=', date('Y-m-d'))->get(),
            'banner' => Berita::where('tipe', 'banner')->get(),
            'logoheader' => Berita::where('tipe', 'logoheader')->latest()->first(),
            'logofooter' => Berita::where('tipe', 'logofooter')->latest()->first(),
            'popup' => Berita::where('tipe', 'popup')->latest()->first(),
        ]);
    }
    public function cariIndex(Request $request)
    {
        if($request->ajax()){
            
            $data = Kategori::where('nama','LIKE','%'.$request->data.'%')->where('status','active')->limit(6)->get();
            
            
            $res = '';
            
           
            foreach($data as $d){
                
                $res .= '
                
                            <li>
                                <a class="dropdown-item" style="color:#dee2e6" href="'.url("/order").'/'.$d->kode.'">
                                        <div class="row">
                                            <div class="col-9">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <b>'.$d->nama.'</b>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <small>'.$d->sub_nama.'</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                ';
                
            }
            
            return $res;
            
            
        }
    }
}