@extends('master')
@section('title', 'Edit Attendance')
@section('content')
    <h1 class="text-2xl text-white font-bold pt-4 pb-4">Edit Attendance</h1>
    <form action="{{ route('attendances.update', $attendance->id) }}" method="POST" class="max-w-4xl">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block font-medium text-gray-400 mb-1">Karyawan</label>
                <input type="hidden" id="karyawan_id" name="karyawan_id" value="{{ old('karyawan_id', $attendance->karyawan_id) }}">
                <div class="w-full p-2 border border-gray-700 rounded-md bg-gray-800 text-white">
                    <div class="font-medium text-white">{{ optional($attendance->employee)->nama_lengkap ?? '-' }}</div>
                    <div class="text-xs text-gray-400">ID: {{ $attendance->karyawan_id }}</div>
                </div>
            </div>
            <div>
                <label for="tanggal" class="block font-medium text-gray-400 mb-1">Tanggal</label>
                <input type="date" id="tanggal" name="tanggal"
                    value="{{ old('tanggal', $attendance->tanggal) }}" required
                    class="w-full p-2 border border-gray-700 rounded-md bg-gray-800 text-white">
            </div>
            <div>
                <label for="status_absensi" class="block font-medium text-gray-400 mb-1">Status Absensi</label>
                <select id="status_absensi" name="status_absensi" required
                    class="w-full p-2 border border-gray-700 rounded-md bg-gray-800 text-white">
                    @foreach(['hadir','izin','sakit'] as $status)
                        <option value="{{ $status }}"
                            {{ old('status_absensi', $attendance->status_absensi) == $status ? 'selected' : '' }}>
                            {{ ucfirst($status) }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="waktu_masuk" class="block font-medium text-gray-400 mb-1">Waktu Masuk</label>
                <input type="time" id="waktu_masuk" name="waktu_masuk"
                    value="{{ old('waktu_masuk', $attendance->waktu_masuk) }}"
                    class="w-full p-2 border border-gray-700 rounded-md bg-gray-800 text-white">
            </div>
            <div>
                <label for="waktu_keluar" class="block font-medium text-gray-400 mb-1">Waktu Keluar</label>
                <input type="time" id="waktu_keluar" name="waktu_keluar"
                    value="{{ old('waktu_keluar', $attendance->waktu_keluar) }}"
                    class="w-full p-2 border border-gray-700 rounded-md bg-gray-800 text-white">
            </div>
            
        </div>
        <div class="flex justify-start mt-4">
            <button type="submit" class="px-4 py-2 rounded bg-indigo-700 text-white font-semibold hover:bg-indigo-800 transition">
                Update
            </button>
        </div>
    </form>

    <script>
        (function () {
            const statusEl = document.getElementById('status_absensi');
            const masukEl = document.getElementById('waktu_masuk');
            const keluarEl = document.getElementById('waktu_keluar');

            function toggleTimeInputs() {
                const s = statusEl.value;
                const disable = (s === 'sakit' || s === 'izin');

                masukEl.disabled = disable;
                keluarEl.disabled = disable;

                if (disable) {
                    masukEl.value = '';
                    keluarEl.value = '';
                }

                const parentMasuk = masukEl.parentElement;
                const parentKeluar = keluarEl.parentElement;
                parentMasuk.style.opacity = disable ? '0.6' : '1';
                parentKeluar.style.opacity = disable ? '0.6' : '1';
                parentMasuk.style.pointerEvents = disable ? 'none' : 'auto';
                parentKeluar.style.pointerEvents = disable ? 'none' : 'auto';
            }

            statusEl.addEventListener('change', toggleTimeInputs);
            document.addEventListener('DOMContentLoaded', toggleTimeInputs);
        })();
    </script>
@endsection