@extends('master')
@section('title', 'Detail Departemen')
@section('content')
    <h1 class="text-2xl text-white font-bold pt-4 pb-4">Detail Departemen</h1>
    <table class="text-white text-left w-full max-w-md bg-gray-800 rounded shadow mb-8">
        <tr>
            <th class="pr-8 py-2">ID</th>
            <td class="pl-4 py-2">{{ $department->id }}</td>
        </tr>
        <tr>
            <th class="pr-8 py-2">Nama Departemen</th>
            <td class="pl-4 py-2">{{ $department->nama_departmen }}</td>
        </tr>
    </table>
@endsection