<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MataKuliahModel>
 */
class MataKuliahModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama_matkul' => $this->faker->randomElement(['Kalkulus', 'Jaringan Komputer', 'RPL', 'Pengolahan Citra', 'Pemrograman Objek', 'Algoritma Pemrograman', 'Statistika', 'Ecommerce']),
            'kode_matkul' => $this->faker->regexify('[A-Z]{5}'),
        ];
    }
}
