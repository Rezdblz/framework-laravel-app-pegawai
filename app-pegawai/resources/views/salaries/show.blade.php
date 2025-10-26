@extends('master')
@section('title', 'Detail Gaji Pegawai')
@section('content')
    <h1 class="text-2xl text-white font-bold pt-4 pb-4">Detail Gaji Pegawai</h1>
    <table class="text-white text-left w-full max-w-md bg-gray-800 rounded shadow mb-8">
        <tr>
            <th class="pr-8 py-2">ID Karyawan</th>
            <td class="pl-4 py-2">{{ $salary->karyawan_id }}</td>
        </tr>
        <tr>
            <th class="pr-8 py-2">Bulan</th>
            <td class="pl-4 py-2">{{ $salary->bulan }}</td>
        </tr>
        <tr>
            <th class="pr-8 py-2">Gaji Pokok</th>
            <td class="pl-4 py-2">{{ $salary->gaji_pokok }}</td>
        </tr>
        <tr>
            <th class="pr-8 py-2">Tunjangan</th>
            <td class="pl-4 py-2">{{ $salary->tunjangan }}</td>
        </tr>
        <tr>
            <th class="pr-8 py-2">Potongan</th>
            <td class="pl-4 py-2">{{ $salary->potongan }}</td>
        </tr>
        <tr>
            <th class="pr-8 py-2">Total Gaji</th>
            <td class="pl-4 py-2">{{ $salary->total_gaji }}</td>
        </tr>
    </table>
@endsection