<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

// Administra los usuarios y sus jardines relacionados.
class UserController extends Controller
{
    public function index()
    {
        // El modelo oculta la contraseña antes de convertir la respuesta a JSON.
        return response()->json(user::with('garden')->orderByDesc('id')->get());
    }

    public function store(Request $request)
    {
        // Valida los datos del usuario y la relación opcional con un jardín.
        $data = $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'second_name' => ['nullable', 'string', 'max:255'],
            'first_lastname' => ['required', 'string', 'max:255'],
            'second_lastname' => ['nullable', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8'],
            'role' => ['required', 'string', 'max:255'],
            'garden_id' => ['nullable', 'exists:gardens,id'],
        ]);

        // Nunca se guarda la contraseña en texto plano.
        $data['password'] = Hash::make($data['password']);

        return response()->json(user::create($data)->load('garden'), 201);
    }

    public function show(user $user)
    {
        return response()->json($user->load('garden'));
    }

    public function update(Request $request, user $user)
    {
        $data = $request->validate([
            'first_name' => ['sometimes', 'required', 'string', 'max:255'],
            'second_name' => ['sometimes', 'nullable', 'string', 'max:255'],
            'first_lastname' => ['sometimes', 'required', 'string', 'max:255'],
            'second_lastname' => ['sometimes', 'nullable', 'string', 'max:255'],
            'email' => ['sometimes', 'required', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'password' => ['sometimes', 'required', 'string', 'min:8'],
            'role' => ['sometimes', 'required', 'string', 'max:255'],
            'garden_id' => ['sometimes', 'nullable', 'exists:gardens,id'],
        ]);

        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }

        $user->update($data);

        return response()->json($user->load('garden'));
    }

    public function destroy(user $user)
    {
        $user->delete();

        return response()->json(['message' => 'Usuario eliminado correctamente.']);
    }
}
