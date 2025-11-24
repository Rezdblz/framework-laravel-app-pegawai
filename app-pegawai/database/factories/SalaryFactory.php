<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\Position;
use Illuminate\Database\Eloquent\Factories\Factory;

class SalaryFactory extends Factory
{
    public function definition(): array
    {
        $employee = Employee::factory()->create();
        $gaji_pokok = $employee->jabatan?->gaji_pokok ?? Position::inRandomOrder()->first()?->gaji_pokok ?? 5000000;
        $tunjangan = $this->faker->numberBetween(500000, 3000000);
        $potongan = $this->faker->numberBetween(100000, 1000000);
        $total_gaji = $gaji_pokok + $tunjangan - $potongan;

        return [
            'karyawan_id' => $employee->id,
            'bulan' => $this->faker->monthName(),
            'gaji_pokok' => $gaji_pokok,
            'tunjangan' => $tunjangan,
            'potongan' => $potongan,
            'total_gaji' => $total_gaji,
        ];
    }
}
