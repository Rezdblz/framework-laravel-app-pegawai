@extends('master')
@section('title','Form Attendance')
@section('content')
    <h1 class="text-2xl text-white font-bold pt-4 pb-4">Form Attendance</h1>
    <form action="{{ route('attendances.store') }}" method="POST" class="max-w-4xl">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="karyawan_id" class="block font-medium text-gray-400 mb-1">Karyawan</label>
                <input type="number" id="karyawan_id" name="karyawan_id" required
                    class="w-full p-2 border border-gray-700 rounded-md focus:ring-2 focus:ring-indigo-500 outline-none bg-gray-800 text-white">
            </div>
            <div>
                <label for="tanggal" class="block font-medium text-gray-400 mb-1">Tanggal</label>
                <input type="date" id="tanggal" name="tanggal" required
                    class="w-full p-2 border border-gray-700 rounded-md bg-gray-800 text-white">
            </div>
            <div>
                <label for="waktu_masuk" class="block font-medium text-gray-400 mb-1">Waktu Masuk</label>
                <input type="time" id="waktu_masuk" name="waktu_masuk"
                    class="w-full p-2 border border-gray-700 rounded-md bg-gray-800 text-white">
            </div>
            <div>
                <label for="waktu_keluar" class="block font-medium text-gray-400 mb-1">Waktu Keluar</label>
                <input type="time" id="waktu_keluar" name="waktu_keluar"
                    class="w-full p-2 border border-gray-700 rounded-md bg-gray-800 text-white">
            </div>
            <div>
                <label for="status_absensi" class="block font-medium text-gray-400 mb-1">Status Absensi</label>
                <select id="status_absensi" name="status_absensi" required
                    class="w-full p-2 border border-gray-700 rounded-md bg-gray-800 text-white">
                    <option value="" disabled selected>Pilih Status</option>
                    <option value="hadir">Hadir</option>
                    <option value="izin">Izin</option>
                    <option value="sakit">Sakit</option>
                    <option value="cuti">Cuti</option>
                    <option value="alfa">Alfa</option>
                </select>
            </div>
        </div>
        <div class="flex justify-start mt-4">
            <button type="submit" class="px-4 py-2 rounded bg-indigo-700 text-white font-semibold hover:bg-indigo-800 transition">
                Simpan
            </button>
        </div>
    </form>
@endsection