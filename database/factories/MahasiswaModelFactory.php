<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MahasiswaModel>
 */
class MahasiswaModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->name(),
            'npm' => $this->faker->randomDigit(10000000),
            'alamat' =>$this->faker->address(),
            'jurusan_id' =>rand(1,2)
        ];
    }
}
