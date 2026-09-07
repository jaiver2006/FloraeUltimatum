<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\plant;
use App\Models\image_plant;

class PlantController extends Controller
{
    public function index()
    {
        $plants = plant::with('image_plant')->orderBy('id', 'asc')->get();
        return view('plant.index', compact('plants'));
    }

    public function create()
    {
        $imagePlants = image_plant::all();
        return view('plant.create', compact('imagePlants'));
    }

    public function show(plant $plant)
    {
        return view('plant.show', compact('plant'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'common_name' => 'required|string|max:255',
            'common2_name' => 'nullable|string|max:255',
            'common3_name' => 'nullable|string|max:255',
            'common4_name' => 'nullable|string|max:255',
            'scientific_name' => 'required|string|max:255',
            'plant_description' => 'required|string',
            'origin' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'size' => 'required|string|max:255',
            'image_plant_id' => 'nullable|exists:image_plants,id',
        ]);

        plant::create($request->all());

        return redirect()->route('plant.index');
    }

    public function edit(plant $plant)
    {
        $imagePlants = image_plant::all();
        return view('plant.edit', compact('plant', 'imagePlants'));
    }

    public function update(Request $request, plant $plant)
    {
        $request->validate([
            'common_name' => 'required|string|max:255',
            'common2_name' => 'nullable|string|max:255',
            'common3_name' => 'nullable|string|max:255',
            'common4_name' => 'nullable|string|max:255',
            'scientific_name' => 'required|string|max:255',
            'plant_description' => 'required|string',
            'origin' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'size' => 'required|string|max:255',
            'image_plant_id' => 'nullable|exists:image_plants,id',
        ]);

        $plant->update($request->all());

        return redirect()->route('plant.index');
    }

    public function destroy(plant $plant)
    {
        $plant->delete();

        return redirect()->route('plant.index');
    }
}
