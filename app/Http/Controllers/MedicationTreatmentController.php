<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medication_Treatment;
use App\Models\medicine;
use App\Models\treatment;

class MedicationTreatmentController extends Controller
{
    public function index()
    {
        $medication_treatments = Medication_Treatment::with(['treatment', 'medicine'])->orderBy('id', 'asc')->get();
        return view('medicationtreatment.index', compact('medication_treatments'));
    }

    public function show(Medication_Treatment $medication_treatment)
    {
        return view('medicationtreatment.show', compact('medication_treatment'));
    }

    public function create()
    {
        $treatments = treatment::orderBy('id', 'asc')->get();
        $medicines = medicine::orderBy('id', 'asc')->get();
        return view('medicationtreatment.create', compact('treatments', 'medicines'));
    }

    public function store(Request $request)
    {
        Medication_Treatment::create($request->all());

        return redirect()->route('medicationtreatment.index');
    }

    public function edit(Medication_Treatment $medication_treatment)
    {
        $treatments = treatment::orderBy('id', 'asc')->get();
        $medicines = medicine::orderBy('id', 'asc')->get();
        return view('medicationtreatment.edit', compact('medication_treatment', 'treatments', 'medicines'));
    }

    public function update(Request $request, Medication_Treatment $medication_treatment)
    {
        $medication_treatment->update($request->all());
        return redirect()->route('medicationtreatment.index');
    }

    public function destroy(Medication_Treatment $medication_treatment)
    {
        $medication_treatment->delete();
        return redirect()->route('medicationtreatment.index');
    }
}
