@extends('master')
@section('title', 'Detail Attendance')
@section('content')
    <h1 class="text-2xl text-white font-bold pt-4 pb-4">Detail Attendance</h1>
    <table class="text-white text-left w-full max-w-md bg-gray-800 rounded shadow mb-8">
        <tr>
            <th class="pr-8 py-2">ID</th>
            <td class="pl-4 py-2">{{ $attendance->id }}</td>
        </tr>
        <tr>
            <th class="pr-8 py-2">ID Karyawan</th>
            <td class="pl-4 py-2">{{ $attendance->karyawan_id }}</td>
        </tr>
        <tr>
            <th class="pr-8 py-2">Tanggal</th>
            <td class="pl-4 py-2">{{ $attendance->tanggal }}</td>
        </tr>
        <tr>
            <th class="pr-8 py-2">Waktu Masuk</th>
            <td class="pl-4 py-2">{{ $attendance->waktu_masuk }}</td>
        </tr>
        <tr>
            <th class="pr-8 py-2">Waktu Keluar</th>
            <td class="pl-4 py-2">{{ $attendance->waktu_keluar }}</td>
        </tr>
        <tr>
            <th class="pr-8 py-2">Status</th>
            <td class="pl-4 py-2">{{ $attendance->status_absensi }}</td>
        </tr>
    </table>
@endsection