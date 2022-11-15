<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DosenModel extends Model
{
    use HasFactory;

    protected $table ='dosen';

    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_dosen',
        'alamat',
        'email',
        'no_hp',
        'nip',
    ];

    public function jadwal()
    {
        return $this->hasMany(JadwalModel::class);
    }
}
