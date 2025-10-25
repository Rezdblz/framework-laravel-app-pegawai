<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    @vite('resources/css/app.css')
    <title>@yield('title', 'App Pegawai')</title>
    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            lucide.createIcons();
        });
    </script>
</head>

<body class="bg-gray-100">
    <!-- Sidebar Start -->
    <div class="flex min-h-screen">
        <div class="flex flex-col items-center w-40 h-screen overflow-hidden text-gray-400 bg-gray-900 rounded">
            <a class="flex items-center w-full px-3 mt-3" href="{{ url('/employees') }}">
                <i data-lucide="database" class="w-5 h-5"></i>
                <span class="ml-2 text-sm font-bold">@yield('page-title', 'App Pegawai')</span>
            </a>
            <div class="w-full px-2">
                <div class="flex flex-col items-center w-full mt-3 border-t border-gray-700">
                    <a class="flex items-center w-full h-12 px-3 mt-2 rounded hover:bg-gray-700 hover:text-gray-300"
                        href="{{ url('/employees') }}">
                        <i data-lucide="briefcase" class="w-5 h-5"></i>
                        <span class="ml-2 text-sm font-medium">Employee</span>
                    </a>
                    <a class="flex items-center w-full h-12 px-3 mt-2 rounded hover:bg-gray-700 hover:text-gray-300"
                        href="{{ url('/positions') }}">
                        <i data-lucide="search" class="w-5 h-5"></i>
                        <span class="ml-2 text-sm font-medium">Position</span>
                    </a>
                    <a class="flex items-center w-full h-12 px-3 mt-2 text-gray-200 bg-gray-700 rounded"
                        href="{{ url('/departments') }}">
                        <i data-lucide="bar-chart-2" class="w-5 h-5"></i>
                        <span class="ml-2 text-sm font-medium">Department</span>
                    </a>
                    <a class="flex items-center w-full h-12 px-3 mt-2 rounded hover:bg-gray-700 hover:text-gray-300"
                        href="{{ url('/attendances') }}">
                        <i data-lucide="clipboard-list" class="w-5 h-5"></i>
                        <span class="ml-2 text-sm font-medium">Attendance</span>
                    </a>
                    <a class="flex items-center w-full h-12 px-3 mt-2 rounded hover:bg-gray-700 hover:text-gray-300"
                        href="{{ url('/salaries') }}">
                        <i data-lucide="file-text" class="w-5 h-5"></i>
                        <span class="ml-2 text-sm font-medium">Salary</span>
                    </a>
                </div>
            </div>
            <!--
            <a class="flex items-center justify-center w-full h-16 mt-auto bg-gray-800 hover:bg-gray-700 hover:text-gray-300"
                href="#">
                <svg class="w-6 h-6 stroke-current" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span class="ml-2 text-sm font-medium">Account</span>
            </a>
            -->
            <div class="mt-auto mb-4 text-xs text-gray-500">
                <p>&copy; {{ date('Y') }} App Pegawai</p>
            </div>
        </div>
        <!-- Sidebar End  -->

        <!-- content start  -->
        <div class="flex-1 flex flex-col">
            <main class="flex-1 ms-4">
                @yield('content')
            </main>
        </div>
        <!-- content end  -->
    </div>
</body>

</html>