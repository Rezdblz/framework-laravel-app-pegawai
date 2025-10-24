@extends('master')
@section('title', 'Edit Gaji Pegawai')
@section('content')
    <h1 class="mb-4">Edit Gaji Pegawai</h1>
    <form action="{{ route('salaries.update', $salary->id) }}" method="POST">
        @csrf
        @method('PUT')
        <table>
            <tr>
                <td><label for="karyawan_id">ID Karyawan:</label></td>
                <td>
                    <input type="number" id="karyawan_id" name="karyawan_id"
                        value="{{ old('karyawan_id', $salary->karyawan_id) }}" required>
                </td>
            </tr>
            <tr>
                <td><label for="bulan">Bulan:</label></td>
                <td>
                    <select id="bulan" name="bulan" required>
                        @foreach([
                            'Januari',
                            'Februari',
                            'Maret',
                            'April',
                            'Mei',
                            'Juni',
                            'Juli',
                            'Augustus',
                            'September',
                            'Oktober',
                            'November',
                            'Desember'
                            ] as $bulan)
                            <option value="{{ $bulan }}"
                                {{ old('bulan', $salary->bulan) == $bulan ? 'selected' : '' }}>
                                {{ $bulan }}
                            </option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="gaji_pokok">Gaji Pokok:</label></td>
                <td>
                    <input type="number" id="gaji_pokok" name="gaji_pokok"
                        value="{{ old('gaji_pokok', $salary->gaji_pokok) }}" required>
                </td>
            </tr>
            <tr>
                <td><label for="tunjangan">Tunjangan:</label></td>
                <td>
                    <input type="number" id="tunjangan" name="tunjangan"
                        value="{{ old('tunjangan', $salary->tunjangan) }}">
                </td>
            </tr>
            <tr>
                <td><label for="potongan">Potongan:</label></td>
                <td>
                    <input type="number" id="potongan" name="potongan"
                        value="{{ old('potongan', $salary->potongan) }}">
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