<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\plant_care;
use Illuminate\Http\Request;

// Administra las condiciones de cuidado de cada planta.
class PlantCareController extends Controller
{
    public function index()
    {
        // Devuelve cada plan junto con la planta a la que pertenece.
        return response()->json(plant_care::with('plant')->orderByDesc('id')->get());
    }

    public function store(Request $request)
    {
        // Valida las instrucciones de cuidado y la planta relacionada.
        $data = $request->validate([
            'watering' => ['required', 'string'],
            'light' => ['required', 'string'],
            'temperature' => ['required', 'string'],
            'fertilization' => ['required', 'string'],
            'plant_id' => ['required', 'exists:plants,id'],
        ]);

        return response()->json(plant_care::create($data)->load('plant'), 201);
    }

    public function show(plant_care $plantcare)
    {
        return response()->json($plantcare->load('plant'));
    }

    public function update(Request $request, plant_care $plantcare)
    {
        $data = $request->validate([
            'watering' => ['sometimes', 'required', 'string'],
            'light' => ['sometimes', 'required', 'string'],
            'temperature' => ['sometimes', 'required', 'string'],
            'fertilization' => ['sometimes', 'required', 'string'],
            'plant_id' => ['sometimes', 'required', 'exists:plants,id'],
        ]);

        $plantcare->update($data);

        return response()->json($plantcare->load('plant'));
    }

    public function destroy(plant_care $plantcare)
    {
        $plantcare->delete();

        return response()->json(['message' => 'Cuidado de planta eliminado correctamente.']);
    }
}
