<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pest_Plant;
use App\Models\plague;
use App\Models\plant;

class PestPlantController extends Controller
{
    public function index()
    {
        $pest_plants = Pest_Plant::with(['plague', 'plant'])->orderBy('id', 'asc')->get();
        return view('pestplant.index', compact('pest_plants'));
    }

    public function show(Pest_Plant $pest_plant)
    {
        return view('pestplant.show', compact('pest_plant'));
    }

    public function create()
    {
        $plants = plant::orderBy('id', 'asc')->get();
        $plagues = plague::orderBy('id', 'asc')->get();
        return view('pestplant.create', compact('plants', 'plagues'));
    }

    public function store(Request $request)
    {
        Pest_Plant::create($request->all());

        return redirect()->route('pestplant.index');
    }

    public function edit(Pest_Plant $pest_plant)
    {
        $plants = plant::orderBy('id', 'asc')->get();
        $plagues = plague::orderBy('id', 'asc')->get();
        return view('pestplant.edit', compact('pest_plant', 'plants', 'plagues'));
    }

    public function update(Request $request, Pest_Plant $pest_plant)
    {
        $pest_plant->update($request->all());
        return redirect()->route('pestplant.index');
    }

    public function destroy(Pest_Plant $pest_plant)
    {
        $pest_plant->delete();
        return redirect()->route('pestplant.index');
    }
}
