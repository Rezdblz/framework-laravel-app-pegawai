@extends('master')
@section('title','Form Attendance')
@section('content')
<h1 class="mb-4">Form Attendance</h1>
<form action="{{ route('attendances.store') }}" method="POST">
    @csrf
    <table>
        <tr>
            <td><label for="karyawan_id">Karyawan:</label></td>
            <td>
                <input type="number" id="karyawan_id" name="karyawan_id" required>
            </td>
        </tr>
        <tr>
            <td><label for="tanggal">Tanggal:</label></td>
            <td><input type="date" id="tanggal" name="tanggal" required></td>
        </tr>
        <tr>
            <td><label for="waktu_masuk">Waktu Masuk:</label></td>
            <td><input type="time" id="waktu_masuk" name="waktu_masuk"></td>
        </tr>
        <tr>
            <td><label for="waktu_keluar">Waktu Keluar:</label></td>
            <td><input type="time" id="waktu_keluar" name="waktu_keluar"></td>
        </tr>
        <tr>
            <td><label for="status_absensi">Status Absensi:</label></td>
            <td>
                <select id="status_absensi" name="status_absensi" required>
                    <option value="" disabled selected>Pilih Status</option>
                    <option value="hadir">Hadir</option>
                    <option value="izin">Izin</option>
                    <option value="sakit">Sakit</option>
                    <option value="cuti">Cuti</option>
                    <option value="alfa">Alfa</option>
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