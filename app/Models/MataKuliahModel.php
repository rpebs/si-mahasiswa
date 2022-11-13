<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataKuliahModel extends Model
{
    use HasFactory;

    protected $table ='mata_kuliah';

    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_matkul',
        'kode_matkul',
    ];
}
