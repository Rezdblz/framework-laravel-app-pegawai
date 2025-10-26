@extends('master')
@section('title', 'Detail Pegawai')
@section('content')
<h1 class="text-2xl text-white font-bold pt-4 pb-4">Detail Pegawai</h1>
<table class="text-white text-left w-full max-w-md bg-gray-800 rounded shadow mb-8">
    <tr>
        <th class="pr-8 py-2">Nama Lengkap</th>
        <td class="pl-4 py-2">{{ $employee->nama_lengkap }}</td>
    </tr>
    <tr>
        <th class="pr-8 py-2">Jabatan</th>
        <td class="pl-4 py-2">{{ $employee->position->nama_jabatan }}</td>
    </tr>
    <tr>
        <th class="pr-8 py-2">Departemen</th>
        <td class="pl-4 py-2">{{ $employee->department->nama_departmen }}</td>
    </tr>
    <tr>
        <th class="pr-8 py-2">Email</th>
        <td class="pl-4 py-2">{{ $employee->email }}</td>
    </tr>
    <tr>
        <th class="pr-8 py-2">Nomor Telepon</th>
        <td class="pl-4 py-2">{{ $employee->nomor_telepon }}</td>
    </tr>
    <tr>
        <th class="pr-8 py-2">Tanggal Lahir</th>
        <td class="pl-4 py-2">{{ $employee->tanggal_lahir }}</td>
    </tr>
    <tr>
        <th class="pr-8 py-2">Alamat</th>
        <td class="pl-4 py-2">{{ $employee->alamat }}</td>
    </tr>
    <tr>
        <th class="pr-8 py-2">Tanggal Masuk</th>
        <td class="pl-4 py-2">{{ $employee->tanggal_masuk }}</td>
    </tr>
    <tr>
        <th class="pr-8 py-2">Status</th>
        <td class="pl-4 py-2">{{ $employee->status }}</td>
    </tr>
</table>
@endsection