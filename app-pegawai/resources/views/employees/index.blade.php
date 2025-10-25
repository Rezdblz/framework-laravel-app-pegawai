@extends('master')
@section('title', 'Daftar Pegawai')
@section('content')
    <div class="w-full mt-5 ">
        <h1 class="text-2xl font-bold text-white mb-4">Daftar Pegawai</h1>
        <div class="flex justify-end mb-3">
            <a href="{{ route('employees.create') }}"
                class="px-4 py-2 rounded bg-indigo-800 text-white font-semibold shadow hover:bg-indigo-700 transition">
                Tambah Pegawai
            </a>
        </div>

        <table class="table-auto w-full border-gray-600 rounded shadow ">
            <thead class="text-white">
                <tr class=" text-left border-b border-gray-400">
                    <th class="px-4 py-2">Nama Lengkap</th>
                    <th class="px-4 py-2">jabatan</th>
                    <th class="px-4 py-2">departemen</th>
                    <th class="px-4 py-2">Email</th>
                    <th class="px-4 py-2">Nomor Telepon</th>
                    <th class="px-4 py-2">Tanggal Lahir</th>
                    <th class="px-4 py-2">Alamat</th>
                    <th class="px-4 py-2">Tanggal Masuk</th>
                    <th class="px-4 py-2">Status</th>
                    <th class="px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-300">
                @foreach($employees as $employee)
                    <tr class="even:bg-gray-700 odd:bg-gray-800 border-b border-gray-600 ">
                        <td class="px-4 py-2">{{ $employee->nama_lengkap }}</td>
                        <td class="px-4 py-2">{{ $employee->position->nama_jabatan}}</td>
                        <td class="px-4 py-2">{{ $employee->department->nama_departmen ?? '-' }}</td>
                        <td class="px-4 py-2">{{ $employee->email }}</td>
                        <td class="px-4 py-2">{{ $employee->nomor_telepon }}</td>
                        <td class="px-4 py-2">{{ $employee->tanggal_lahir }}</td>
                        <td class="px-4 py-2">{{ $employee->alamat }}</td>
                        <td class="px-4 py-2">{{ $employee->tanggal_masuk }}</td>
                        <td class="px-4 py-2">@if($employee->status === 'aktif')
                            <span class="bg-emerald-600 text-white px-3 py-1 rounded-full text-xs font-semibold">
                                {{ $employee->status }}
                            </span>
                        @else
                                <span class="bg-red-600 text-white px-3 py-1 rounded-full text-xs font-semibold">
                                    {{ $employee->status }}
                                </span>
                            @endif
                        </td>
                        <td class="px-4 py-2">
                            <a class="text-emerald-400 hover:text-emerald-600 hover:underline cursor-pointer bg-transparent border-none p-0 m-0"
                                href="{{ route('employees.show', $employee->id) }}">Detail</a>
                            <a class="text-indigo-400 hover:text-indigo-600 hover:underline cursor-pointer bg-transparent border-none p-0 m-0"
                                href="{{ route('employees.edit', $employee->id) }}">Edit</a>
                            <form action="{{ route('employees.destroy', $employee->id) }}" method="POST"
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