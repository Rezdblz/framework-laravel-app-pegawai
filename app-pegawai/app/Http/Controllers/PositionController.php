<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $positions = Position::latest()->paginate(5);
        return view('positions.index', compact('positions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('positions.create',compact('positions'));        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_jabatan' => 'required|string|max:255',
            'gaji_pokok'   => 'required|numeric|min:0',
        ]);
        Position::create($data);
        return redirect()-> route('position.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $position = Position::findOrFail($id);
        return view('positions.show',compact('position'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $position = Position::findOrFail($id);
        return view('position.edit', compact('position'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $position = Position::findOrFail($id);
        $data = $request->validate([
            'nama_jabatan' => 'required|string|max:255',
            'gaji_pokok'   => 'required|numeric|min:0',
        ]);
        $position->update($request->only([
            'nama_jabatan' => 'required|string|max:255',
            'gaji_pokok'   => 'required|numeric|min:0',
        ]));
        return redirect()->route('position.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $position = Position::findOrFail($id);
        $position->delete();
        return redirect()->route('position.index');
    }
}
