@extends('master')
@section('title', 'Daftar Jabatan')
@section('content')
    <div class="w-full mt-5 ">
        <h1 class="text-2xl font-bold text-white mb-4">Daftar Jabatan</h1>
        <div class="flex justify-end mb-3">
            <a href="{{ route('positions.create') }}"
                class="px-4 py-2 rounded bg-indigo-800 text-white font-semibold shadow hover:bg-indigo-700 transition">
                Tambah Jabatan
            </a>
        </div>

        <table class="table-auto w-full border-gray-600 rounded shadow ">
            <thead class="text-white">
                <tr class=" text-left border-b border-gray-400">
                    <th class="px-4 py-2">ID</th>
                    <th class="px-4 py-2">Nama Jabatan</th>
                    <th class="px-4 py-2">Gaji Pokok</th>
                    <th class="px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-300">
                @foreach($positions as $position)
                    <tr class="even:bg-gray-700 odd:bg-gray-800 border-b border-gray-600 ">
                        <td class="px-4 py-2">{{ $position->id }}</td>
                        <td class="px-4 py-2">{{ $position->nama_jabatan }}</td>
                        <td class="px-4 py-2">{{ $position->gaji_pokok }}</td>
                        <td class="px-4 py-2">
                            <a class="text-emerald-400 hover:text-emerald-600 hover:underline cursor-pointer bg-transparent border-none p-0 m-0"
                                href="{{ route('positions.show', $position->id) }}">Detail</a> |
                            <a class="text-indigo-400 hover:text-indigo-600 hover:underline cursor-pointer bg-transparent border-none p-0 m-0"
                                href="{{ route('positions.edit', $position->id) }}">Edit</a> |
                            <form action="{{ route('positions.destroy', $position->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="text-rose-400 hover:text-rose-600 hover:underline cursor-pointer bg-transparent border-none p-0 m-0"
                                    onclick="return confirm('Yakin ingin menghapus?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection