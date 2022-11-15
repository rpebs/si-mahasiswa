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

    public function edit($npm)
    {
        $jurusan = JurusanModel::get();
        $mahasiswa = MahasiswaModel::where('npm', $npm)->get();

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

        $mahasiswa = MahasiswaModel::where('npm', $request->npm)->update($validated);
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
        if($request->ajax())
        {   
            $keyword = $request->search;
            $output ="";
            $mahasiswa = MahasiswaModel::where('nama', 'like', "%" . $keyword . "%")->paginate(9);
            if($mahasiswa)
            {
                foreach ($mahasiswa as $key => $mahasiswa){
                    $output.='<tr>'.
                    '<td>'.$mahasiswa->id.'</td>'.
                    '<td>'.$mahasiswa->nama.'</td>'.
                    '<td>'.$mahasiswa->npm.'</td>'.
                    '<td>'.$mahasiswa->alamat.'</td>'.
                    '<td>'.$mahasiswa->jurusan->nama_jurusan.'</td>'.
                    '<td>'.'<a href="/mahasiswa/ubah/'.$mahasiswa->npm.'" class="btn btn-warning btn-sm">'.'<i
                            class="fa fa-pencil">'.'</i>'.'</a>'.
                    '<a href="/mahasiswa/hapus/'.$mahasiswa->id.'"'.
                        'onclick="return confirm('.'Apakah Anda Yakin Menghapus Data?'.');'.'" class="btn btn-danger btn-sm"><i
                            class="fa fa-trash"></i></a>'.
                '</td>'.
                    '</tr>';
                }
                
                return Response($output);


               
            }
        }
        
        // $mahasiswa = MahasiswaModel::where('nama', 'like', "%" . $keyword . "%")->paginate(9);
        // return view('tampilmahasiswa', compact('mahasiswa'))->with('i', (request()->input('page',1)-1)*5);
    }
}
