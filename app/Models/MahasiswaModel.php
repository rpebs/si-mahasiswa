<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\JurusanModel;

class MahasiswaModel extends Model
{
    use HasFactory;

    protected $table ='mahasiswa';

    protected $primaryKey = 'id';
    protected $fillable = [
        'nama',
        'npm',
        'alamat',
        'jurusan_id',
    ];

    public function jurusan()
    {
        return $this->belongsTo('App\Models\JurusanModel');
    }
        
}
