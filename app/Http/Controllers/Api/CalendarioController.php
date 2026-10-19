<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\calendario;

class CalendarioController extends Controller
{
    public function index()
    {
        return response()->json(
            calendario::with(['care_record', 'garden'])->orderByDesc('id')->get()
        );
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'care_record_id' => ['nullable', 'exists:care_records,id'],
            'garden_id' => ['nullable', 'exists:gardens,id'],
        ]);

        return response()->json(
            calendario::create($data)->load(['care_record', 'garden']),
            201
        );
    }

    public function show(calendario $calendario)
    {
        return response()->json($calendario->load(['care_record', 'garden']));
    }

    public function update(Request $request, calendario $calendario)
    {
        $data = $request->validate([
            'care_record_id' => ['sometimes', 'nullable', 'exists:care_records,id'],
            'garden_id' => ['sometimes', 'nullable', 'exists:gardens,id'],
        ]);

        $calendario->update($data);

        return response()->json($calendario->load(['care_record', 'garden']));
    }

    public function destroy(calendario $calendario)
    {
        $calendario->delete();

        return response()->json(['message' => 'Registro del calendario eliminado correctamente.']);
    }
}
