<?php

namespace App\Http\Controllers;

use App\Models\DosenModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DosenController extends Controller
{
     public function show()
    {
        $dosen = DosenModel::paginate(9);
        return view('tampildosen', ['dosen' => $dosen]);
    }

    public function create()
    {
        return view('tambahdosen');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_dosen' => 'required|max:255',
            'alamat' => 'required|max:255',
            'email' => 'required|email:dns|max:255',
            'no_hp' => 'required|max:255',
            'nip' => 'required|unique:dosen|max:255',
        ]);


        DosenModel::create($validated);

        // [
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        //     'role' => $request->role
        // ]

        Session::flash('message', 'Data Berhasil Ditambah');
        return redirect('dosen/tampil');
    }

    public function edit($nip)
    {
        
        $dosen = DosenModel::where('nip', $nip)->get();

        return view('ubahdosen', ['dosen' => $dosen]);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
           'nama_dosen' => 'required|max:255',
            'alamat' => 'required|max:255',
            'email' => 'required|email:dns|max:255',
            'no_hp' => 'required|max:255',
            'nip' => 'required|max:255',
        ]);

        $dosen = DosenModel::where('nip', $request->nip)->update($validated);
         Session::flash('message', 'Data Berhasil Diubah');
        return redirect()->route('tampildosen');
    }

    public function delete($nip)
    {
        $dosen = DosenModel::where('nip', $nip)->delete();
        Session::flash('message', 'Data Berhasil Dihapus');
        return redirect()->route('tampildosen');
    }

    public function search(Request $request)
    {
        $keyword = $request->search;
        $mahasiswa = DosenModel::where('nama_dosen', 'like', "%" . $keyword . "%")->paginate(9);
        return view('tampildosen', compact('dosen'))->with('i', (request()->input('page',1)-1)*5);
    }
}
