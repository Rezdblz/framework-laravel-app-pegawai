<?php

namespace Database\Factories;

use App\Models\Department;
use App\Models\Position;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nama_lengkap' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'nomor_telepon' => $this->faker->numerify('08##########'),
            'alamat' => $this->faker->address(),
            'tanggal_lahir' => $this->faker->date('Y-m-d', '-18 years'),
            'tanggal_masuk' => $this->faker->dateTimeBetween('-5 years', 'now'),
            'status' => $this->faker->randomElement(['aktif', 'nonaktif']),
            'departemen_id' => Department::factory(),
            'jabatan_id' => Position::factory(),
        ];
    }
}
