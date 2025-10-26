@extends('master')
@section('title', 'Edit Departemen')
@section('content')
    <h1 class="text-2xl text-white font-bold pt-4 pb-4">Edit Departemen</h1>
    <form action="{{ route('departments.update', $department->id) }}" method="POST" class="max-w-md">
        @csrf
        @method('PUT')
        <div class="mb-6">
            <label for="nama_departmen" class="block font-medium text-gray-400 mb-2">
                Nama Departemen
            </label>
            <input
                type="text"
                id="nama_departmen"
                name="nama_departmen"
                value="{{ old('nama_departmen', $department->nama_departmen) }}"
                required
                class="w-full p-3 border border-gray-700 rounded-md focus:ring-2 focus:ring-indigo-500 outline-none bg-gray-800 text-white"
            >
        </div>
        <div class="flex justify-start">
            <button type="submit" class="px-4 py-2 rounded bg-indigo-700 text-white font-semibold hover:bg-indigo-800 transition">
                Submit
            </button>
        </div>
    </form>
@endsection
