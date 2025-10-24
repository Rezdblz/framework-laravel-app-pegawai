@extends('master')
@section('title','Form Jabatan')
@section('content')
    <h1 class="mb-4">Form Jabatan</h1>
    <form action="{{ route('positions.store') }}" method="POST">
        @csrf
        <table>
            <tr>
                <td><label for="nama_jabatan">Nama Jabatan:</label></td>
                <td><input type="text" id="nama_jabatan" name="nama_jabatan" required></td>
            </tr>
            <tr>
                <td><label for="gaji_pokok">Gaji Pokok:</label></td>
                <td><input type="number" id="gaji_pokok" name="gaji_pokok" required></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align:right;">
                    <button type="submit">Simpan</button>
                </td>
            </tr>
        </table>
    </form>
@endsection