@extends('master')
@section('title', 'Edit Attendance')
@section('content')
    <h1 class="text-2xl text-white font-bold pt-4 pb-4">Edit Attendance</h1>
    <form action="{{ route('attendances.update', $attendance->id) }}" method="POST" class="max-w-4xl">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="karyawan_id" class="block font-medium text-gray-400 mb-1">Karyawan ID</label>
                <input type="number" id="karyawan_id" name="karyawan_id"
                    value="{{ old('karyawan_id', $attendance->karyawan_id) }}" required
                    class="w-full p-2 border border-gray-700 rounded-md focus:ring-2 focus:ring-indigo-500 outline-none bg-gray-800 text-white">
            </div>
            <div>
                <label for="tanggal" class="block font-medium text-gray-400 mb-1">Tanggal</label>
                <input type="date" id="tanggal" name="tanggal"
                    value="{{ old('tanggal', $attendance->tanggal) }}" required
                    class="w-full p-2 border border-gray-700 rounded-md bg-gray-800 text-white">
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
            <div>
                <label for="status_absensi" class="block font-medium text-gray-400 mb-1">Status Absensi</label>
                <select id="status_absensi" name="status_absensi" required
                    class="w-full p-2 border border-gray-700 rounded-md bg-gray-800 text-white">
                    @foreach(['hadir','izin','sakit','cuti','alfa'] as $status)
                        <option value="{{ $status }}"
                            {{ old('status_absensi', $attendance->status_absensi) == $status ? 'selected' : '' }}>
                            {{ ucfirst($status) }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="flex justify-start mt-4">
            <button type="submit" class="px-4 py-2 rounded bg-indigo-700 text-white font-semibold hover:bg-indigo-800 transition">
                Update
            </button>
        </div>
    </form>
@endsection