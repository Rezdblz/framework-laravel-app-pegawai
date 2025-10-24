@extends('master')
@section('title', 'Edit Jabatan')
@section('content')
    <h1 class="mb-4">Edit Jabatan</h1>
    <form action="{{ route('positions.update', $position->id) }}" method="POST">
        @csrf
        @method('PUT')
        <table>
            <tr>
                <td><label for="nama_jabatan">Nama Jabatan:</label></td>
                <td>
                    <input type="text" id="nama_jabatan" name="nama_jabatan"
                        value="{{ old('nama_jabatan', $position->nama_jabatan) }}" required>
                </td>
            </tr>
            <tr>
                <td><label for="gaji_pokok">Gaji Pokok:</label></td>
                <td>
                    <input type="number" id="gaji_pokok" name="gaji_pokok"
                        value="{{ old('gaji_pokok', $position->gaji_pokok) }}" required>
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