@extends('master')
@section('title', 'Daftar Attendance')
@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Daftar Attendance</h1>
        <a href="{{ route('attendances.create') }}" class="btn btn-primary mb-3">Tambah absensi</a>
        <table border="1" cellpadding="5" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ID Karyawan</th>
                    <th>Tanggal</th>
                    <th>Waktu masuk</th>
                    <th>Waktu keluar</th>
                    <th>status absensi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($attendances as $attendance)
                    <tr>
                        <td>{{ $attendance->id }}</td>
                        <td>{{ $attendance->karyawan_id }}</td>
                        <td>{{ $attendance->tanggal }}</td>
                        <td>{{ $attendance->waktu_masuk }}</td>
                        <td>{{ $attendance->waktu_keluar }}</td>
                        <td>{{ $attendance->status_absensi }}</td>
                        <td>
                            <a href="{{ route('attendances.show', $attendance->id) }}">Detail</a> |
                            <a href="{{ route('attendances.edit', $attendance->id) }}">Edit</a> |
                            <form action="{{ route('attendances.destroy', $attendance->id) }}" method="POST" style="display:inline;">
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