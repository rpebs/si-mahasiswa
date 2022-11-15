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
        'mata_kuliah_id',
        'jam_mulai',
        'jam_selesai',
    ];

   public function dosen()
    {
        return $this->belongsTo('App\Models\DosenModel');
    }


}
