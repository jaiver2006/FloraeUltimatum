<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Garden;

class GardenController extends Controller
{
    public function index(){
        $gardens = Garden::orderBy('id', 'asc')->get();
        return view('garden.index', compact('gardens')); 
    }

    public function show (Garden $garden){
        return view('garden.show',compact('garden'));
    }

    public function create(){
        return view('garden.create'); 
    }

    public function store(Request $request){
        Garden::create($request->all());

        return redirect()->route('garden.index');
    }

    public function edit(Garden $garden){
        return view('garden.edit', compact('garden'));
    }

    public function update(Request $request, Garden $garden){
        $garden->update($request->all());
        return redirect()->route('garden.index');
    }

    public function destroy(Garden $garden){
        $garden->delete();
        return redirect()->route('garden.index');
    }
}
