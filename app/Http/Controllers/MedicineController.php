<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicine;

class MedicineController extends Controller
{
    public function index()
    {
        $medicines = Medicine::orderBy('id', 'asc')->get();
        return view('medicine.index', compact('medicines'));
    }

    public function show(Medicine $medicine)
    {
        return view('medicine.show', compact('medicine'));
    }

    public function create()
    {
        return view('medicine.create');
    }

    public function store(Request $request)
    {
        Medicine::create($request->all());

        return redirect()->route('medicine.index');
    }

    public function edit(Medicine $medicine)
    {
        return view('medicine.edit', compact('medicine'));
    }

    public function update(Request $request, Medicine $medicine)
    {
        $medicine->update($request->all());
        return redirect()->route('medicine.index');
    }

    public function destroy(Medicine $medicine)
    {
        $medicine->delete();
        return redirect()->route('medicine.index');
    }
}
