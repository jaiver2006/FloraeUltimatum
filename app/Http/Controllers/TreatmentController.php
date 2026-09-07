<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Treatment;
use App\Models\plague;

class TreatmentController extends Controller
{
    public function index()
    {
        $treatments = Treatment::with('plague')->orderBy('id', 'asc')->get();
        return view('treatment.index', compact('treatments'));
    }

    public function show(Treatment $treatment)
    {
        return view('treatment.show', compact('treatment'));
    }

    public function create()
    {
        $plagues = plague::orderBy('id', 'asc')->get();
        return view('treatment.create', compact('plagues'));
    }

    public function store(Request $request)
    {
        Treatment::create($request->all());

        return redirect()->route('treatment.index');
    }

    public function edit(Treatment $treatment)
    {
        $plagues = plague::orderBy('id', 'asc')->get();
        return view('treatment.edit', compact('treatment', 'plagues'));
    }

    public function update(Request $request, Treatment $treatment)
    {
        $treatment->update($request->all());
        return redirect()->route('treatment.index');
    }

    public function destroy(Treatment $treatment)
    {
        $treatment->delete();
        return redirect()->route('treatment.index');
    }
}
