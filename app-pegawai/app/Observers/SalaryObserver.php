<?php

namespace App\Observers;

use App\Models\Salary;
use App\Models\RecentChange;

class SalaryObserver
{
    /**
     * Handle the Salary "created" event.
     */
    public function created(Salary $salary): void
    {
        RecentChange::create([
            'entity_type' => 'salary',
            'entity_id' => $salary->id,
            'action' => 'created',
            'description' => "Gaji ditambahkan untuk bulan {$salary->bulan}",
        ]);
    }

    /**
     * Handle the Salary "updated" event.
     */
    public function updated(Salary $salary): void
    {
        RecentChange::create([
            'entity_type' => 'salary',
            'entity_id' => $salary->id,
            'action' => 'updated',
            'description' => "Gaji diupdate untuk bulan {$salary->bulan}",
        ]);
    }

    /**
     * Handle the Salary "deleted" event.
     */
    public function deleted(Salary $salary): void
    {
        RecentChange::create([
            'entity_type' => 'salary',
            'entity_id' => $salary->id,
            'action' => 'deleted',
            'description' => "Gaji dihapus untuk bulan {$salary->bulan}",
        ]);
    }

    /**
     * Handle the Salary "restored" event.
     */
    public function restored(Salary $salary): void
    {
        //
    }

    /**
     * Handle the Salary "force deleted" event.
     */
    public function forceDeleted(Salary $salary): void
    {
        //
    }
}
