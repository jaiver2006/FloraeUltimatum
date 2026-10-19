<?php

namespace App\Http\Controllers;

use App\Models\calendario;
use App\Models\care_record;
use App\Models\garden;
use Illuminate\Http\Request;

class CalendarioController extends Controller
{
    public function index()
    {
        $calendarios = calendario::with(['care_record', 'garden'])->orderBy('id', 'asc')->get();

        return view('calendario.index', compact('calendarios'));
    }

    public function show(calendario $calendario)
    {
        $calendario->load(['care_record', 'garden']);

        return view('calendario.show', compact('calendario'));
    }

    public function create()
    {
        $care_records = care_record::orderBy('id', 'asc')->get();
        $gardens = garden::orderBy('id', 'asc')->get();

        return view('calendario.create', compact('care_records', 'gardens'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'care_record_id' => ['nullable', 'exists:care_records,id'],
            'garden_id' => ['nullable', 'exists:gardens,id'],
        ]);

        calendario::create($data);

        return redirect()->route('calendario.index');
    }

    public function edit(calendario $calendario)
    {
        $care_records = care_record::orderBy('id', 'asc')->get();
        $gardens = garden::orderBy('id', 'asc')->get();

        return view('calendario.edit', compact('calendario', 'care_records', 'gardens'));
    }

    public function update(Request $request, calendario $calendario)
    {
        $data = $request->validate([
            'care_record_id' => ['sometimes', 'nullable', 'exists:care_records,id'],
            'garden_id' => ['sometimes', 'nullable', 'exists:gardens,id'],
        ]);

        $calendario->update($data);

        return redirect()->route('calendario.index');
    }

    public function destroy(calendario $calendario)
    {
        $calendario->delete();

        return redirect()->route('calendario.index');
    }
}
