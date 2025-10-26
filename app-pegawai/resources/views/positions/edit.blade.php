@extends('master')
@section('title', 'Edit Jabatan')
@section('content')
    <h1 class="text-2xl text-white font-bold pt-4 pb-4">Edit Jabatan</h1>
    <form action="{{ route('positions.update', $position->id) }}" method="POST" class="max-w-md">
        @csrf
        @method('PUT')
        <div class="mb-6">
            <label for="nama_jabatan" class="block font-medium text-gray-400 mb-2">
                Nama Jabatan
            </label>
            <input
                type="text"
                id="nama_jabatan"
                name="nama_jabatan"
                value="{{ old('nama_jabatan', $position->nama_jabatan) }}"
                required
                class="w-full p-3 border border-gray-700 rounded-md focus:ring-2 focus:ring-indigo-500 outline-none bg-gray-800 text-white"
            >
        </div>
        <div class="mb-6">
            <label for="gaji_pokok" class="block font-medium text-gray-400 mb-2">
                Gaji Pokok
            </label>
            <input
                type="number"
                id="gaji_pokok"
                name="gaji_pokok"
                value="{{ old('gaji_pokok', $position->gaji_pokok) }}"
                required
                class="w-full p-3 border border-gray-700 rounded-md focus:ring-2 focus:ring-indigo-500 outline-none bg-gray-800 text-white"
            >
        </div>
        <div class="flex justify-start">
            <button type="submit" class="px-4 py-2 rounded bg-indigo-700 text-white font-semibold hover:bg-indigo-800 transition">
                Simpan
            </button>
        </div>
    </form>
@endsection