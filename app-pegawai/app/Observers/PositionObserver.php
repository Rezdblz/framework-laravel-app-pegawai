<?php

namespace App\Observers;

use App\Models\Position;
use App\Models\RecentChange;

class PositionObserver
{
    /**
     * Handle the Position "created" event.
     */
    public function created(Position $position): void
    {
        RecentChange::create([
            'entity_type' => 'position',
            'entity_id' => $position->id,
            'action' => 'created',
            'description' => "Jabatan {$position->nama_jabatan} ditambahkan",
        ]);
    }

    /**
     * Handle the Position "updated" event.
     */
    public function updated(Position $position): void
    {
        RecentChange::create([
            'entity_type' => 'position',
            'entity_id' => $position->id,
            'action' => 'updated',
            'description' => "Jabatan {$position->nama_jabatan} diupdate",
        ]);
    }

    /**
     * Handle the Position "deleted" event.
     */
    public function deleted(Position $position): void
    {
        RecentChange::create([
            'entity_type' => 'position',
            'entity_id' => $position->id,
            'action' => 'deleted',
            'description' => "Jabatan {$position->nama_jabatan} dihapus",
        ]);
    }

    /**
     * Handle the Position "restored" event.
     */
    public function restored(Position $position): void
    {
        //
    }

    /**
     * Handle the Position "force deleted" event.
     */
    public function forceDeleted(Position $position): void
    {
        //
    }
}
