<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalModel extends Model
{
    use HasFactory;

    protected $table ='jadwal';

    protected $primaryKey = 'id';
    protected $fillable = [
        'hari',
        'dosen_id',
        'matkul_id',
        'jam_mulai',
        'jam_selesai',
    ];

   public function dosen()
    {
        return $this->belongsTo(DosenModel::class);
    }

    public function matkul()
    {
        return $this->belongsTo(MataKuliahModel::class);
    }


}
