<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Symptom;

class SymptomController extends Controller
{
    public function index(){
        $symptoms = Symptom::orderBy('id', 'asc')->get();
        return view('symptom.index', compact('symptoms')); 
    }

    public function show (Symptom $symptom){
        return view('symptom.show',compact('symptom'));
    }

    public function create(){
        return view('symptom.create'); 
    }

    public function store(Request $request){
        Symptom::create($request->all());

        return redirect()->route('symptom.index');
    }

    public function edit(Symptom $symptom){
        return view('symptom.edit', compact('symptom'));
    }

    public function update(Request $request, Symptom $symptom){
        $symptom->update($request->all());
        return redirect()->route('symptom.index');
    }

    public function destroy(Symptom $symptom){
        $symptom->delete();
        return redirect()->route('symptom.index');
    }
}
