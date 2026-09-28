<?php // Indica que este archivo contiene código PHP.

namespace App\Http\Controllers\Api; // Ubica el controlador dentro del espacio de nombres de la API.

use App\Http\Controllers\Controller; // Importa el controlador base de Laravel.
use App\Models\plague_symptom; // Importa el modelo de la relación entre plagas y síntomas.
use Illuminate\Http\Request; // Permite leer y validar los datos enviados por el cliente.

// Administra la relación entre plagas y síntomas.
class PlagueSymptomController extends Controller // Define el controlador de la relación plaga-síntoma.
{
    public function index() // Lista todas las relaciones registradas.
    {
        // Devuelve la relación junto con sus dos registros asociados.
        return response()->json(plague_symptom::with(['plague', 'symptom'])->orderByDesc('id')->get()); // Devuelve relaciones con sus datos asociados.
    }

    public function store(Request $request) // Crea una nueva relación.
    {
        // Evita crear relaciones con plagas o síntomas inexistentes.
        $data = $request->validate([ // Valida que se envíen identificadores existentes.
            'plague_id' => ['required', 'exists:plagues,id'], // Exige una plaga válida.
            'symptom_id' => ['required', 'exists:symptoms,id'], // Exige un síntoma válido.
        ]); // Termina la validación de entrada.

        return response()->json(plague_symptom::create($data)->load(['plague', 'symptom']), 201); // Guarda y devuelve la relación creada.
    }

    public function show(plague_symptom $plaguesymptom) // Muestra una relación usando su identificador.
    {
        return response()->json($plaguesymptom->load(['plague', 'symptom'])); // Devuelve la relación con plaga y síntoma.
    }

    public function update(Request $request, plague_symptom $plaguesymptom) // Actualiza una relación existente.
    {
        $data = $request->validate([ // Valida solo los campos enviados en la actualización.
            'plague_id' => ['sometimes', 'required', 'exists:plagues,id'], // Valida la nueva plaga si se envía.
            'symptom_id' => ['sometimes', 'required', 'exists:symptoms,id'], // Valida el nuevo síntoma si se envía.
        ]); // Termina la validación parcial.

        $plaguesymptom->update($data); // Guarda únicamente los datos validados.

        return response()->json($plaguesymptom->load(['plague', 'symptom'])); // Devuelve la relación actualizada.
    }

    public function destroy(plague_symptom $plaguesymptom) // Elimina una relación existente.
    {
        $plaguesymptom->delete(); // Borra la relación de la base de datos.

        return response()->json(['message' => 'Síntoma de plaga eliminado correctamente.']); // Confirma la eliminación.
    }
}
