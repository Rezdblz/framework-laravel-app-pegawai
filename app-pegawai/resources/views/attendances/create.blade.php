@extends('master')
@section('title','Form Attendance')
@section('content')
    <h1 class="text-2xl text-white font-bold pt-4 pb-4">Form Attendance</h1>
    <form action="{{ route('attendances.store') }}" method="POST" class="max-w-4xl">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="departemen_id" class="block font-medium text-gray-400 mb-1">Department</label>
                <select id="departemen_id"
                    class="w-full p-2 border border-gray-700 rounded-md bg-gray-800 text-white">
                    <option value="">Semua Department</option>
                    @foreach($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->nama_departmen }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="karyawan_id" class="block font-medium text-gray-400 mb-1">Karyawan</label>
                <select id="karyawan_id" name="karyawan_id" required
                    class="w-full p-2 border border-gray-700 rounded-md focus:ring-2 focus:ring-indigo-500 outline-none bg-gray-800 text-white">
                    <option value="" disabled selected>Pilih Karyawan</option>
                    @foreach($employees as $employee)
                        <option value="{{ $employee->id }}" data-department="{{ $employee->departemen_id }}">
                            {{ $employee->nama_lengkap }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="tanggal" class="block font-medium text-gray-400 mb-1">Tanggal</label>
                <input type="date" id="tanggal" name="tanggal" required
                    class="w-full p-2 border border-gray-700 rounded-md bg-gray-800 text-white">
            </div>
            <div>
                <label for="status_absensi" class="block font-medium text-gray-400 mb-1">Status Absensi</label>
                <select id="status_absensi" name="status_absensi" required
                    class="w-full p-2 border border-gray-700 rounded-md bg-gray-800 text-white">
                    <option value="" disabled selected>Pilih Status</option>
                    <option value="hadir">Hadir</option>
                    <option value="izin">Izin</option>
                    <option value="sakit">Sakit</option>
                </select>
            </div>
            <div>
                <label for="waktu_masuk" class="block font-medium text-gray-400 mb-1">Waktu Masuk</label>
                <input type="time" id="waktu_masuk" name="waktu_masuk"
                    class="w-full p-2 border border-gray-700 rounded-md bg-gray-800 text-white">
            </div>
            <div>
                <label for="waktu_keluar" class="block font-medium text-gray-400 mb-1">Waktu Keluar</label>
                <input type="time" id="waktu_keluar" name="waktu_keluar"
                    class="w-full p-2 border border-gray-700 rounded-md bg-gray-800 text-white">
            </div>
            
        </div>
        <div class="flex justify-start mt-4">
            <button type="submit" class="px-4 py-2 rounded bg-indigo-700 text-white font-semibold hover:bg-indigo-800 transition">
                Simpan
            </button>
        </div>
    </form>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const deptEl = document.getElementById('departemen_id');
        const empEl = document.getElementById('karyawan_id');
        const statusEl = document.getElementById('status_absensi');
        const masukEl = document.getElementById('waktu_masuk');
        const keluarEl = document.getElementById('waktu_keluar');

        if (!deptEl || !empEl) return;

        function filterEmployees() {
            const deptId = deptEl.value;
            let anyVisible = false;

            Array.from(empEl.options).forEach(opt => {
                if (opt.value === '') return;
                const visible = !deptId || opt.dataset.department === deptId;
                opt.hidden = !visible;
                opt.disabled = !visible;
                if (visible) anyVisible = true;
            });

            const sel = empEl.selectedOptions[0];
            if (!anyVisible || (sel && sel.hidden)) {
                empEl.value = '';
            }
        }

        function toggleTimeInputs() {
            const disable = statusEl.value === 'sakit' || statusEl.value === 'izin';
            masukEl.disabled = disable;
            keluarEl.disabled = disable;
            if (disable) {
                masukEl.value = '';
                keluarEl.value = '';
            }
            [masukEl, keluarEl].forEach(el => {
                const p = el.parentElement;
                if (p) {
                    p.style.opacity = disable ? '0.6' : '1';
                    p.style.pointerEvents = disable ? 'none' : 'auto';
                }
            });
        }

        deptEl.addEventListener('change', filterEmployees);
        statusEl.addEventListener('change', toggleTimeInputs);
    });
    </script>
@endsection