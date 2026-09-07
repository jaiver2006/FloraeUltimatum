<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\activity_historie;
use App\Models\garden_plant;

class ActivityHistorieController extends Controller
{
    public function index()
    {
        $activities = activity_historie::with('garden_plant')->orderBy('id', 'asc')->get();
        return view('activityhistorie.index', compact('activities'));
    }

    public function show(activity_historie $activity)
    {
        return view('activityhistorie.show', compact('activity'));
    }

    public function create()
    {
        $garden_plants = garden_plant::with(['garden', 'plant'])->orderBy('id', 'asc')->get();
        return view('activityhistorie.create', compact('garden_plants'));
    }

    public function store(Request $request)
    {
        activity_historie::create($request->all());

        return redirect()->route('activityhistorie.index');
    }

    public function edit(activity_historie $activity)
    {
        $garden_plants = garden_plant::with(['garden', 'plant'])->orderBy('id', 'asc')->get();
        return view('activityhistorie.edit', compact('activity', 'garden_plants'));
    }

    public function update(Request $request, activity_historie $activity)
    {
        $activity->update($request->all());
        return redirect()->route('activityhistorie.index');
    }

    public function destroy(activity_historie $activity)
    {
        $activity->delete();
        return redirect()->route('activityhistorie.index');
    }
}
