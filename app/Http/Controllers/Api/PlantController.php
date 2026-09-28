<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\plant;
use Illuminate\Http\Request;

// Controla las operaciones JSON del catálogo de plantas.
class PlantController extends Controller
{
    public function index()
    {
        // Incluye la imagen relacionada para evitar otra consulta desde el cliente.
        return response()->json(
            plant::with('image_plant')->orderByDesc('id')->get()
        );
    }

    public function store(Request $request)
    {
        // Valida los datos antes de guardar una planta nueva.
        $data = $request->validate([
            'common_name' => ['required', 'string', 'max:255'],
            'common2_name' => ['nullable', 'string', 'max:255'],
            'common3_name' => ['nullable', 'string', 'max:255'],
            'common4_name' => ['nullable', 'string', 'max:255'],
            'scientific_name' => ['required', 'string', 'max:255'],
            'plant_description' => ['required', 'string'],
            'origin' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string', 'max:255'],
            'size' => ['required', 'string', 'max:255'],
            'image_plant_id' => ['nullable', 'exists:image_plants,id'],
        ]);

        $plant = plant::create($data);

        return response()->json($plant->load('image_plant'), 201);
    }

    public function show(plant $plant)
    {
        return response()->json($plant->load('image_plant'));
    }

    public function update(Request $request, plant $plant)
    {
        // La actualización es parcial: solo modifica los campos recibidos.
        $data = $request->validate([
            'common_name' => ['sometimes', 'required', 'string', 'max:255'],
            'common2_name' => ['sometimes', 'nullable', 'string', 'max:255'],
            'common3_name' => ['sometimes', 'nullable', 'string', 'max:255'],
            'common4_name' => ['sometimes', 'nullable', 'string', 'max:255'],
            'scientific_name' => ['sometimes', 'required', 'string', 'max:255'],
            'plant_description' => ['sometimes', 'required', 'string'],
            'origin' => ['sometimes', 'required', 'string', 'max:255'],
            'type' => ['sometimes', 'required', 'string', 'max:255'],
            'size' => ['sometimes', 'required', 'string', 'max:255'],
            'image_plant_id' => ['sometimes', 'nullable', 'exists:image_plants,id'],
        ]);

        $plant->update($data);

        return response()->json($plant->load('image_plant'));
    }

    public function destroy(plant $plant)
    {
        $plant->delete();

        return response()->json([
            'message' => 'Planta eliminada correctamente.',
        ]);
    }
}
