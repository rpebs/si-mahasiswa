<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MahasiswaModel;

class JurusanModel extends Model
{
    use HasFactory;

    protected $table ='jurusan';

    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_jurusan',
        'kode',
    ];

    public function mahasiswa()
    {
        return $this->hasOne('App\MahasiswaModel');
    }
}
