@extends('master')
@section('title', 'Detail Jabatan')
@section('content')

    <body>
        <h1>Detail Gaji Pegawai</h1>
        <table border="1" cellpadding="8" cellspacing="0">
            <tr>
                <th>ID</th>
                <td>{{ $position->id }}</td>
            </tr>
            <tr>
                <th>Nama Jabatan</th>
                <td>{{ $position->nama_jabatan }}</td>
            </tr>
            <tr>
                <th>Gaji Pokok</th>
                <td>{{ $position->gaji_pokok }}</td>
            </tr>
        </table>
    </body>
@endsection