<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\care_record;
use Illuminate\Http\Request;

// Administra los registros de cuidado realizados a una planta.
class CareRecordController extends Controller
{
    public function index()
    {
        // Incluye el plan de cuidado y la planta relacionada.
        return response()->json(care_record::with(['plant_care', 'plant'])->orderByDesc('id')->get());
    }

    public function store(Request $request)
    {
        // Valida la fecha y las dos relaciones necesarias para el registro.
        $data = $request->validate([
            'care_date' => ['required', 'date'],
            'plant_care_id' => ['required', 'exists:plant_cares,id'],
            'plant_id' => ['required', 'exists:plants,id'],
        ]);

        return response()->json(care_record::create($data)->load(['plant_care', 'plant']), 201);
    }

    public function show(care_record $care_record)
    {
        return response()->json($care_record->load(['plant_care', 'plant']));
    }

    public function update(Request $request, care_record $care_record)
    {
        $data = $request->validate([
            'care_date' => ['sometimes', 'required', 'date'],
            'plant_care_id' => ['sometimes', 'required', 'exists:plant_cares,id'],
            'plant_id' => ['sometimes', 'required', 'exists:plants,id'],
        ]);

        $care_record->update($data);

        return response()->json($care_record->load(['plant_care', 'plant']));
    }

    public function destroy(care_record $care_record)
    {
        $care_record->delete();

        return response()->json(['message' => 'Registro de cuidado eliminado correctamente.']);
    }
}
