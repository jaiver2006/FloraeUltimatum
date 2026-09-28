<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\procedure;
use Illuminate\Http\Request;

// Administra los pasos de un tratamiento.
class ProcedureController extends Controller
{
    public function index() // Lista todos los procedimientos.
    {
        // Devuelve cada procedimiento junto con su tratamiento.
        return response()->json(procedure::with('treatment')->orderByDesc('id')->get()); // Incluye el tratamiento asociado.
    }

    public function store(Request $request) // Crea un procedimiento.
    {
        // Los pasos son opcionales, pero el tratamiento asociado es obligatorio.
        $data = $request->validate([ // Valida los pasos y el tratamiento relacionado.
            'step1' => ['nullable', 'string'], // El primer paso es opcional.
            'step2' => ['nullable', 'string'], // El segundo paso es opcional.
            'step3' => ['nullable', 'string'], // El tercer paso es opcional.
            'step4' => ['nullable', 'string'], // El cuarto paso es opcional.
            'treatment_id' => ['required', 'exists:treatments,id'], // El tratamiento debe existir.
        ]);

        return response()->json(procedure::create($data)->load('treatment'), 201); // Guarda y devuelve el procedimiento.
    }

    public function show(procedure $procedure) // Muestra un procedimiento.
    {
        return response()->json($procedure->load('treatment')); // Devuelve el procedimiento con su tratamiento.
    }

    public function update(Request $request, procedure $procedure) // Actualiza un procedimiento.
    {
        $data = $request->validate([
            'step1' => ['sometimes', 'nullable', 'string'],
            'step2' => ['sometimes', 'nullable', 'string'],
            'step3' => ['sometimes', 'nullable', 'string'],
            'step4' => ['sometimes', 'nullable', 'string'],
            'treatment_id' => ['sometimes', 'required', 'exists:treatments,id'],
        ]);

        $procedure->update($data); // Guarda los cambios validados.

        return response()->json($procedure->load('treatment')); // Devuelve el procedimiento actualizado.
    }

    public function destroy(procedure $procedure) // Elimina un procedimiento.
    {
        $procedure->delete(); // Borra el procedimiento.

        return response()->json(['message' => 'Procedimiento eliminado correctamente.']); // Confirma la eliminación.
    }
}
