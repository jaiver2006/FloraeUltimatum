<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Care_Record;
use App\Models\plant_care;
use App\Models\plant;

class CareRecordController extends Controller
{
    public function index()
    {
        $care_records = Care_Record::with(['plant_care', 'plant'])->orderBy('id', 'asc')->get();
        return view('carerecord.index', compact('care_records'));
    }

    public function show(Care_Record $care_record)
    {
        return view('carerecord.show', compact('care_record'));
    }

    public function create()
    {
        $plant_cares = plant_care::orderBy('id', 'asc')->get();
        $plants = plant::orderBy('id', 'asc')->get();
        return view('carerecord.create', compact('plant_cares', 'plants'));
    }

    public function store(Request $request)
    {
        Care_Record::create($request->all());

        return redirect()->route('carerecord.index');
    }

    public function edit(Care_Record $care_record)
    {
        $plant_cares = plant_care::orderBy('id', 'asc')->get();
        $plants = plant::orderBy('id', 'asc')->get();
        return view('carerecord.edit', compact('care_record', 'plant_cares', 'plants'));
    }

    public function update(Request $request, Care_Record $care_record)
    {
        $care_record->update($request->all());
        return redirect()->route('carerecord.index');
    }

    public function destroy(Care_Record $care_record)
    {
        $care_record->delete();
        return redirect()->route('carerecord.index');
    }
}
