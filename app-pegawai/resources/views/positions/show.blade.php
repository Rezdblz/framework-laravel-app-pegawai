@extends('master')
@section('title', 'Detail Jabatan')
@section('content')
    <h1 class="text-2xl text-white font-bold pt-4 pb-4">Detail Jabatan</h1>
    <table class="text-white text-left w-full max-w-md bg-gray-800 rounded shadow mb-8">
        <tr>
            <th class="pr-8 py-2">ID</th>
            <td class="pl-4 py-2">{{ $position->id }}</td>
        </tr>
        <tr>
            <th class="pr-8 py-2">Nama Jabatan</th>
            <td class="pl-4 py-2">{{ $position->nama_jabatan }}</td>
        </tr>
        <tr>
            <th class="pr-8 py-2">Gaji Pokok</th>
            <td class="pl-4 py-2">{{ $position->gaji_pokok }}</td>
        </tr>
    </table>
@endsection