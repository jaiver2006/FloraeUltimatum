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
                        <span class="badge bg-white text-uppercase mb-2 fw-bold" style="color: #008332;">Ficha de planta en
                            jardín</span>
                        <h2 class="mb-0 fw-light">
                            <strong>{{ $garden_plant->plant ? $garden_plant->plant->common_name : 'Sin planta' }}</strong>
                        </h2>
                    </div>
                    <span class="text-white fs-5">ID: #{{ $garden_plant->id }}</span>
                </div>
            </div>

            <div class="card-body p-4 bg-light">
                <div class="bg-white p-4 rounded shadow-sm mb-4">
                    <h5 class="text-secondary border-bottom pb-2 mb-3">Datos de la relación</h5>
                    <div class="row g-4">
                        <div class="col-md-6">
                            <small class="text-muted d-block text-uppercase fw-bold text-xs">Jardín</small>
                            <span
                                class="text-dark fs-5 fw-semibold">{{ $garden_plant->garden ? $garden_plant->garden->plant_classification : 'Sin jardín' }}</span>
                        </div>
                        <div class="col-md-6">
                            <small class="text-muted d-block text-uppercase fw-bold text-xs">Planta</small>
                            <span
                                class="text-dark fs-5 fw-semibold">{{ $garden_plant->plant ? $garden_plant->plant->common_name : 'Sin planta' }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer bg-white border-0 px-4 py-3 border-top text-muted fs-7">
                <div class="row text-center text-md-start">
                    <div class="col-md-6 mb-2 mb-md-0">
                        <i class="bi bi-calendar-plus me-1"></i>
                        <strong>Creado el:</strong>
                        {{ \Carbon\Carbon::parse($garden_plant->created_at)->format('d/m/Y H:i') }}
                    </div>
                    <div class="col-md-6 text-md-end">
                        <i class="bi bi-arrow-clockwise me-1"></i>
                        <strong>Última actualización:</strong>
                        {{ \Carbon\Carbon::parse($garden_plant->updated_at)->format('d/m/Y H:i') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
