<?php

namespace App\Observers;

use App\Models\Employee;
use App\Models\RecentChange;

class EmployeeObserver
{
    /**
     * Handle the Employee "created" event.
     */
    public function created(Employee $employee): void
    {
        RecentChange::create([
            'entity_type' => 'employee',
            'entity_id' => $employee->id,
            'action' => 'created',
            'description' => "Pegawai {$employee->nama_lengkap} ditambahkan",
        ]);
    }

    /**
     * Handle the Employee "updated" event.
     */
    public function updated(Employee $employee): void
    {
        RecentChange::create([
            'entity_type' => 'employee',
            'entity_id' => $employee->id,
            'action' => 'updated',
            'description' => "Pegawai {$employee->nama_lengkap} diupdate",
        ]);
    }

    /**
     * Handle the Employee "deleted" event.
     */
    public function deleted(Employee $employee): void
    {
        RecentChange::create([
            'entity_type' => 'employee',
            'entity_id' => $employee->id,
            'action' => 'deleted',
            'description' => "Pegawai {$employee->nama_lengkap} dihapus",
        ]);
    }

    /**
     * Handle the Employee "restored" event.
     */
    public function restored(Employee $employee): void
    {
        //
    }

    /**
     * Handle the Employee "force deleted" event.
     */
    public function forceDeleted(Employee $employee): void
    {
        //
    }
}
