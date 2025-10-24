@extends('master')
@section('title', 'Form Input Departemen')
@section('content')
    <h1 class="mb-4">Form Departemen</h1>
    <form action="{{ route('departments.store') }}" method="POST">
        @csrf
        <table>
            <tr>
                <td><label for="nama_departmen">Nama Departemen</label></td>
                <td><input type="text" id="nama_departmen" name="nama_departmen"></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align:right;">
                    <button type="submit">Simpan</button>
                </td>
            </tr>
        </table>
    </form>
@endsection