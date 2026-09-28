<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\medication_treatment;
use Illuminate\Http\Request;

// Administra las medicinas aplicadas dentro de un tratamiento.
class MedicationTreatmentController extends Controller
{
    public function index() // Lista las medicinas aplicadas en tratamientos.
    {
        // Incluye el tratamiento y la medicina de cada aplicación.
        return response()->json(medication_treatment::with(['treatment', 'medicine'])->orderByDesc('id')->get()); // Incluye tratamiento y medicina.
    }

    public function store(Request $request) // Registra una aplicación de medicina.
    {
        // Valida fechas, dosis y las dos relaciones necesarias.
        $data = $request->validate([ // Valida fechas, dosis y relaciones.
            'start_date' => ['required', 'date'], // Exige la fecha de inicio.
            'end_date' => ['nullable', 'date', 'after_or_equal:start_date'], // Permite una fecha final posterior.
            'applied_dose' => ['required', 'string', 'max:255'], // Exige la dosis aplicada.
            'treatment_id' => ['required', 'exists:treatments,id'], // Comprueba el tratamiento.
            'medicine_id' => ['required', 'exists:medicines,id'], // Comprueba la medicina.
        ]);

        return response()->json(medication_treatment::create($data)->load(['treatment', 'medicine']), 201); // Guarda y devuelve la aplicación.
    }

    public function show(medication_treatment $medicationtreatment) // Muestra una aplicación concreta.
    {
        return response()->json($medicationtreatment->load(['treatment', 'medicine'])); // Devuelve sus relaciones.
    }

    public function update(Request $request, medication_treatment $medicationtreatment) // Actualiza una aplicación.
    {
        $data = $request->validate([
            'start_date' => ['sometimes', 'required', 'date'],
            'end_date' => ['sometimes', 'nullable', 'date', 'after_or_equal:start_date'],
            'applied_dose' => ['sometimes', 'required', 'string', 'max:255'],
            'treatment_id' => ['sometimes', 'required', 'exists:treatments,id'],
            'medicine_id' => ['sometimes', 'required', 'exists:medicines,id'],
        ]);

        $medicationtreatment->update($data); // Guarda los cambios validados.

        return response()->json($medicationtreatment->load(['treatment', 'medicine'])); // Devuelve la aplicación actualizada.
    }

    public function destroy(medication_treatment $medicationtreatment) // Elimina una aplicación.
    {
        $medicationtreatment->delete(); // Borra la aplicación.

        return response()->json(['message' => 'Tratamiento de medicina eliminado correctamente.']); // Confirma la eliminación.
    }
}
