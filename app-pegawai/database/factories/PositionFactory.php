<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PositionFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nama_jabatan' => $this->faker->unique()->jobTitle(),
            'gaji_pokok' => $this->faker->numberBetween(5000000, 15000000),
        ];
    }
}
