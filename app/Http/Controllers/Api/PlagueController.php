<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\plague;
use Illuminate\Http\Request;

// Controla las operaciones JSON del catálogo de plagas.
class PlagueController extends Controller
{
    public function index()
    {
        // Incluye la imagen relacionada de cada plaga.
        return response()->json(plague::with('image_plague')->orderByDesc('id')->get());
    }

    public function store(Request $request)
    {
        // Valida los nombres, descripción, síntomas y la imagen opcional.
        $data = $request->validate([
            'plague_name' => ['required', 'string', 'max:255'],
            'plague2_name' => ['required', 'string', 'max:255'],
            'plague3_name' => ['required', 'string', 'max:255'],
            'scientific_name' => ['required', 'string', 'max:255'],
            'plague_description' => ['required', 'string'],
            'plague_symptom' => ['required', 'string'],
            'image_plague_id' => ['nullable', 'exists:image_plagues,id'],
        ]);

        return response()->json(plague::create($data)->load('image_plague'), 201);
    }

    public function show(plague $plague)
    {
        return response()->json($plague->load('image_plague'));
    }

    public function update(Request $request, plague $plague)
    {
        $data = $request->validate([
            'plague_name' => ['sometimes', 'required', 'string', 'max:255'],
            'plague2_name' => ['sometimes', 'required', 'string', 'max:255'],
            'plague3_name' => ['sometimes', 'required', 'string', 'max:255'],
            'scientific_name' => ['sometimes', 'required', 'string', 'max:255'],
            'plague_description' => ['sometimes', 'required', 'string'],
            'plague_symptom' => ['sometimes', 'required', 'string'],
            'image_plague_id' => ['sometimes', 'nullable', 'exists:image_plagues,id'],
        ]);

        $plague->update($data);

        return response()->json($plague->load('image_plague'));
    }

    public function destroy(plague $plague)
    {
        $plague->delete();

        return response()->json(['message' => 'Plaga eliminada correctamente.']);
    }
}
