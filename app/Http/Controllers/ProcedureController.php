<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Procedure;
use App\Models\treatment;

class ProcedureController extends Controller
{
    public function index()
    {
        $procedures = Procedure::with('treatment')->orderBy('id', 'asc')->get();
        return view('procedure.index', compact('procedures'));
    }

    public function show(Procedure $procedure)
    {
        return view('procedure.show', compact('procedure'));
    }

    public function create()
    {
        $treatments = treatment::orderBy('id', 'asc')->get();
        return view('procedure.create', compact('treatments'));
    }

    public function store(Request $request)
    {
        Procedure::create($request->all());

        return redirect()->route('procedure.index');
    }

    public function edit(Procedure $procedure)
    {
        $treatments = treatment::orderBy('id', 'asc')->get();
        return view('procedure.edit', compact('procedure', 'treatments'));
    }

    public function update(Request $request, Procedure $procedure)
    {
        $procedure->update($request->all());
        return redirect()->route('procedure.index');
    }

    public function destroy(Procedure $procedure)
    {
        $procedure->delete();
        return redirect()->route('procedure.index');
    }
}
