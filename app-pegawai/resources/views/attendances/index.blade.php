@extends('master')
@section('title', 'Daftar Attendance')
@section('content')
    <div class="w-full mt-5 ">
        <h1 class="text-2xl font-bold text-white mb-4">Daftar Attendance</h1>
        <div class="flex justify-end mb-3">
            <a href="{{ route('attendances.create') }}"
                class="px-4 py-2 rounded bg-indigo-800 text-white font-semibold shadow hover:bg-indigo-700 transition">
                Tambah absensi
            </a>
        </div>

        <table class="table-auto w-full border-gray-600 rounded shadow">
            <thead class="text-white">
                <tr class=" text-left border-b border-gray-400">
                    <th class="px-4 py-2">ID</th>
                    <th class="px-4 py-2">ID Karyawan</th>
                    <th class="px-4 py-2">Tanggal</th>
                    <th class="px-4 py-2">Waktu masuk</th>
                    <th class="px-4 py-2">Waktu keluar</th>
                    <th class="px-4 py-2">Status Absensi</th>
                    <th class="px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-300">
                @foreach($attendances as $attendance)
                    <tr class="even:bg-gray-700 odd:bg-gray-800 border-b border-gray-600 ">
                        <td class="px-4 py-2">{{ $attendance->id }}</td>
                        <td class="px-4 py-2">{{ $attendance->karyawan_id }}</td>
                        <td class="px-4 py-2">{{ $attendance->tanggal }}</td>
                        <td class="px-4 py-2">{{ $attendance->waktu_masuk }}</td>
                        <td class="px-4 py-2">{{ $attendance->waktu_keluar }}</td>
                        <td class="px-4 py-2">
                            @if($attendance->status_absensi === 'hadir')
                                <span class="bg-emerald-600 text-white px-3 py-1 rounded-full text-xs font-semibold">
                                    {{ $attendance->status_absensi }}
                                </span>
                            @elseif($attendance->status_absensi === 'izin')
                                <span class="bg-yellow-500 text-white px-3 py-1 rounded-full text-xs font-semibold">
                                    {{ $attendance->status_absensi }}
                                </span>
                            @elseif($attendance->status_absensi === 'sakit')
                                <span class="bg-blue-500 text-white px-3 py-1 rounded-full text-xs font-semibold">
                                    {{ $attendance->status_absensi }}
                                </span>
                            @elseif($attendance->status_absensi === 'cuti')
                                <span class="bg-purple-500 text-white px-3 py-1 rounded-full text-xs font-semibold">
                                    {{ $attendance->status_absensi }}
                                </span>
                            @else
                                <span class="bg-red-600 text-white px-3 py-1 rounded-full text-xs font-semibold">
                                    {{ $attendance->status_absensi }}
                                </span>
                            @endif
                        </td>
                        <td class="px-4 py-2">
                            <a class="text-emerald-400 hover:text-emerald-600 hover:underline cursor-pointer bg-transparent border-none p-0 m-0"
                                href="{{ route('attendances.show', $attendance->id) }}">Detail</a> |
                            <a class="text-indigo-400 hover:text-indigo-600 hover:underline cursor-pointer bg-transparent border-none p-0 m-0"
                                href="{{ route('attendances.edit', $attendance->id) }}">Edit</a> |
                            <form action="{{ route('attendances.destroy', $attendance->id) }}" method="POST"
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