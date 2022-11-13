<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Ramadhany',
            'email' => 'test@example.com',
            'password' => Hash::make('admin'),
            'role' => 'Administrator',
        ]);

        \App\Models\DosenModel::factory(10)->create();


        

        \App\Models\JurusanModel::insert([
            'nama_jurusan' => 'Teknik Informatika',
            'kode' => 'TI',


        ]);

        \App\Models\JurusanModel::insert([
            'nama_jurusan' => 'Manajemen Bisnis',
            'kode' => 'MB',
        ]);

        \App\Models\MahasiswaModel::factory(20)->create();

         \App\Models\MataKuliahModel::factory(4)->create();


    }
}
