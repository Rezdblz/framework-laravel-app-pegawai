@extends('master')
@section('title', 'Edit Gaji Pegawai')
@section('content')
    <h1 class="text-2xl text-white font-bold pt-4 pb-4">Edit Gaji Pegawai</h1>
    <form action="{{ route('salaries.update', $salary->id) }}" method="POST" class="max-w-4xl">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block font-medium text-gray-400 mb-1">Karyawan</label>
                <input type="hidden" id="karyawan_id" name="karyawan_id"
                    value="{{ old('karyawan_id', $salary->karyawan_id) }}">
                <div class="w-full p-2 border border-gray-700 rounded-md bg-gray-800 text-white">
                    <div class="font-medium text-white">{{ optional($salary->employee)->nama_lengkap ?? '-' }}</div>
                    <div class="text-xs text-gray-400">ID: {{ $salary->karyawan_id }}</div>
                </div>
            </div>
            <div>
                <label for="bulan" class="block font-medium text-gray-400 mb-1">Bulan</label>
                <select id="bulan" name="bulan" required
                    class="w-full p-2 border border-gray-700 rounded-md bg-gray-800 text-white">
                    @foreach(['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'] as $bulan)
                        <option value="{{ $bulan }}" {{ old('bulan', $salary->bulan) == $bulan ? 'selected' : '' }}>
                            {{ $bulan }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="gaji_pokok" class="block font-medium text-gray-400 mb-1">Gaji Pokok</label>
                <input type="number" id="gaji_pokok" name="gaji_pokok" 
                    value="{{ old('gaji_pokok', $salary->gaji_pokok ?? '') }}" readonly
                    class="w-full p-2 border border-gray-700 rounded-md bg-gray-800 text-white opacity-75">
            </div>
            <div>
                <label for="tunjangan" class="block font-medium text-gray-400 mb-1">Tunjangan</label>
                <input type="number" id="tunjangan" name="tunjangan" value="{{ old('tunjangan', $salary->tunjangan) }}"
                    class="w-full p-2 border border-gray-700 rounded-md focus:ring-2 focus:ring-indigo-500 outline-none bg-gray-800 text-white">
            </div>
            <div>
                <label for="potongan" class="block font-medium text-gray-400 mb-1">Potongan</label>
                <input type="number" id="potongan" name="potongan" value="{{ old('potongan', $salary->potongan) }}"
                    class="w-full p-2 border border-gray-700 rounded-md focus:ring-2 focus:ring-indigo-500 outline-none bg-gray-800 text-white">
            </div>
        </div>
        <div class="flex justify-start mt-4">
            <button type="submit"
                class="px-4 py-2 rounded bg-indigo-700 text-white font-semibold hover:bg-indigo-800 transition">
                Update
            </button>
        </div>
    </form>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const select = document.getElementById('karyawan_id');
        const gajiInput = document.getElementById('gaji_pokok');

        if (select && gajiInput) {
            select.addEventListener('change', function() {
                const gaji = this.options[this.selectedIndex].getAttribute('data-gaji');
                gajiInput.value = gaji || '';
            });
        }
    });
    </script>
@endsection