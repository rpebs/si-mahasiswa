<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DosenModel>
 */
class DosenModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [

            'nama_dosen' => $this->faker->name(),
            'nip' => $this->faker->numberBetween(110000,199999),
            'alamat' =>$this->faker->address(),
            'no_hp' =>$this->faker->phoneNumber(),
            'email' => $this->faker->email(),
            
        
        ];
    }
}
