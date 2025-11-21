<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>@yield('title', 'App Pegawai')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.png') }}">
    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            lucide.createIcons();
        });
    </script>
</head>

<body class="bg-slate-800">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div id="sidebar" class="w-40 bg-gray-900 text-gray-400 overflow-y-auto transition-all duration-300 ease-in-out flex flex-col md:translate-x-0 fixed md:static h-full z-40 -translate-x-full">
            <a class="flex items-center w-full px-3 mt-3" href="{{ url('/') }}">
                <i data-lucide="database" class="w-10 h-10"></i>
                <span class="ml-2 text-base font-bold">App Pegawai</span>
            </a>
            <div class="w-full px-2 flex-1">
                <div class="flex flex-col w-full mt-3 border-t border-gray-700">
                    <a class="flex items-center w-full h-12 px-3 mt-2 rounded hover:bg-gray-700 hover:text-gray-300 transition {{ Request::is('dashboard*') ? 'bg-gray-800 text-white' : '' }}" href="{{ url('/dashboard') }}">
                        <i data-lucide="layout-dashboard" class="w-5 h-5 shrink-0"></i>
                        <span class="ml-2 text-sm font-medium">Dashboard</span>
                    </a>
                    <a class="flex items-center w-full h-12 px-3 mt-2 rounded hover:bg-gray-700 hover:text-gray-300 transition {{ Request::is('employees*') ? 'bg-gray-800 text-white' : '' }}" href="{{ url('/employees') }}">
                        <i data-lucide="briefcase" class="w-5 h-5 shrink-0"></i>
                        <span class="ml-2 text-sm font-medium">Employee</span>
                    </a>
                    <a class="flex items-center w-full h-12 px-3 mt-2 rounded hover:bg-gray-700 hover:text-gray-300 transition {{ Request::is('positions*') ? 'bg-gray-800 text-white' : '' }}" href="{{ url('/positions') }}">
                        <i data-lucide="search" class="w-5 h-5 shrink-0"></i>
                        <span class="ml-2 text-sm font-medium">Position</span>
                    </a>
                    <a class="flex items-center w-full h-12 px-3 mt-2 rounded hover:bg-gray-700 hover:text-gray-300 transition {{ Request::is('departments*') ? 'bg-gray-800 text-white' : '' }}" href="{{ url('/departments') }}">
                        <i data-lucide="bar-chart-2" class="w-5 h-5 shrink-0"></i>
                        <span class="ml-2 text-sm font-medium">Department</span>
                    </a>
                    <a class="flex items-center w-full h-12 px-3 mt-2 rounded hover:bg-gray-700 hover:text-gray-300 transition {{ Request::is('attendances*') ? 'bg-gray-800 text-white' : '' }}" href="{{ url('/attendances') }}">
                        <i data-lucide="clipboard-list" class="w-5 h-5 shrink-0"></i>
                        <span class="ml-2 text-sm font-medium">Attendance</span>
                    </a>
                    <a class="flex items-center w-full h-12 px-3 mt-2 rounded hover:bg-gray-700 hover:text-gray-300 transition {{ Request::is('salaries*') ? 'bg-gray-800 text-white' : '' }}" href="{{ url('/salaries') }}">
                        <i data-lucide="banknote-arrow-down" class="w-5 h-5 shrink-0"></i>
                        <span class="ml-2 text-sm font-medium">Salary</span>
                    </a>
                </div>
            </div>
            <div class="mb-4 text-xs text-gray-500 px-3">
                <p>&copy; {{ date('Y') }} App Pegawai</p>
            </div>
        </div>

        <!-- Mobile Menu Button -->
        <button id="menuBtn" class="md:hidden fixed top-4 left-4 z-50 p-2 bg-gray-900 rounded text-gray-400 hover:text-white">
            <i data-lucide="menu" class="w-6 h-6"></i>
        </button>

        <!-- Overlay for mobile -->
        <div id="overlay" class="fixed inset-0 bg-black/50 md:hidden hidden z-30" onclick="closeSidebar()"></div>

        <!-- Main Content -->
        <div class="flex-1 overflow-y-auto">
            <main class="p-4 md:p-6">
                @yield('content')
            </main>
        </div>
    </div>

    <script>
        const sidebar = document.getElementById('sidebar');
        const menuBtn = document.getElementById('menuBtn');
        const overlay = document.getElementById('overlay');

        menuBtn.addEventListener('click', function() {
            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        });

        function closeSidebar() {
            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
        }

        // Close sidebar when clicking on a link
        document.querySelectorAll('#sidebar a').forEach(link => {
            link.addEventListener('click', closeSidebar);
        });
    </script>
</body>

</html>