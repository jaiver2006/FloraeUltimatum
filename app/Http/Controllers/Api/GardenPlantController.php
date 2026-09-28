<?php // Indica que este archivo contiene código PHP.

namespace App\Http\Controllers\Api; // Define el espacio de nombres de la API.

use App\Http\Controllers\Controller; // Importa la clase base de los controladores.
use App\Models\garden_plant; // Importa el modelo de la relación jardín-planta.
use Illuminate\Http\Request; // Permite recibir y validar peticiones HTTP.

// Administra la relación entre jardines y plantas.
class GardenPlantController extends Controller
{
    public function index() // Lista todas las relaciones jardín-planta.
    {
        // Devuelve la relación junto con los datos de jardín y planta.
        return response()->json(garden_plant::with(['garden', 'plant'])->orderByDesc('id')->get()); // Devuelve también jardín y planta.
    }

    public function store(Request $request) // Crea una relación nueva.
    {
        // Comprueba que ambos registros relacionados existan antes de asociarlos.
        $data = $request->validate([ // Valida los identificadores recibidos.
            'garden_id' => ['required', 'exists:gardens,id'], // Comprueba que exista el jardín.
            'plant_id' => ['required', 'exists:plants,id'], // Comprueba que exista la planta.
        ]); // Finaliza la validación.

        return response()->json(garden_plant::create($data)->load(['garden', 'plant']), 201); // Guarda y devuelve la relación creada.
    }

    public function show(garden_plant $garden_plant) // Muestra una relación concreta.
    {
        return response()->json($garden_plant->load(['garden', 'plant'])); // Devuelve la relación con sus datos.
    }

    public function update(Request $request, garden_plant $garden_plant) // Actualiza una relación existente.
    {
        $data = $request->validate([ // Valida únicamente los campos enviados.
            'garden_id' => ['sometimes', 'required', 'exists:gardens,id'], // Valida el jardín si cambia.
            'plant_id' => ['sometimes', 'required', 'exists:plants,id'], // Valida la planta si cambia.
        ]); // Finaliza la validación parcial.

        $garden_plant->update($data); // Guarda los cambios validados.

        return response()->json($garden_plant->load(['garden', 'plant'])); // Devuelve la relación actualizada.
    }

    public function destroy(garden_plant $garden_plant) // Elimina una relación.
    {
        $garden_plant->delete(); // Borra el registro de la base de datos.

        return response()->json(['message' => 'Relación eliminada correctamente.']); // Confirma la eliminación.
    }
}
