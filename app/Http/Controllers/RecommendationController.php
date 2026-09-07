<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recommendation;
use App\Models\plant;

class RecommendationController extends Controller
{
    public function index()
    {
        $recommendations = Recommendation::with('plant')->orderBy('id', 'asc')->get();
        return view('recommendation.index', compact('recommendations'));
    }

    public function show(Recommendation $recommendation)
    {
        return view('recommendation.show', compact('recommendation'));
    }

    public function create()
    {
        $plants = plant::orderBy('id', 'asc')->get();
        return view('recommendation.create', compact('plants'));
    }

    public function store(Request $request)
    {
        Recommendation::create($request->all());

        return redirect()->route('recommendation.index');
    }

    public function edit(Recommendation $recommendation)
    {
        $plants = plant::orderBy('id', 'asc')->get();
        return view('recommendation.edit', compact('recommendation', 'plants'));
    }

    public function update(Request $request, Recommendation $recommendation)
    {
        $recommendation->update($request->all());
        return redirect()->route('recommendation.index');
    }

    public function destroy(Recommendation $recommendation)
    {
        $recommendation->delete();
        return redirect()->route('recommendation.index');
    }
}
