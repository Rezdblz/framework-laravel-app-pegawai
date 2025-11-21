<?php

namespace App\Observers;

use App\Models\Attendance;
use App\Models\RecentChange;

class AttendanceObserver
{
    public function created(Attendance $attendance)
    {
        RecentChange::create([
            'entity_type' => 'attendance',
            'entity_id' => $attendance->id,
            'action' => 'created',
            'description' => "Absensi ditambahkan untuk karyawan ID: {$attendance->karyawan_id}",
        ]);
    }

    public function updated(Attendance $attendance)
    {
        RecentChange::create([
            'entity_type' => 'attendance',
            'entity_id' => $attendance->id,
            'action' => 'updated',
            'description' => "Absensi diupdate untuk karyawan ID: {$attendance->karyawan_id}",
        ]);
    }

    public function deleted(Attendance $attendance)
    {
        RecentChange::create([
            'entity_type' => 'attendance',
            'entity_id' => $attendance->id,
            'action' => 'deleted',
            'description' => "Absensi dihapus untuk karyawan ID: {$attendance->karyawan_id}",
        ]);
    }
}
