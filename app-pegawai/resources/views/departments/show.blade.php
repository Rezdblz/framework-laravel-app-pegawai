@extends('master')
@section('title', 'Detail Departemen')
@section('content')

<body>
    <h1>Detail Gaji Pegawai</h1>
    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>ID</th>
            <td>{{ $department->id }}</td>
        </tr>
        <tr>
            <th>Nama Departemen</th>
            <td>{{ $department->nama_departmen }}</td>
        </tr>
    </table>
</body>
@endsection