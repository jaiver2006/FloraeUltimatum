@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="mx-auto mb-3 d-inline-block p-2 text-center" style="background-color: #008332; border-radius: 2rem;">
            <a href="{{ url()->previous() }}"
                class="btn btn-link text-decoration-none p-0 text-white fw-semibold d-inline-flex align-items-center">
                <i class="bi bi-arrow-left fs-5"></i>
            </a>
        </div>

        <div class="card shadow border-0 overflow-hidden mx-auto" style="max-width: 800px;">
            <div class="card-header text-white p-4" style="background-color: #008332;">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="badge bg-white text-uppercase mb-2 fw-bold" style="color: #008332;">Ficha de
                            Registro</span>
                        <h2 class="mb-0 fw-light"><strong>{{ $user->first_name }} {{ $user->first_lastname }}</strong></h2>
                    </div>
                    <span class="text-white fs-5">ID: #{{ $user->id }}</span>
                </div>
            </div>

            <div class="card-body p-4 bg-light">
                <div class="bg-white p-4 rounded shadow-sm mb-4">
                    <h5 class="text-secondary border-bottom pb-2 mb-3">Datos del usuario</h5>
                    <div class="row g-4">
                        <div class="col-md-6"><small class="text-muted d-block text-uppercase fw-bold text-xs">Nombre
                                completo</small><span
                                class="text-dark fs-5 fw-semibold">{{ trim($user->first_name . ' ' . $user->second_name . ' ' . $user->first_lastname . ' ' . $user->second_lastname) }}</span>
                        </div>
                        <div class="col-md-6"><small class="text-muted d-block text-uppercase fw-bold text-xs">Correo
                                electrónico</small><span class="text-dark fs-5 fw-semibold">{{ $user->email }}</span></div>
                        <div class="col-md-6"><small
                                class="text-muted d-block text-uppercase fw-bold text-xs">Rol</small><span
                                class="text-dark fs-5 fw-semibold">{{ $user->role }}</span></div>
                        <div class="col-md-6"><small
                                class="text-muted d-block text-uppercase fw-bold text-xs">Jardín</small><span
                                class="text-dark fs-5 fw-semibold">{{ $user->garden ? $user->garden->plant_classification : 'Sin jardín' }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
