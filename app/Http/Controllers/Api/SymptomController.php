<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\symptom;
use Illuminate\Http\Request;

// Administra el catálogo de síntomas.
class SymptomController extends Controller
{
    public function index()
    {
        // Devuelve todos los síntomas ordenados por los más recientes.
        return response()->json(symptom::orderByDesc('id')->get());
    }

    public function store(Request $request)
    {
        // El nombre es el único dato necesario para crear un síntoma.
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        return response()->json(symptom::create($data), 201);
    }

    public function show(symptom $symptom)
    {
        return response()->json($symptom);
    }

    public function update(Request $request, symptom $symptom)
    {
        $data = $request->validate([
            'name' => ['sometimes', 'required', 'string', 'max:255'],
        ]);

        $symptom->update($data);

        return response()->json($symptom);
    }

    public function destroy(symptom $symptom)
    {
        $symptom->delete();

        return response()->json(['message' => 'Síntoma eliminado correctamente.']);
    }
}
