<?php

namespace App\Http\Controllers;

use app\Models\RecentChange;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $recentChanges = RecentChange::latest()->paginate(10);
        return view('dashboard', compact('recentChanges'));
    }
}
