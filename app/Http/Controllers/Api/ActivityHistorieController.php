<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\activity_historie;
use Illuminate\Http\Request;

// Administra el historial de eventos asociados a una planta de jardín.
class ActivityHistorieController extends Controller
{
    public function index() // Lista los eventos del historial.
    {
        // Incluye la relación para mostrar a qué planta pertenece cada evento.
        return response()->json(activity_historie::with('garden_plant')->orderByDesc('id')->get()); // Incluye la relación jardín-planta.
    }

    public function store(Request $request) // Registra un evento nuevo.
    {
        // Valida la fecha y la relación antes de registrar el evento.
        $data = $request->validate([ // Valida los datos del evento.
            'event_description' => ['required', 'string'], // Exige una descripción.
            'registration_date' => ['required', 'date'], // Exige una fecha válida.
            'garden_plant_id' => ['required', 'exists:garden_plants,id'], // Exige una relación existente.
        ]); // Finaliza la validación.

        return response()->json(activity_historie::create($data)->load('garden_plant'), 201); // Guarda y devuelve el evento.
    }

    public function show(activity_historie $activityhistorie) // Muestra un evento concreto.
    {
        return response()->json($activityhistorie->load('garden_plant')); // Devuelve el evento con su relación.
    }

    public function update(Request $request, activity_historie $activityhistorie) // Actualiza un evento.
    {
        $data = $request->validate([
            'event_description' => ['sometimes', 'required', 'string'],
            'registration_date' => ['sometimes', 'required', 'date'],
            'garden_plant_id' => ['sometimes', 'required', 'exists:garden_plants,id'],
        ]);

        $activityhistorie->update($data); // Guarda los cambios validados.

        return response()->json($activityhistorie->load('garden_plant')); // Devuelve el evento actualizado.
    }

    public function destroy(activity_historie $activityhistorie) // Elimina un evento.
    {
        $activityhistorie->delete(); // Borra el evento.

        return response()->json(['message' => 'Historial eliminado correctamente.']); // Confirma la eliminación.
    }
}
