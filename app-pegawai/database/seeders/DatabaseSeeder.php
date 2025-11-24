<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Department;
use App\Models\Position;
use App\Models\Employee;
use App\Models\Attendance;
use App\Models\Salary;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create users
        User::factory(5)->create();

        // Create departments
        $departments = Department::factory(3)->create();

        // Create positions
        $positions = Position::factory(5)->create();

        // Create employees with departments and positions
        $employees = Employee::factory(20)->recycle($departments)->recycle($positions)->create();

        // Create attendance records
        Attendance::factory(50)->recycle($employees)->create();

        // Create salary records (factory handles employee creation internally)
        Salary::factory(20)->create();
    }
}
