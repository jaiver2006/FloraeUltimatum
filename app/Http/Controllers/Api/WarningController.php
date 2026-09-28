<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\warning;
use Illuminate\Http\Request;

// Administra las advertencias asociadas a una planta.
class WarningController extends Controller
{
    public function index()
    {
        // Devuelve las advertencias junto con su planta.
        return response()->json(warning::with('plant')->orderByDesc('id')->get());
    }

    public function store(Request $request)
    {
        // Verifica que la planta relacionada exista antes de guardar.
        $data = $request->validate([
            'warning1' => ['required', 'string'],
            'warning2' => ['nullable', 'string'],
            'plant_id' => ['required', 'exists:plants,id'],
        ]);

        return response()->json(warning::create($data)->load('plant'), 201);
    }

    public function show(warning $warning)
    {
        return response()->json($warning->load('plant'));
    }

    public function update(Request $request, warning $warning)
    {
        $data = $request->validate([
            'warning1' => ['sometimes', 'required', 'string'],
            'warning2' => ['sometimes', 'nullable', 'string'],
            'plant_id' => ['sometimes', 'required', 'exists:plants,id'],
        ]);

        $warning->update($data);

        return response()->json($warning->load('plant'));
    }

    public function destroy(warning $warning)
    {
        $warning->delete();

        return response()->json(['message' => 'Advertencia eliminada correctamente.']);
    }
}
