<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\image_plant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

// Administra las imágenes de plantas almacenadas en el disco público.
class ImagePlantController extends Controller
{
    public function index()
    {
        // Incluye las plantas que utilizan cada imagen.
        return response()->json(image_plant::with('plants')->orderByDesc('id')->get());
    }

    public function store(Request $request)
    {
        // La imagen se recibe como multipart/form-data y se guarda en storage.
        $request->validate([
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ]);

        $imagePlant = image_plant::create([
            'image' => $request->file('image')->store('images/plants', 'public'),
        ]);

        return response()->json($imagePlant, 201);
    }

    public function show(image_plant $imageplant)
    {
        return response()->json($imageplant->load('plants'));
    }

    public function update(Request $request, image_plant $imageplant)
    {
        $request->validate([
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ]);

        if ($request->hasFile('image')) {
            // Elimina el archivo anterior antes de guardar el nuevo.
            if ($imageplant->image && Storage::disk('public')->exists($imageplant->image)) {
                Storage::disk('public')->delete($imageplant->image);
            }

            $imageplant->image = $request->file('image')->store('images/plants', 'public');
            $imageplant->save();
        }

        return response()->json($imageplant->load('plants'));
    }

    public function destroy(image_plant $imageplant)
    {
        if ($imageplant->image && Storage::disk('public')->exists($imageplant->image)) {
            Storage::disk('public')->delete($imageplant->image);
        }

        $imageplant->delete();

        return response()->json(['message' => 'Imagen de planta eliminada correctamente.']);
    }
}
