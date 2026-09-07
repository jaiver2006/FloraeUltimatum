<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plant_Care;
use App\Models\plant;

class PlantCareController extends Controller
{
    public function index()
    {
        $plant_cares = Plant_Care::with('plant')->orderBy('id', 'asc')->get();
        return view('plantcare.index', compact('plant_cares'));
    }

    public function show(Plant_Care $plant_care)
    {
        return view('plantcare.show', compact('plant_care'));
    }

    public function create()
    {
        $plants = plant::orderBy('id', 'asc')->get();
        return view('plantcare.create', compact('plants'));
    }

    public function store(Request $request)
    {
        Plant_Care::create($request->all());

        return redirect()->route('plantcare.index');
    }

    public function edit(Plant_Care $plant_care)
    {
        $plants = plant::orderBy('id', 'asc')->get();
        return view('plantcare.edit', compact('plant_care', 'plants'));
    }

    public function update(Request $request, Plant_Care $plant_care)
    {
        $plant_care->update($request->all());
        return redirect()->route('plantcare.index');
    }

    public function destroy(Plant_Care $plant_care)
    {
        $plant_care->delete();
        return redirect()->route('plantcare.index');
    }
}
