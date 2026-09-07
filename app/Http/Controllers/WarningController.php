<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Warning;
use App\Models\plant;

class WarningController extends Controller
{
    public function index()
    {
        $warnings = Warning::with('plant')->orderBy('id', 'asc')->get();
        return view('warning.index', compact('warnings'));
    }

    public function show(Warning $warning)
    {
        return view('warning.show', compact('warning'));
    }

    public function create()
    {
        $plants = plant::orderBy('id', 'asc')->get();
        return view('warning.create', compact('plants'));
    }

    public function store(Request $request)
    {
        Warning::create($request->all());

        return redirect()->route('warning.index');
    }

    public function edit(Warning $warning)
    {
        $plants = plant::orderBy('id', 'asc')->get();
        return view('warning.edit', compact('warning', 'plants'));
    }

    public function update(Request $request, Warning $warning)
    {
        $warning->update($request->all());
        return redirect()->route('warning.index');
    }

    public function destroy(Warning $warning)
    {
        $warning->delete();
        return redirect()->route('warning.index');
    }
}
