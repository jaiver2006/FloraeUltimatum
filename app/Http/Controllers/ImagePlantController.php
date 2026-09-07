<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\image_plant;

class ImagePlantController extends Controller
{
    public function index()
    {
        $imagePlants = image_plant::orderBy('id', 'asc')->get();

        return view('imageplant.index', compact('imagePlants'));
    }

    public function show($id)
    {
        $imagePlant = image_plant::findOrFail($id);

        return view('imageplant.show', compact('imagePlant'));
    }

    public function create()
    {
        return view('imageplant.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePath = $request->file('image')->store('images/plants', 'public');

        image_plant::create([
            'image' => $imagePath,
        ]);

        return redirect()->route('imageplant.index');
    }

    public function edit($id)
    {
        $imagePlant = image_plant::findOrFail($id);

        return view('imageplant.edit', compact('imagePlant'));
    }

    public function update(Request $request, $id)
    {
        $imagePlant = image_plant::findOrFail($id);

        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {

            if ($imagePlant->image && Storage::disk('public')->exists($imagePlant->image)) {
                Storage::disk('public')->delete($imagePlant->image);
            }

            $imagePath = $request->file('image')->store('images/plants', 'public');

            $imagePlant->image = $imagePath;
        }

        $imagePlant->save();

        return redirect()->route('imageplant.index');
    }

    public function destroy($id)
    {
        $imagePlant = image_plant::findOrFail($id);

        if ($imagePlant->image && Storage::disk('public')->exists($imagePlant->image)) {
            Storage::disk('public')->delete($imagePlant->image);
        }

        $imagePlant->delete();

        return redirect()->route('imageplant.index');
    }
}
