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

    public function show(plague $plague)
    {
        return view('plague.show', compact('plague'));
    }

    public function create()
    {
        $imagePlagues = image_plague::orderBy('id', 'asc')->get();

        return view('plague.create', compact('imagePlagues'));
    }

    public function store(Request $request)
    {
        plague::create($request->all());

        return redirect()->route('plague.index');
    }

    public function edit(plague $plague)
    {
        $imagePlagues = image_plague::orderBy('id', 'asc')->get();

        return view('plague.edit', compact('plague', 'imagePlagues'));
    }

    public function update(Request $request, plague $plague)
    {
        $plague->update($request->all());

        return redirect()->route('plague.index');
    }

    public function destroy(plague $plague)
    {
        $plague->delete();

        return redirect()->route('plague.index');
    }
}
