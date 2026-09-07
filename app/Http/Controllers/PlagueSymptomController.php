<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plague_Symptom;
use App\Models\plague;
use App\Models\symptom;

class PlagueSymptomController extends Controller
{
    public function index()
    {
        $plague_symptoms = Plague_Symptom::with(['plague', 'symptom'])->orderBy('id', 'asc')->get();
        return view('plaguesymptom.index', compact('plague_symptoms'));
    }

    public function show(Plague_Symptom $plague_symptom)
    {
        return view('plaguesymptom.show', compact('plague_symptom'));
    }

    public function create()
    {
        $plagues = plague::orderBy('id', 'asc')->get();
        $symptoms = symptom::orderBy('id', 'asc')->get();
        return view('plaguesymptom.create', compact('plagues', 'symptoms'));
    }

    public function store(Request $request)
    {
        Plague_Symptom::create($request->all());

        return redirect()->route('plaguesymptom.index');
    }

    public function edit(Plague_Symptom $plague_symptom)
    {
        $plagues = plague::orderBy('id', 'asc')->get();
        $symptoms = symptom::orderBy('id', 'asc')->get();
        return view('plaguesymptom.edit', compact('plague_symptom', 'plagues', 'symptoms'));
    }

    public function update(Request $request, Plague_Symptom $plague_symptom)
    {
        $plague_symptom->update($request->all());
        return redirect()->route('plaguesymptom.index');
    }

    public function destroy(Plague_Symptom $plague_symptom)
    {
        $plague_symptom->delete();
        return redirect()->route('plaguesymptom.index');
    }
}
