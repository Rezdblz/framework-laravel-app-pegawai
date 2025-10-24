@extends('master')
@section('title', 'Detail Gaji Pegawai')
@section('content')
<body>
    <h1>Detail Gaji Pegawai</h1>
    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>ID Karyawan</th>
            <td>{{ $salary->karyawan_id }}</td>
        </tr>
        <tr>
            <th>Bulan</th>
            <td>{{ $salary->bulan }}</td>
        </tr>
        <tr>
            <th>Gaji Pokok</th>
            <td>{{ $salary->gaji_pokok }}</td>
        </tr>
        <tr>
            <th>Tunjangan</th>
            <td>{{ $salary->tunjangan }}</td>
        </tr>
        <tr>
            <th>Potongan</th>
            <td>{{ $salary->potongan }}</td>
        </tr>
        <tr>
            <th>Total Gaji</th>
            <td>{{ $salary->total_gaji }}</td>
        </tr>
    </table>
</body>
@endsection