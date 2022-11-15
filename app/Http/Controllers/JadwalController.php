<?php

namespace App\Http\Controllers;

use App\Models\DosenModel;
use App\Models\JadwalModel;
use Illuminate\Http\Request;
use App\Models\MataKuliahModel;
use Illuminate\Support\Facades\Session;

class JadwalController extends Controller
{
    public function show()
    {
        $jadwal = JadwalModel::paginate(9);
        return view('tampiljadwal', ['jadwal' => $jadwal]);
        
    }

     public function create()
    {   
        $dosen = DosenModel::get();
        $matkul = MataKuliahModel::get();
        return view('tambahjadwal', ['dosen' => $dosen, 'mata_kuliah' => $matkul]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'hari' => 'required|max:255',
            'dosen_id' => 'required|max:255',
            'matkul_id' => 'required|max:255',
            'jam_mulai' => 'required|max:255',
            'jam_selesai' => 'required|max:255',

        ]);


        JadwalModel::create($validated);

        Session::flash('message', 'Data Berhasil Ditambah');
        return redirect('jadwal/tampil');
    }

    public function edit($id)
    {
        $dosen = DosenModel::get();
        $matkul = MataKuliahModel::get();
        $jadwal = JadwalModel::where('id', $id)->get();

        return view('ubahjadwal', ['jadwal' => $jadwal, 'dosen' => $dosen, 'mata_kuliah' => $matkul]);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'hari' => 'required|max:255',
            'dosen_id' => 'required|max:255',
            'matkul_id' => 'required|max:255',
            'jam_mulai' => 'required|max:255',
            'jam_selesai' => 'required|max:255',
        ]);

        $jadwal = JadwalModel::where('id', $request->id)->update($validated);
         Session::flash('message', 'Data Berhasil Diubah');
        return redirect()->route('tampiljadwal');
    }

    public function delete($id)
    {
        $jadwal = JadwalModel::where('id', $id)->delete();
        Session::flash('message', 'Data Berhasil Dihapus');
        return redirect()->route('tampiljadwal');
    }

}
