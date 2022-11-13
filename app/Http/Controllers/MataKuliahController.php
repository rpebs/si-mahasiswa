<?php

namespace App\Http\Controllers;

use App\Models\MataKuliahModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MataKuliahController extends Controller
{
     public function show()
    {
        $mata_kuliah = MataKuliahModel::paginate(9);
        return view('tampilmatkul', ['mata_kuliah' => $mata_kuliah]);
    }

    public function create()
    {
        return view('tambahmatkul');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_matkul' => 'required|unique:mata_kuliah|max:255',
            'kode_matkul' => 'required|alpha|max:255',
        ]);


        MataKuliahModel::create($validated);

        Session::flash('message', 'Data Berhasil Ditambah');
        return redirect('matkul/tampil');
    }

    public function edit($kode_matkul)
    {   
        $matkul = MataKuliahModel::where('kode_matkul', $kode_matkul)->get();
       
        return view('ubahmatkul', ['mata_kuliah' => $matkul]);
    }

    public function update(Request $request)
    {   
       $validated = $request->validate([
           'nama_matkul' => 'required|max:255',
            'kode_matkul' => 'required|alpha|max:255',
        ]);
        
        $matkul = MataKuliahModel::where('id', $request->id)->update($validated);
 
         Session::flash('message', 'Data Berhasil Diubah');
        return redirect()->route('tampilmatkul');
    }

    public function delete($kode_matkul)
    {
        $matkul = MataKuliahModel::where('kode_matkul', $kode_matkul)->delete();
        Session::flash('message', 'Data Berhasil Dihapus');
        return redirect()->route('tampilmatkul');
    }
}
