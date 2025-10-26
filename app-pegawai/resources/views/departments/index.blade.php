@extends('master')
@section('title', 'Daftar Departemen')
@section('content')
    <div class="w-full mt-5">
        <h1 class="text-2xl font-bold text-white mb-4">Daftar Departemen</h1>
        <div class="flex justify-end mb-3">
            <a href="{{ route('departments.create') }}"
                class="px-4 py-2 rounded bg-indigo-800 text-white font-semibold shadow hover:bg-indigo-700 transition">
                Tambah Departemen
            </a>
        </div>
        <table class="table-auto w-full border-gray-600 rounded shadow ">
            <thead class="text-white">
                <tr class=" text-left border-b border-gray-400">
                    <th class="px-4 py-2">ID</th>
                    <th class="px-4 py-2">Nama Departmen</th>
                    <th class="px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-300">
                @foreach($departments as $department)
                    <tr class="even:bg-gray-700 odd:bg-gray-800 border-b border-gray-600">
                        <td class="px-4 py-2">{{ $department->id }}</td>
                        <td class="px-4 py-2">{{ $department->nama_departmen }}</td>
                        <td class="px-4 py-2">
                            <a class="text-emerald-400 hover:text-emerald-600 hover:underline cursor-pointer bg-transparent border-none p-0 m-0"
                                href="{{ route('departments.show', $department->id) }}">Detail</a> |
                            <a class="text-indigo-400 hover:text-indigo-600 hover:underline cursor-pointer bg-transparent border-none p-0 m-0"
                                href="{{ route('departments.edit', $department->id) }}">Edit</a> |
                            <form action="{{ route('departments.destroy', $department->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button
                                    class="text-rose-400 hover:text-rose-600 hover:underline cursor-pointer bg-transparent border-none p-0 m-0"
                                    type="submit" onclick="return confirm('Yakin ingin menghapus?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection