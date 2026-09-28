<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\treatment;
use Illuminate\Http\Request;

// Administra los tratamientos relacionados con una plaga.
class TreatmentController extends Controller
{
    public function index()
    {
        // Incluye la plaga, las medicinas y el procedimiento asociado.
        return response()->json(treatment::with(['plague', 'medicines', 'procedure'])->orderByDesc('id')->get());
    }

    public function store(Request $request)
    {
        // Valida fechas, estado, descripción y la plaga relacionada.
        $data = $request->validate([
            'start_date' => ['required', 'date'],
            'end_date' => ['nullable', 'date', 'after_or_equal:start_date'],
            'status' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'plague_id' => ['required', 'exists:plagues,id'],
        ]);

        return response()->json(treatment::create($data)->load(['plague', 'medicines', 'procedure']), 201);
    }

    public function show(treatment $treatment)
    {
        return response()->json($treatment->load(['plague', 'medicines', 'procedure']));
    }

    public function update(Request $request, treatment $treatment)
    {
        $data = $request->validate([
            'start_date' => ['sometimes', 'required', 'date'],
            'end_date' => ['sometimes', 'nullable', 'date', 'after_or_equal:start_date'],
            'status' => ['sometimes', 'required', 'string', 'max:255'],
            'description' => ['sometimes', 'required', 'string'],
            'plague_id' => ['sometimes', 'required', 'exists:plagues,id'],
        ]);

        $treatment->update($data);

        return response()->json($treatment->load(['plague', 'medicines', 'procedure']));
    }

    public function destroy(treatment $treatment)
    {
        $treatment->delete();

        return response()->json(['message' => 'Tratamiento eliminado correctamente.']);
    }
}
