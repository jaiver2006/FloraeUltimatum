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
            'scientific_name' => ['required', 'string', 'max:255'],
            'plant_description' => ['required', 'string'],
            'recomendacion' => ['required', 'string', 'max:255'],
            'clima' => ['required', 'string', 'max:255'],
            'riego' => ['required', 'string', 'max:255'],
            'luz' => ['required', 'string', 'max:255'],
            'temperatura' => ['required', 'string', 'max:255'],
            'fertilizacion' => ['required', 'string', 'max:255'],
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
            'scientific_name' => ['sometimes', 'required', 'string', 'max:255'],
            'plant_description' => ['sometimes', 'required', 'string'],
            'recomendacion' => ['sometimes', 'required', 'string', 'max:255'],
            'clima' => ['sometimes', 'required', 'string', 'max:255'],
            'riego' => ['sometimes', 'required', 'string', 'max:255'],
            'luz' => ['sometimes', 'required', 'string', 'max:255'],
            'temperatura' => ['sometimes', 'required', 'string', 'max:255'],
            'fertilizacion' => ['sometimes', 'required', 'string', 'max:255'],
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
