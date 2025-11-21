<?php

namespace App\Http\Controllers;

use App\Models\RecentChange;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $recentChanges = RecentChange::latest()->paginate(10);
        $totalChanges = RecentChange::count();
        $createdCount = RecentChange::where('action', 'created')->count();
        $updatedCount = RecentChange::where('action', 'updated')->count();
        $deletedCount = RecentChange::where('action', 'deleted')->count();
        
        $entityCounts = RecentChange::select('entity_type', DB::raw('count(*) as count'))
            ->groupBy('entity_type')
            ->get();

        return view('dashboard.index', compact(
            'recentChanges',
            'totalChanges',
            'createdCount',
            'updatedCount',
            'deletedCount',
            'entityCounts'
        ));
    }
}
