<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\JadwalModel;

class MataKuliahModel extends Model
{
    use HasFactory;

    protected $table ='mata_kuliah';

    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_matkul',
        'kode_matkul',
    ];

    public function jadwal()
    {
        return $this->hasOne('App\Models\JadwalModel');
    }
}
