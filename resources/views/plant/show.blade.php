@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="mx-auto mb-3 d-inline-block p-2 text-center" style="background-color: #008332; border-radius: 2rem;">
            <a href="{{ url()->previous() }}"
                class="btn btn-link text-decoration-none p-0 text-white fw-semibold d-inline-flex align-items-center"
                title="Volver">
                <i class="bi bi-arrow-left fs-5"></i>
            </a>
        </div>

        <div class="card shadow border-0 overflow-hidden mx-auto" style="max-width: 800px;">
            <div class="card-header text-white p-4" style="background-color: #008332;">
                <div class="d-flex align-items-center justify-content-between">
                    <span class="badge bg-white text-uppercase fw-bold" style="color: #008332;">Ficha de planta</span>
                    <span class="text-white fs-5">ID: #{{ $plant->id }}</span>
                </div>
            </div>

            <div class="card-body p-4 bg-light">
                <div class="bg-white p-4 rounded shadow-sm">
                    <h5 class="text-secondary border-bottom pb-2 mb-4">Información de la planta</h5>
                    <div class="row g-4">
                        @foreach ([
            'common_name' => 'Nombre común',
            'common2_name' => 'Segundo nombre común',
            'common3_name' => 'Tercer nombre común',
            'common4_name' => 'Cuarto nombre común',
            'scientific_name' => 'Nombre científico',
            'origin' => 'Origen',
            'type' => 'Tipo',
            'size' => 'Tamaño',
        ] as $field => $label)
                            @if ($plant->{$field})
                                <div class="col-md-6">
                                    <small class="text-muted d-block text-uppercase fw-bold">{{ $label }}</small>
                                    <span class="text-dark fs-5 fw-semibold">{{ $plant->{$field} }}</span>
                                </div>
                            @endif
                        @endforeach

                        <div class="col-12">
                            <small class="text-muted d-block text-uppercase fw-bold">Descripción</small>
                            <p class="text-dark mb-0">{{ $plant->plant_description }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer bg-white border-0 px-4 py-3 border-top text-muted">
                <div class="row text-center text-md-start">
                    <div class="col-md-6 mb-2 mb-md-0">
                        <i class="bi bi-calendar-plus me-1"></i>
                        <strong>Creado el:</strong>
                        {{ optional($plant->created_at)->format('d/m/Y H:i') }}
                    </div>
                    <div class="col-md-6 text-md-end">
                        <i class="bi bi-arrow-clockwise me-1"></i>
                        <strong>Última actualización:</strong>
                        {{ optional($plant->updated_at)->format('d/m/Y H:i') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
