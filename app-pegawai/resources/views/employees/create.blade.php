@extends('master')
@section('title', 'Form Input Pegawai')
@section('content')
    <h1 class="text-2xl text-white font-bold pt-4 pb-4">Form Pegawai</h1>
    <form action="{{ route('employees.store') }}" method="POST" class="max-w-4xl">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="nama_lengkap" class="block font-medium text-gray-400 mb-1">Nama Lengkap</label>
                <input type="text" id="nama_lengkap" name="nama_lengkap"
                    class="w-full p-2 border border-gray-700 rounded-md focus:ring-2 focus:ring-indigo-500 outline-none bg-gray-800 text-white">
            </div>
            <div>
                <label for="jabatan_id" class="block font-medium text-gray-400 mb-1">Jabatan</label>
                <select id="jabatan_id" name="jabatan_id" required
                    class="w-full p-2 border border-gray-700 rounded-md bg-gray-800 text-white">
                    <option value="" disabled selected>Pilih Jabatan</option>
                    @foreach($positions as $position)
                        <option value="{{ $position->id }}">{{ $position->nama_jabatan }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="departemen_id" class="block font-medium text-gray-400 mb-1">Departemen</label>
                <select id="departemen_id" name="departemen_id" required
                    class="w-full p-2 border border-gray-700 rounded-md bg-gray-800 text-white">
                    <option value="" disabled selected>Pilih Departemen</option>
                    @foreach($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->nama_departmen }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="email" class="block font-medium text-gray-400 mb-1">Email</label>
                <input type="email" id="email" name="email"
                    class="w-full p-2 border border-gray-700 rounded-md focus:ring-2 focus:ring-indigo-500 outline-none bg-gray-800 text-white">
            </div>
            <div>
                <label for="nomor_telepon" class="block font-medium text-gray-400 mb-1">Nomor Telepon</label>
                <input type="text" id="nomor_telepon" name="nomor_telepon"
                    class="w-full p-2 border border-gray-700 rounded-md focus:ring-2 focus:ring-indigo-500 outline-none bg-gray-800 text-white">
            </div>
            <div>
                <label for="tanggal_lahir" class="block font-medium text-gray-400 mb-1">Tanggal Lahir</label>
                <input type="date" id="tanggal_lahir" name="tanggal_lahir"
                    class="w-full p-2 border border-gray-700 rounded-md bg-gray-800 text-white">
            </div>
            <div>
                <label for="alamat" class="block font-medium text-gray-400 mb-1">Alamat</label>
                <textarea id="alamat" name="alamat"
                    class="w-full p-2 border border-gray-700 rounded-md bg-gray-800 text-white"></textarea>
            </div>
            <div>
                <label for="tanggal_masuk" class="block font-medium text-gray-400 mb-1">Tanggal Masuk</label>
                <input type="date" id="tanggal_masuk" name="tanggal_masuk"
                    class="w-full p-2 border border-gray-700 rounded-md bg-gray-800 text-white">
            </div>
            <div>
                <label for="status" class="block font-medium text-gray-400 mb-1">Status</label>
                <select id="status" name="status"
                    class="w-full p-2 border border-gray-700 rounded-md bg-gray-800 text-white">
                    <option value="aktif">Aktif</option>
                    <option value="nonaktif">Nonaktif</option>
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