<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\JurusanModel::insert([
            'nama_jurusan' => 'Teknik Informatika',
            'kode' => 'TI',


        ]);

        \App\Models\JurusanModel::insert([
            'nama_jurusan' => 'Manajemen Bisnis',
            'kode' => 'MB',
        ]);
    }
}
