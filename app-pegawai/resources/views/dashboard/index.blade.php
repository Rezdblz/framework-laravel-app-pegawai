@extends('master')
@section('title', 'Dashboard')
@section('content')
    <h1 class="text-3xl text-white font-bold pt-4 pb-6">Dashboard</h1>
    
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
        <!-- Total Changes -->
        <div class="bg-gray-800 rounded-lg border border-gray-700 p-6">
            <div class="text-gray-400 text-sm">Total Changes</div>
            <div class="text-3xl text-white font-bold">{{ $totalChanges }}</div>
        </div>
        
        <!-- Created Count -->
        <div class="bg-gray-800 rounded-lg border border-gray-700 p-6">
            <div class="text-gray-400 text-sm">Created</div>
            <div class="text-3xl text-emerald-500 font-bold">{{ $createdCount }}</div>
        </div>
        
        <!-- Updated Count -->
        <div class="bg-gray-800 rounded-lg border border-gray-700 p-6">
            <div class="text-gray-400 text-sm">Updated</div>
            <div class="text-3xl text-yellow-500 font-bold">{{ $updatedCount }}</div>
        </div>
        
        <!-- Deleted Count -->
        <div class="bg-gray-800 rounded-lg border border-gray-700 p-6">
            <div class="text-gray-400 text-sm">Deleted</div>
            <div class="text-3xl text-red-500 font-bold">{{ $deletedCount }}</div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
        <!-- Actions Distribution Pie Chart -->
        <div class="bg-gray-800 rounded-lg border border-gray-700 p-6">
            <h2 class="text-xl text-white font-bold mb-4">Actions Distribution</h2>
            <canvas id="actionsChart"></canvas>
        </div>

        <!-- Entity Type Bar Chart -->
        <div class="bg-gray-800 rounded-lg border border-gray-700 p-6">
            <h2 class="text-xl text-white font-bold mb-4">Changes by Entity</h2>
            <canvas id="entityChart"></canvas>
        </div>
    </div>

    <!-- Recent Changes Table -->
    <div class="bg-gray-800 rounded-lg border border-gray-700 p-6">
        <h2 class="text-xl text-white font-bold mb-4">Recent Changes</h2>
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-gray-400">
                <thead class="text-xs text-gray-300 border-b border-gray-700">
                    <tr>
                        <th class="px-4 py-3 text-left">Entity Type</th>
                        <th class="px-4 py-3 text-left">Action</th>
                        <th class="px-4 py-3 text-left">Description</th>
                        <th class="px-4 py-3 text-left">Time</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($recentChanges as $change)
                        <tr class="border-b border-gray-700 hover:bg-gray-700">
                            <td class="px-4 py-3">
                                <span class="bg-indigo-600 text-white px-3 py-1 rounded-full text-xs font-semibold">
                                    {{ ucfirst($change->entity_type) }}
                                </span>
                            </td>
                            <td class="px-4 py-3">
                                @if($change->action === 'created')
                                    <span class="bg-emerald-600 text-white px-3 py-1 rounded-full text-xs font-semibold">Created</span>
                                @elseif($change->action === 'updated')
                                    <span class="bg-yellow-600 text-white px-3 py-1 rounded-full text-xs font-semibold">Updated</span>
                                @elseif($change->action === 'deleted')
                                    <span class="bg-red-600 text-white px-3 py-1 rounded-full text-xs font-semibold">Deleted</span>
                                @endif
                            </td>
                            <td class="px-4 py-3">{{ $change->description }}</td>
                            <td class="px-4 py-3 text-gray-500">{{ $change->created_at->diffForHumans() }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $recentChanges->links() }}
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Actions Distribution Pie Chart
        const actionsCtx = document.getElementById('actionsChart').getContext('2d');
        new Chart(actionsCtx, {
            type: 'doughnut',
            data: {
                labels: ['Created', 'Updated', 'Deleted'],
                datasets: [{
                    data: [{{ $createdCount }}, {{ $updatedCount }}, {{ $deletedCount }}],
                    backgroundColor: ['#10b981', '#eab308', '#ef4444'],
                    borderColor: '#1f2937',
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        labels: { color: '#9ca3af' }
                    }
                }
            }
        });

        // Entity Type Bar Chart
        const entityCtx = document.getElementById('entityChart').getContext('2d');
        new Chart(entityCtx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($entityCounts->pluck('entity_type')) !!},
                datasets: [{
                    label: 'Changes',
                    data: {!! json_encode($entityCounts->pluck('count')) !!},
                    backgroundColor: '#6366f1',
                    borderColor: '#4f46e5',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        labels: { color: '#9ca3af' }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: { color: '#9ca3af' }
                    },
                    x: {
                        ticks: { color: '#9ca3af' }
                    }
                }
            }
        });
    </script>
@endsection