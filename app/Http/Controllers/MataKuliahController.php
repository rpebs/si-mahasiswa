<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MataKuliahModel;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;


class MataKuliahController extends Controller
{
     public function show()
    {
        $mata_kuliah = MataKuliahModel::paginate(9);
        return view('tampilmatkul', ['mata_kuliah' => $mata_kuliah, 'title' => 'SI Kampus | Data Mata Kuliah']);
    }

    public function create()
    {
        return view('tambahmatkul', ['title' => 'SI Kampus | Tambah Mata Kuliah']);
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
       
        return view('ubahmatkul', ['mata_kuliah' => $matkul, 'title' => 'SI Kampus | Ubah Data Mata Kuliah']);
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

    public function delete($kode)
    {   
        $condition = DB::table('mata_kuliah')->where('kode_matkul', '=', $kode)->get('id');
        $where = DB::table('mata_kuliah')->join('jadwal', 'mata_kuliah.id', '=', 'jadwal.matkul_id')->select('mata_kuliah.id')->where('jadwal.matkul_id', '=', $condition->implode('id'))->get();
        if($where->isNotEmpty()){
            Session::flash('failed', 'Matkul Masuk Kedalam Jadwal');
            return redirect()->route('tampilmatkul');
        } else{
            $matkul = MataKuliahModel::where('kode_matkul', $kode)->delete();
            Session::flash('message', 'Data Berhasil Dihapus');
            return redirect()->route('tampilmatkul');
        }
        
    }
}
