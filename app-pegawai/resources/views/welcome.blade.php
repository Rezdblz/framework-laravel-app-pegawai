@extends('master')
@section('title', 'Welcome - App Pegawai')
@section('content')
    <div class="flex items-center justify-center min-h-screen">
        <div class="text-center">
            <div class="mb-8">
                <i data-lucide="database" class="w-24 h-24 mx-auto text-indigo-500"></i>
            </div>
            <h1 class="text-5xl font-bold text-white mb-4">App Pegawai</h1>
            <p class="text-xl text-gray-400 mb-8">Sistem Manajemen Data Karyawan</p>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-4xl mx-auto mb-12">
                <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
                    <i data-lucide="users" class="w-12 h-12 mx-auto text-emerald-500 mb-4"></i>
                    <h3 class="text-lg font-semibold text-white mb-2">Kelola Karyawan</h3>
                    <p class="text-gray-400 text-sm">Manajemen data karyawan dengan mudah</p>
                </div>
                <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
                    <i data-lucide="clipboard-check" class="w-12 h-12 mx-auto text-blue-500 mb-4"></i>
                    <h3 class="text-lg font-semibold text-white mb-2">Absensi</h3>
                    <p class="text-gray-400 text-sm">Pantau kehadiran karyawan</p>
                </div>
                <div class="bg-gray-800 p-6 rounded-lg shadow-lg">
                    <i data-lucide="dollar-sign" class="w-12 h-12 mx-auto text-yellow-500 mb-4"></i>
                    <h3 class="text-lg font-semibold text-white mb-2">Gaji</h3>
                    <p class="text-gray-400 text-sm">Kelola penggajian karyawan</p>
                </div>
            </div>

            <div class="flex gap-4 justify-center">
                <a href="{{ url('/employees') }}" 
                   class="px-6 py-3 rounded-lg bg-indigo-700 text-white font-semibold hover:bg-indigo-800 transition">
                    Mulai Sekarang
                </a>
            </div>
        </div>
    </div>
@endsection