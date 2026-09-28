<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\medicine;
use Illuminate\Http\Request;

// Controla las operaciones JSON del catálogo de medicinas.
class MedicineController extends Controller
{
    public function index()
    {
        // Devuelve primero las medicinas más recientes.
        return response()->json(medicine::orderByDesc('id')->get());
    }

    public function store(Request $request)
    {
        // Solo se aceptan los campos definidos por el modelo medicine.
        $data = $request->validate([
            'medicine_name' => ['required', 'string', 'max:255'],
            'medicine_type' => ['required', 'string', 'max:255'],
            'medicine_description' => ['required', 'string', 'min:1'],
            'suggested_dose' => ['required', 'string', 'max:255'],
            'instructions' => ['required', 'string', 'min:1'],
        ]);

        $medicine = medicine::create($data);

        return response()->json($medicine, 201);
    }

    public function show(medicine $medicine)
    {
        return response()->json($medicine);
    }

    public function update(Request $request, medicine $medicine)
    {
        // `sometimes` permite actualizar solo los campos enviados.
        $data = $request->validate([
            'medicine_name' => ['sometimes', 'required', 'string', 'max:255'],
            'medicine_type' => ['sometimes', 'required', 'string', 'max:255'],
            'medicine_description' => ['sometimes', 'required', 'string', 'min:1'],
            'suggested_dose' => ['sometimes', 'required', 'string', 'max:255'],
            'instructions' => ['sometimes', 'required', 'string', 'min:1'],
        ]);

        $medicine->update($data);

        return response()->json($medicine);
    }

    public function destroy(medicine $medicine)
    {
        $medicine->delete();

        return response()->json([
            'message' => 'Medicina eliminada correctamente.',
        ]);
    }
}
