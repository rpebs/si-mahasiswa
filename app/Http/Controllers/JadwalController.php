<?php

namespace App\Http\Controllers;

use App\Models\DosenModel;
use App\Models\JadwalModel;
use Illuminate\Http\Request;
use App\Models\MataKuliahModel;

class JadwalController extends Controller
{
    public function show()
    {
        $jadwal = JadwalModel::paginate(9);
        return view('tampiljadwal', ['jadwal' => $jadwal]);
        
    }
}
