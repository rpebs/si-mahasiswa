<?php

namespace App\Http\Controllers;

use App\Models\JurusanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class JurusanController extends Controller
{
    public function show()
    {
        $jurusan = JurusanModel::paginate(9);
        return view('tampiljurusan', ['jurusan' => $jurusan]);
    }

    public function create()
    {
        return view('tambahjurusan');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_jurusan' => 'required|unique:jurusan|max:255',
            'kode' => 'required|alpha|unique:jurusan|max:255',
        ]);


        JurusanModel::create($validated);

        // [
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        //     'role' => $request->role
        // ]

        Session::flash('message', 'Data Berhasil Ditambah');
        return redirect('jurusan/tampil');
    }

    public function edit($id)
    {   
        $jurusan = JurusanModel::where('id', $id)->get();
       
        return view('ubahjurusan', ['jurusan' => $jurusan]);
    }

    public function update(Request $request)
    {   
       $validated = $request->validate([
            'nama_jurusan' => 'required|max:255',
            'kode' => 'required|alpha|unique:jurusan|max:255',
        ]);
        
        $jurusan = JurusanModel::where('id', $request->id)->update($validated);
         Session::flash('message', 'Data Berhasil Diubah');
        return redirect()->route('tampiljurusan');
    }

    public function delete($id)
    {
        $jurusan = JurusanModel::where('id', $id)->delete();
        Session::flash('message', 'Data Berhasil Dihapus');
        return redirect()->route('tampiljurusan');
    }
}
