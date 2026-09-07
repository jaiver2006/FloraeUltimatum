@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card shadow-sm border-0">
                    <div class="card-header py-3" style="background-color: #008332;">
                        <h5 class="card-title mb-0 text-white text-center fw-bold">Editar usuario</h5>
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-4">
                                <label for="first_name" class="form-label fw-semibold text-secondary">Primer nombre</label>
                                <input type="text" class="form-control form-control-lg" id="first_name" name="first_name"
                                    value="{{ old('first_name', $user->first_name) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="second_name" class="form-label fw-semibold text-secondary">Segundo
                                    nombre</label>
                                <input type="text" class="form-control form-control-lg" id="second_name"
                                    name="second_name" value="{{ old('second_name', $user->second_name) }}">
                            </div>
                            <div class="mb-4">
                                <label for="first_lastname" class="form-label fw-semibold text-secondary">Primer
                                    apellido</label>
                                <input type="text" class="form-control form-control-lg" id="first_lastname"
                                    name="first_lastname" value="{{ old('first_lastname', $user->first_lastname) }}"
                                    required>
                            </div>
                            <div class="mb-4">
                                <label for="second_lastname" class="form-label fw-semibold text-secondary">Segundo
                                    apellido</label>
                                <input type="text" class="form-control form-control-lg" id="second_lastname"
                                    name="second_lastname" value="{{ old('second_lastname', $user->second_lastname) }}">
                            </div>
                            <div class="mb-4">
                                <label for="email" class="form-label fw-semibold text-secondary">Correo
                                    electrónico</label>
                                <input type="email" class="form-control form-control-lg" id="email" name="email"
                                    value="{{ old('email', $user->email) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="password" class="form-label fw-semibold text-secondary">Contraseña</label>
                                <input type="password" class="form-control form-control-lg" id="password" name="password">
                            </div>
                            <div class="mb-4">
                                <label for="role" class="form-label fw-semibold text-secondary">Rol</label>
                                <input type="text" class="form-control form-control-lg" id="role" name="role"
                                    value="{{ old('role', $user->role) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="garden_id" class="form-label fw-semibold text-secondary">Jardín</label>
                                <select class="form-select form-select-lg" id="garden_id" name="garden_id">
                                    <option value="">Sin jardín</option>
                                    @foreach ($gardens as $garden)
                                        <option value="{{ $garden->id }}"
                                            {{ old('garden_id', $user->garden_id) == $garden->id ? 'selected' : '' }}>
                                            {{ $garden->plant_classification }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="d-grid gap-2 mt-5">
                                <button type="submit"
                                    class="btn text-white fw-bold px-4 py-2 fs-5 text-decoration-none text-center shadow-sm"
                                    style="background-color: #008332; border-radius: 0.5rem;">Actualizar usuario</button>
                                <a href="{{ route('user.index') }}"
                                    class="btn btn-link btn-sm text-secondary text-decoration-none text-center">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
