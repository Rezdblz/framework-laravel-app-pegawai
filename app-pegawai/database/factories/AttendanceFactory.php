<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class AttendanceFactory extends Factory
{
    public function definition(): array
    {
        return [
            'karyawan_id' => Employee::factory(),
            'tanggal' => $this->faker->dateTimeBetween('-30 days', 'now'),
            'waktu_masuk' => $this->faker->time('H:i:s', '06:00:00'),
            'waktu_keluar' => $this->faker->time('H:i:s', '17:00:00'),
            'status_absensi' => $this->faker->randomElement(['hadir','sakit','izin']),
        ];
    }
}
