<?php

namespace App\Http\Controllers;

use App\Models\DosenModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class DosenController extends Controller
{
     public function show()
    {
        $dosen = DosenModel::paginate(9);
        return view('tampildosen', ['dosen' => $dosen, 'title' => 'SI Kampus | Data Dosen']);
    }

    public function create()
    {
        return view('tambahdosen',['title' => 'SI Kampus | Tambah Data Dosen']);
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

        return view('ubahdosen', ['dosen' => $dosen, 'title' => 'SI Kampus | Ubah Data Dosen']);
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
        $condition = DB::table('dosen')->where('nip', '=', $nip)->get('id');
        $where = DB::table('dosen')->join('jadwal', 'dosen.id', '=', 'jadwal.dosen_id')->select('dosen.id')->where('jadwal.dosen_id', '=', $condition->implode('id'))->get();
        if($where->isNotEmpty()){
            Session::flash('failed', 'Dosen Masuk Kedalam Jadwal');
            return redirect()->route('tampildosen');
        }else{
            $dosen = DosenModel::where('nip', $nip)->delete();
            Session::flash('message', 'Data Berhasil Dihapus');
            return redirect()->route('tampildosen');
        }
        
    }

    // public function search(Request $request)
    // {
    //     $keyword = $request->search;
    //     $mahasiswa = DosenModel::where('nama_dosen', 'like', "%" . $keyword . "%")->paginate(9);
    //     return view('tampildosen', compact('dosen'))->with('i', (request()->input('page',1)-1)*5);
    // }

    public function search(Request $request)
    {   
        if($request->ajax())
        {   
            $keyword = $request->search;
            $output ="";
            $dosen = DosenModel::where('nama_dosen', 'like', "%" . $keyword . "%")->paginate(9);
            if($dosen)
            {
                foreach ($dosen as $key => $dosen){
                    $output.='<tr>'.
                    '<td>'.$dosen->id.'</td>'.
                    '<td>'.$dosen->nama_dosen.'</td>'.
                    '<td>'.$dosen->nip.'</td>'.
                    '<td>'.$dosen->alamat.'</td>'.
                    '<td>'.$dosen->no_hp.'</td>'.
                    '<td>'.$dosen->email.'</td>'.
                    '<td>'.'<a href="/dosen/ubah/'.$dosen->nip.'" class="btn btn-warning btn-sm">'.'<i
                            class="fa fa-pencil">'.'</i>'.'</a>'.
                    '<a href="/dosen/hapus/'.$dosen->nip.'"'.
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
