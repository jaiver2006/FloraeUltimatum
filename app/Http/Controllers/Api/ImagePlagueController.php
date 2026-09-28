<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\image_plague;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

// Administra las imágenes de plagas almacenadas en el disco público.
class ImagePlagueController extends Controller
{
    public function index()
    {
        // Incluye las plagas que utilizan cada imagen.
        return response()->json(image_plague::with('plagues')->orderByDesc('id')->get());
    }

    public function store(Request $request)
    {
        // La imagen se recibe como multipart/form-data y se guarda en storage.
        $request->validate([
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ]);

        $imagePlague = image_plague::create([
            'image' => $request->file('image')->store('images/plagues', 'public'),
        ]);

        return response()->json($imagePlague, 201);
    }

    public function show(image_plague $imageplague)
    {
        return response()->json($imageplague->load('plagues'));
    }

    public function update(Request $request, image_plague $imageplague)
    {
        $request->validate([
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ]);

        if ($request->hasFile('image')) {
            // Elimina el archivo anterior antes de guardar el nuevo.
            if ($imageplague->image && Storage::disk('public')->exists($imageplague->image)) {
                Storage::disk('public')->delete($imageplague->image);
            }

            $imageplague->image = $request->file('image')->store('images/plagues', 'public');
            $imageplague->save();
        }

        return response()->json($imageplague->load('plagues'));
    }

    public function destroy(image_plague $imageplague)
    {
        if ($imageplague->image && Storage::disk('public')->exists($imageplague->image)) {
            Storage::disk('public')->delete($imageplague->image);
        }

        $imageplague->delete();

        return response()->json(['message' => 'Imagen de plaga eliminada correctamente.']);
    }
}
