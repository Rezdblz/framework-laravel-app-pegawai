@extends('master')
@section('title', 'Form Input Gaji Pegawai')
@section('content')
    <h1 class="mb-4">Form Gaji Pegawai</h1>
    <form action="{{ route('salaries.store') }}" method="POST">
        @csrf
        <table>
            <tr>
                <td><label for="karyawan_id">ID Karyawan</label></td>
                <td><input type="number" id="karyawan_id" name="karyawan_id" required></td>
            </tr>
            <tr>
                <td><label for="bulan">Bulan:</label></td>
                <td>
                <select id="bulan" name="bulan" required>
                    <option value="Januari">Januari</option>
                    <option value="Februari">Februari</option>
                    <option value="Maret">Maret</option>
                    <option value="April">April</option>
                    <option value="Mei">Mei</option>
                    <option value="Juni">Juni</option>
                    <option value="Juli">Juli</option>
                    <option value="Augustus">Augustus</option>
                    <option value="September">September</option>
                    <option value="Oktober">Oktober</option>
                    <option value="November">November</option>
                    <option value="Desember">Desember</option>
                </select>
                </td>
            </tr>
            <tr>
                <td><label for="gaji_pokok">Gaji Pokok:</label></td>
                <td><input type="number" id="gaji_pokok" name="gaji_pokok" required></td>
            </tr>
            <tr>
                <td><label for="tunjangan">Tunjangan:</label></td>
                <td><input type="number" id="tunjangan" name="tunjangan"></td>
            </tr>
            <tr>
                <td><label for="potongan">Potongan:</label></td>
                <td><input type="number" id="potongan" name="potongan"></input></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align:right;">
                    <button type="submit">Simpan</button>
                </td>
            </tr>
        </table>
    </form>
@endsection