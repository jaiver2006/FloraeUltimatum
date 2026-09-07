<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
use App\Models\garden;

class UserController extends Controller
{
    public function index()
    {
        $users = user::with('garden')->orderBy('id', 'asc')->get();
        return view('user.index', compact('users'));
    }

    public function show(user $user)
    {
        return view('user.show', compact('user'));
    }

    public function create()
    {
        $gardens = garden::orderBy('id', 'asc')->get();
        return view('user.create', compact('gardens'));
    }

    public function store(Request $request)
    {
        user::create($request->all());

        return redirect()->route('user.index');
    }

    public function edit(user $user)
    {
        $gardens = garden::orderBy('id', 'asc')->get();
        return view('user.edit', compact('user', 'gardens'));
    }

    public function update(Request $request, user $user)
    {
        $user->update($request->all());
        return redirect()->route('user.index');
    }

    public function destroy(user $user)
    {
        $user->delete();
        return redirect()->route('user.index');
    }
}
