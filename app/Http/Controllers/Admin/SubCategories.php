<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SubCategory AS Model;
use App\Models\Kategori;
use App\Models\Layanan;
use Illuminate\Http\Request;

class Categories extends Controller
{
    public function create()
    {
        $data = Model::join('kategoris', '_categories.category_id', 'kategoris.id')
                ->select('kategoris.nama AS kategori', '_categories.*')->get();
        return view('components.admin.categories', ['categories' => Kategori::where('status', 'active')->get(), '' => $data]);
    }

    public function store(Request $request)
    {
        $request->validate([
            '*' => 'required',
            'code' => 'unique:_categories,code'
        ], [
            'nama.required' => 'Nama Wajib diisi',
            'code.required' => 'kode Wajib diisi',
            'kategori.required' => 'kategori Wajib diisi',
            'code.unique' => 'Kode Sudah dipakai' 
        ]);

        $model = new Model();
        $model->name = $request->nama;
        $model->code = $request->code;
        $model->category_id = $request->kategori;
        $model->active = 1;
        $model->save();

        return back()->with('success', 'Berhasil menambahkan  kategori');
    }

    public function destroy($id)
    {
        $model = Model::where('id', $id)->first();

        $model->delete();

        $service = Layanan::where('_category_id', $id)->update([
            '_category_id' => 0
        ]);

        return back()->with('success', 'Berhasil menambahkan  kategori');
    }
}
