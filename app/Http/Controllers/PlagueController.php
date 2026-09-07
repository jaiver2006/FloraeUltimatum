<?php

namespace App\Http\Controllers;

use App\Models\image_plague;
use App\Models\plague;
use Illuminate\Http\Request;

class PlagueController extends Controller
{
    public function index()
    {
        $plagues = plague::with('image_plague')->orderBy('id', 'asc')->get();

        return view('plague.index', compact('plagues'));
    }

    public function create()
    {
        $imagePlagues = image_plague::all();

        return view('plague.create', compact('imagePlagues'));
    }

    public function show(plague $plague)
    {
        return view('plague.show', compact('plague'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'plague_name' => 'required|string|max:255',
            'plague2_name' => 'required|string|max:255',
            'plague3_name' => 'required|string|max:255',
            'scientific_name' => 'required|string|max:255',
            'plague_description' => 'required|string',
            'plague_symptom' => 'required|string',
            'image_plague_id' => 'nullable|exists:image_plagues,id',
        ]);

        plague::create($request->all());

        return redirect()->route('plague.index');
    }

    public function edit(plague $plague)
    {
        $imagePlagues = image_plague::all();

        return view('plague.edit', compact('plague', 'imagePlagues'));
    }

    public function update(Request $request, plague $plague)
    {
        $request->validate([
            'plague_name' => 'required|string|max:255',
            'plague2_name' => 'required|string|max:255',
            'plague3_name' => 'required|string|max:255',
            'scientific_name' => 'required|string|max:255',
            'plague_description' => 'required|string',
            'plague_symptom' => 'required|string',
            'image_plague_id' => 'nullable|exists:image_plagues,id',
        ]);

        $plague->update($request->all());

        return redirect()->route('plague.index');
    }

    public function destroy(plague $plague)
    {
        $plague->delete();

        return redirect()->route('plague.index');
    }
}
