@extends('master')
@section('title', 'Daftar Gaji Pegawai')
@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Daftar Gaji Pegawai</h1>
            <a href="{{ route('salaries.create') }}" class="btn btn-primary mb-3">Tambah Gaji</a>
        <table border="1" cellpadding="5" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ID karyawan</th>
                    <th>Bulan</th>
                    <th>Gaji Pokok</th>
                    <th>Tunjangan</th>
                    <th>Potongan</th>
                    <th>Total gaji</th>
                </tr>
            </thead>
            <tbody>
                @foreach($salaries as $salary)
                    <tr>
                        <td>{{ $salary->id }}</td>
                        <td>{{ $salary->karyawan_id }}</td>
                        <td>{{ $salary->bulan }}</td>
                        <td>{{ $salary->gaji_pokok }}</td>
                        <td>{{ $salary->tunjangan }}</td>
                        <td>{{ $salary->potongan }}</td>
                        <td>{{ $salary->total_gaji }}</td>
                        <td>
                            <a href="{{ route('salaries.show', $salary->id) }}">Detail</a> |
                            <a href="{{ route('salaries.edit', $salary->id) }}">Edit</a> |
                            <form action="{{ route('salaries.destroy', $salary->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Yakin ingin menghapus?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection