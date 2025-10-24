@extends('master')
@section('title', 'Edit Departemen')
@section('content')
    <h1 class="mb-4">Edit Departemen</h1>
    <form action="{{ route('departments.update', $department->id) }}" method="POST">
        @csrf
        @method('PUT')
        <table>
            <tr>
                    <td><label for="nama_departmen">Nama Departemen:</label></td>
                    <td><input type="text" id="nama_departmen" name="nama_departmen" value="{{ old('nama_departmen', $department->nama_departmen) }}" required></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align:right;">
                    <button type="submit">Simpan</button>
                </td>
            </tr>
        </table>
    </form>
@endsection
