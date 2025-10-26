@extends('master')
@section('title', 'Form Input Departemen')
@section('content')
    <h1 class="text-2xl text-white font-bold pt-4 pb-4">Form Departemen</h1>
    <form action="{{ route('departments.store') }}" method="POST" class="max-w-md">
        @csrf
        <div class="mb-6">
            <label for="nama_departmen" class="block font-medium text-gray-400 mb-2">
                Nama Departemen
            </label>
            <input
                type="text"
                id="nama_departmen"
                name="nama_departmen"
                placeholder="Departement name"
                class="w-full p-3 border rounded-md focus:ring-2 focus:ring-gray-200 outline-none bg-gray-900 text-white"
            >
        </div>
        <div class="flex justify-start">
            <button type="submit" class="px-4 py-2 rounded bg-indigo-800 text-white font-semibold hover:bg-indigo-700 transition">
                Simpan
            </button>
        </div>
    </form>
@endsection