@extends('master')
@section('title', 'Edit Attendance')
@section('content')
    <h1 class="mb-4">Edit Attendance</h1>
    <form action="{{ route('attendances.update', $attendance->id) }}" method="POST">
        @csrf
        @method('PUT')
        <table>
            <tr>
                <td><label for="karyawan_id">Karyawan ID:</label></td>
                <td>
                    <input type="number" id="karyawan_id" name="karyawan_id"
                        value="{{ old('karyawan_id', $attendance->karyawan_id) }}" required>
                </td>
            </tr>
            <tr>
                <td><label for="tanggal">Tanggal:</label></td>
                <td>
                    <input type="date" id="tanggal" name="tanggal"
                        value="{{ old('tanggal', $attendance->tanggal) }}" required>
                </td>
            </tr>
            <tr>
                <td><label for="waktu_masuk">Waktu Masuk:</label></td>
                <td>
                    <input type="time" id="waktu_masuk" name="waktu_masuk"
                        value="{{ old('waktu_masuk', $attendance->waktu_masuk) }}">
                </td>
            </tr>
            <tr>
                <td><label for="waktu_keluar">Waktu Keluar:</label></td>
                <td>
                    <input type="time" id="waktu_keluar" name="waktu_keluar"
                        value="{{ old('waktu_keluar', $attendance->waktu_keluar) }}">
                </td>
            </tr>
            <tr>
                <td><label for="status_absensi">Status Absensi:</label></td>
                <td>
                    <select id="status_absensi" name="status_absensi" required>
                        @foreach(['Hadir','Izin','Sakit','Cuti','Alfa'] as $status)
                            <option value="{{ $status }}"
                                {{ old('status_absensi', $attendance->status_absensi) == $status ? 'selected' : '' }}>
                                {{ $status }}
                            </option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align:right;">
                    <button type="submit">Simpan</button>
                </td>
            </tr>
        </table>
    </form>
@endsection