<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Garden_Plant;
use App\Models\garden;
use App\Models\plant;

class GardenPlantController extends Controller
{
    public function index()
    {
        $garden_plants = Garden_Plant::with(['garden', 'plant'])->orderBy('id', 'asc')->get();
        return view('gardenplant.index', compact('garden_plants'));
    }

    public function show(Garden_Plant $garden_plant)
    {
        return view('gardenplant.show', compact('garden_plant'));
    }

    public function create()
    {
        $gardens = garden::orderBy('id', 'asc')->get();
        $plants = plant::orderBy('id', 'asc')->get();
        return view('gardenplant.create', compact('gardens', 'plants'));
    }

    public function store(Request $request)
    {
        Garden_Plant::create($request->all());

        return redirect()->route('gardenplant.index');
    }

    public function edit(Garden_Plant $garden_plant)
    {
        $gardens = garden::orderBy('id', 'asc')->get();
        $plants = plant::orderBy('id', 'asc')->get();
        return view('gardenplant.edit', compact('garden_plant', 'gardens', 'plants'));
    }

    public function update(Request $request, Garden_Plant $garden_plant)
    {
        $garden_plant->update($request->all());
        return redirect()->route('gardenplant.index');
    }

    public function destroy(Garden_Plant $garden_plant)
    {
        $garden_plant->delete();
        return redirect()->route('gardenplant.index');
    }
}
