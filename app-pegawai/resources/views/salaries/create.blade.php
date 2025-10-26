@extends('master')
@section('title', 'Form Input Gaji Pegawai')
@section('content')
    <h1 class="text-2xl text-white font-bold pt-4 pb-4">Form Gaji Pegawai</h1>
    <form action="{{ route('salaries.store') }}" method="POST" class="max-w-4xl">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="karyawan_id" class="block font-medium text-gray-400 mb-1">ID Karyawan</label>
                <input type="number" id="karyawan_id" name="karyawan_id" required
                    class="w-full p-2 border border-gray-700 rounded-md focus:ring-2 focus:ring-indigo-500 outline-none bg-gray-800 text-white">
            </div>
            <div>
                <label for="bulan" class="block font-medium text-gray-400 mb-1">Bulan</label>
                <select id="bulan" name="bulan" required
                    class="w-full p-2 border border-gray-700 rounded-md bg-gray-800 text-white">
                    <option value="" disabled selected>Pilih Bulan</option>
                    <option value="Januari">Januari</option>
                    <option value="Februari">Februari</option>
                    <option value="Maret">Maret</option>
                    <option value="April">April</option>
                    <option value="Mei">Mei</option>
                    <option value="Juni">Juni</option>
                    <option value="Juli">Juli</option>
                    <option value="Agustus">Agustus</option>
                    <option value="September">September</option>
                    <option value="Oktober">Oktober</option>
                    <option value="November">November</option>
                    <option value="Desember">Desember</option>
                </select>
            </div>
            <div>
                <label for="gaji_pokok" class="block font-medium text-gray-400 mb-1">Gaji Pokok</label>
                <input type="number" id="gaji_pokok" name="gaji_pokok" required
                    class="w-full p-2 border border-gray-700 rounded-md focus:ring-2 focus:ring-indigo-500 outline-none bg-gray-800 text-white">
            </div>
            <div>
                <label for="tunjangan" class="block font-medium text-gray-400 mb-1">Tunjangan</label>
                <input type="number" id="tunjangan" name="tunjangan"
                    class="w-full p-2 border border-gray-700 rounded-md focus:ring-2 focus:ring-indigo-500 outline-none bg-gray-800 text-white">
            </div>
            <div>
                <label for="potongan" class="block font-medium text-gray-400 mb-1">Potongan</label>
                <input type="number" id="potongan" name="potongan"
                    class="w-full p-2 border border-gray-700 rounded-md focus:ring-2 focus:ring-indigo-500 outline-none bg-gray-800 text-white">
            </div>
        </div>
        <div class="flex justify-start mt-4">
            <button type="submit" class="px-4 py-2 rounded bg-indigo-700 text-white font-semibold hover:bg-indigo-800 transition">
                Simpan
            </button>
        </div>
    </form>
@endsection