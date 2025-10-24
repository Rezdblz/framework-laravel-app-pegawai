@extends('master')
@section('title', 'Daftar Jabatan')
@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Daftar Jabatan</h1>
        <a href="{{ route('positions.create') }}" class="btn btn-primary mb-3">Tambah Jabatan</a>
        <table border="1" cellpadding="5" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Jabatan</th>
                    <th>Gaji Pokok</th>
                </tr>
            </thead>
            <tbody>
                @foreach($positions as $position)
                    <tr>
                        <td>{{ $position->id }}</td>
                        <td>{{ $position->nama_jabatan }}</td>
                        <td>{{ $position->gaji_pokok }}</td>
                        <td>
                            <a href="{{ route('positions.show', $position->id) }}">Detail</a> |
                            <a href="{{ route('positions.edit', $position->id) }}">Edit</a> |
                            <form action="{{ route('positions.destroy', $position->id) }}" method="POST" style="display:inline;">
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