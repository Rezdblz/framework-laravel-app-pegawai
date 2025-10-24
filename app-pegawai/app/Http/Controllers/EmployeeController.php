<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Position;
use App\Models\Department;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::with('department', 'position')->latest()->paginate(5);
        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $positions = Position::orderBy('nama_jabatan')->get();
        $departments = Department::orderBy('nama_departmen')->get();
        return view('employees.create', compact('positions', 'departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'departemen_id' => 'required|integer|exists:departments,id',
            'jabatan_id' => 'required|integer|exists:positions,id',
            'email' => 'required|email|max:255',
            'nomor_telepon' => 'required|string|max:20',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string|max:255',
            'tanggal_masuk' => 'required|date',
            'status' => 'required|string|max:50',

        ]);
        Employee::create($data);
        return redirect()->route('employees.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $employee = Employee::findOrFail($id);
        return view('employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $employee = Employee::findOrFail($id);
        $positions = Position::orderBy('nama_jabatan')->get();
        $departments = Department::orderBy('nama_departmen')->get();
        return view('employees.edit', compact('employee', 'positions', 'departments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'departemen_id' => 'required|integer|exists:departments,id',
            'jabatan_id' => 'required|integer|exists:positions,id',
            'email' => 'required|email|max:255',
            'nomor_telepon' => 'required|string|max:20',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string|max:255',
            'tanggal_masuk' => 'required|date',
            'status' => 'required|string|max:50',

        ]);
        $employee = Employee::findOrFail($id);
        $employee->update($request->only([
            'nama_lengkap',
            'email',
            'nomor_telepon',
            'tanggal_lahir',
            'alamat',
            'tanggal_masuk',
            'status',
            'departemen_id',
            'jabatan_id',
        ]));
        return redirect()->route('employees.index')->with('success', 'Pegawai berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();
        return redirect()->route('employees.index');
    }
}
