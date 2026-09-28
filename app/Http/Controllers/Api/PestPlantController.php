<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\pest_plant;
use Illuminate\Http\Request;

// Administra la relación entre plantas y plagas detectadas.
class PestPlantController extends Controller
{
    public function index()
    {
        // Incluye la planta y la plaga de cada registro.
        return response()->json(pest_plant::with(['plague', 'plant'])->orderByDesc('id')->get());
    }

    public function store(Request $request)
    {
        // Valida fechas, estado y las dos relaciones del registro.
        $data = $request->validate([
            'start_date' => ['required', 'date'],
            'end_date' => ['nullable', 'date', 'after_or_equal:start_date'],
            'pest_status' => ['required', 'string', 'max:255'],
            'plant_id' => ['required', 'exists:plants,id'],
            'plague_id' => ['required', 'exists:plagues,id'],
        ]);

        return response()->json(pest_plant::create($data)->load(['plague', 'plant']), 201);
    }

    public function show(pest_plant $pestplant)
    {
        return response()->json($pestplant->load(['plague', 'plant']));
    }

    public function update(Request $request, pest_plant $pestplant)
    {
        $data = $request->validate([
            'start_date' => ['sometimes', 'required', 'date'],
            'end_date' => ['sometimes', 'nullable', 'date', 'after_or_equal:start_date'],
            'pest_status' => ['sometimes', 'required', 'string', 'max:255'],
            'plant_id' => ['sometimes', 'required', 'exists:plants,id'],
            'plague_id' => ['sometimes', 'required', 'exists:plagues,id'],
        ]);

        $pestplant->update($data);

        return response()->json($pestplant->load(['plague', 'plant']));
    }

    public function destroy(pest_plant $pestplant)
    {
        $pestplant->delete();

        return response()->json(['message' => 'Relación de plaga eliminada correctamente.']);
    }
}
