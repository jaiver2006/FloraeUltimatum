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

    public function show(plant $plant)
    {
        return view('plant.show', compact('plant'));
    }

    public function create()
    {
        $imagePlants = image_plant::orderBy('id', 'asc')->get();
        return view('plant.create', compact('imagePlants'));
    }

    public function store(Request $request)
    {
        plant::create($request->all());

        return redirect()->route('plant.index');
    }

    public function edit(plant $plant)
    {
        $imagePlants = image_plant::orderBy('id', 'asc')->get();
        return view('plant.edit', compact('plant', 'imagePlants'));
    }

    public function update(Request $request, plant $plant)
    {
        $plant->update($request->all());

        return redirect()->route('plant.index');
    }

    public function destroy(plant $plant)
    {
        $plant->delete();

        return redirect()->route('plant.index');
    }
}
