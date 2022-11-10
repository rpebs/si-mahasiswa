<?php

namespace App\Http\Controllers;

use App\Models\MahasiswaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\JurusanModel;

class MahasiswaController extends Controller
{   
    public function show()
    {
        $data = MahasiswaModel::paginate(9);
        return view('tampilmahasiswa', ['mahasiswa' => $data]);
    }

    public function create()
    {
        $jurusan = JurusanModel::get();
        return view('tambahmahasiswa', ['jurusan' => $jurusan]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|max:255',
            'npm' => 'required|max:255',
            'alamat' => 'required|max:255',
            'jurusan_id' => 'required|max:255',
        ]);


        MahasiswaModel::create($validated);

        // [
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        //     'role' => $request->role
        // ]

        Session::flash('message', 'Data Berhasil Ditambah');
        return redirect('mahasiswa/tampil');
    }

    public function edit($id)
    {   
        $jurusan = JurusanModel::get();
        $mahasiswa = MahasiswaModel::where('id', $id)->get();
       
        return view('ubahmahasiswa', ['mahasiswa' => $mahasiswa, 'jurusan' => $jurusan]);
    }

    public function update(Request $request)
    {   
        $validated = $request->validate([
            'nama' => 'required|max:255',
            'npm' => 'required|max:255',
            'alamat' => 'required|max:255',
            'jurusan_id' => 'required|max:255',
        ]);
        
        $mahasiswa = MahasiswaModel::where('id', $request->id)->update($validated);
         Session::flash('message', 'Data Berhasil Diubah');
        return redirect()->route('tampil');
    }

    public function delete($id)
    {
        $mahasiswa = MahasiswaModel::where('id', $id)->delete();
        Session::flash('message', 'Data Berhasil Dihapus');
        return redirect()->route('tampil');
    }

    public function search(Request $request)
    {
        $keyword = $request->search;
        $mahasiswa = MahasiswaModel::where('nama', 'like', "%" . $keyword . "%")->paginate(9);
        return view('tampilmahasiswa', compact('mahasiswa'))->with('i', (request()->input('page',1)-1)*5);
    }
}
