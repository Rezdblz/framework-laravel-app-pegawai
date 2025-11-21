<?php

namespace App\Observers;

use App\Models\Department;
use App\Models\RecentChange;

class DepartmentObserver
{
    /**
     * Handle the Department "created" event.
     */
    public function created(Department $department): void
    {
        RecentChange::create([
            'entity_type' => 'department',
            'entity_id' => $department->id,
            'action' => 'created',
            'description' => "Department {$department->nama_departmen} ditambahkan",
        ]);
    }

    /**
     * Handle the Department "updated" event.
     */
    public function updated(Department $department): void
    {
        RecentChange::create([
            'entity_type' => 'department',
            'entity_id' => $department->id,
            'action' => 'updated',
            'description' => "Department {$department->nama_departmen} diupdate",
        ]);
    }

    /**
     * Handle the Department "deleted" event.
     */
    public function deleted(Department $department): void
    {
        RecentChange::create([
            'entity_type' => 'department',
            'entity_id' => $department->id,
            'action' => 'deleted',
            'description' => "Department {$department->nama_departmen} dihapus",
        ]);
    }

    /**
     * Handle the Department "restored" event.
     */
    public function restored(Department $department): void
    {
        //
    }

    /**
     * Handle the Department "force deleted" event.
     */
    public function forceDeleted(Department $department): void
    {
        //
    }
}
