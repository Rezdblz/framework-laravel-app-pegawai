<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Position;
use App\Models\Salary;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $salaries = Salary::with('employee')->latest()->paginate(5);
        return view('salaries.index', compact('salaries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees = Employee::with('position')->orderBy('nama_lengkap')->get();
        return view('salaries.create', compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'karyawan_id' => 'required|exists:employees,id',
            'bulan' => 'required|string',
            'gaji_pokok' => 'required|numeric|min:0',
            'tunjangan' => 'nullable|numeric|min:0',
            'potongan' => 'nullable|numeric|min:0',
        ]);

        $data['tunjangan'] = $data['tunjangan'] ?? 0;
        $data['potongan'] = $data['potongan'] ?? 0;
        
        $data['total_gaji'] = $data['gaji_pokok'] + $data['tunjangan'] - $data['potongan'];

        Salary::create($data);
        return redirect()->route('salaries.index')->with('success', 'Gaji berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Salary $salary)
    {
        return view('salaries.show', compact('salary'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Salary $salary)
    {
        $salary->load('employee.position');
        $employees = Employee::with('position')->orderBy('nama_lengkap')->get();
        $positions = Position::orderBy('nama_jabatan')->get();
        return view('salaries.edit', compact('salary', 'employees', 'positions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Salary $salary)
    {
        $data = $request->validate([
            'karyawan_id' => 'required|exists:employees,id',
            'bulan' => 'required|string',
            'gaji_pokok' => 'required|numeric|min:0',
            'tunjangan' => 'nullable|numeric|min:0',
            'potongan' => 'nullable|numeric|min:0',
        ]);

        $data['tunjangan'] = $data['tunjangan'] ?? 0;
        $data['potongan'] = $data['potongan'] ?? 0;
        $data['total_gaji'] = $data['gaji_pokok'] + $data['tunjangan'] - $data['potongan'];

        $salary->update($data);
        return redirect()->route('salaries.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Salary $salary)
    {
        $salary->delete();
        return redirect()->route('salaries.index');
    }
}
