<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Salary;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $salaries = Salary::latest()->paginate(5);
        return view('salaries.index', compact('salaries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('salaries.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'karyawan_id' => 'required|exists:employees,id',
            'bulan' => 'required|string',
            'gaji_pokok' => 'required|integer|min:0',
            'tunjangan' => 'nullable|integer|min:0',
            'potongan' => 'nullable|integer|min:0',
        ]);
        
        $data['tunjangan'] = $data['tunjangan'] ?? 0;
        $data['potongan'] = $data['potongan'] ?? 0;
        $data['total_gaji'] = $data['gaji_pokok'] + $data['tunjangan'] - $data['potongan'];

        Salary::create($data);
        return redirect()->route('salaries.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Salary $salary)
    {
        $employees = Employee::orderBy('nama_lengkap')->get();
        return view('salaries.create', compact('employees'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Salary $salary)
    {
        $employees = Employee::orderBy('nama_lengkap')->get();
        return view('salaries.edit', compact('salary', 'employees'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Salary $salary)
    {
        $data = $request->validate([
            'karyawan_id' => 'required|exists:employees,id',
            'bulan' => 'required|string',
            'gaji_pokok' => 'required|integer|min:0',
            'tunjangan' => 'nullable|integer|min:0',
            'potongan' => 'nullable|integer|min:0',
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
