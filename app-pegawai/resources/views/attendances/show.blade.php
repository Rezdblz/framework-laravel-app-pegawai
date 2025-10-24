@extends('master')
@section('title', 'Detail Attendance')
@section('content')

    <body>
        <h1>Detail Attendance</h1>
        <table border="1" cellpadding="8" cellspacing="0">
            <tr>
                <th>ID:</th>
                <td>{{ $attendance->id }}</td>
            </tr>
            <tr>
                <th>Nama Jabatan:</th>
                <td>{{ $attendance->karyawan_id }}</td>
            </tr>
            <tr>
                <th>Tanggal:</th>
                <td>{{ $attendance->tanggal}}</td>
            </tr>
            <tr>
                <th>Waktu masuk:</th>
                <td>{{ $attendance->waktu_masuk}}</td>
            </tr>
            <tr>
                <th>Waktu keluar:</th>
                <td>{{ $attendance->waktu_keluar}}</td>
            </tr>
            <tr>
                <th>status:</th>
                <td>{{ $attendance->status_absensi}}</td>
            </tr>
        </table>
    </body>
@endsection