<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
         \App\Models\JadwalModel::insert([
            'hari' => 'Senin',
            'mata_kuliah_id' => '2',
            'jam_mulai' => '18:00',
            'jam_selesai' => '19:00',


        ]);
    }
}
