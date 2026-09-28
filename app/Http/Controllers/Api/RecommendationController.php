<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\recommendation;
use Illuminate\Http\Request;

// Administra las recomendaciones asociadas a una planta.
class RecommendationController extends Controller
{
    public function index()
    {
        // Devuelve las recomendaciones junto con su planta.
        return response()->json(recommendation::with('plant')->orderByDesc('id')->get());
    }

    public function store(Request $request)
    {
        // Comprueba la planta relacionada antes de crear la recomendación.
        $data = $request->validate([
            'recommendation1' => ['required', 'string'],
            'recommendation2' => ['nullable', 'string'],
            'plant_id' => ['required', 'exists:plants,id'],
        ]);

        return response()->json(recommendation::create($data)->load('plant'), 201);
    }

    public function show(recommendation $recommendation)
    {
        return response()->json($recommendation->load('plant'));
    }

    public function update(Request $request, recommendation $recommendation)
    {
        $data = $request->validate([
            'recommendation1' => ['sometimes', 'required', 'string'],
            'recommendation2' => ['sometimes', 'nullable', 'string'],
            'plant_id' => ['sometimes', 'required', 'exists:plants,id'],
        ]);

        $recommendation->update($data);

        return response()->json($recommendation->load('plant'));
    }

    public function destroy(recommendation $recommendation)
    {
        $recommendation->delete();

        return response()->json(['message' => 'Recomendación eliminada correctamente.']);
    }
}
