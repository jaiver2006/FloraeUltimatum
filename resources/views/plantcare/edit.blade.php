@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card shadow-sm border-0">
                    <div class="card-header py-3" style="background-color: #008332;">
                        <h5 class="card-title mb-0 text-white text-center fw-bold">Editar cuidado de planta</h5>
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ route('plantcare.update', $plant_care->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-4">
                                <label for="plant_id" class="form-label fw-semibold text-secondary">Planta</label>
                                <select class="form-select form-select-lg" id="plant_id" name="plant_id">
                                    <option value="">Sin planta</option>
                                    @foreach ($plants as $plant)
                                        <option value="{{ $plant->id }}"
                                            {{ old('plant_id', $plant_care->plant_id) == $plant->id ? 'selected' : '' }}>
                                            {{ $plant->common_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="watering" class="form-label fw-semibold text-secondary">Riego</label>
                                <input type="text" class="form-control form-control-lg" id="watering" name="watering"
                                    value="{{ old('watering', $plant_care->watering) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="light" class="form-label fw-semibold text-secondary">Luz</label>
                                <input type="text" class="form-control form-control-lg" id="light" name="light"
                                    value="{{ old('light', $plant_care->light) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="temperature" class="form-label fw-semibold text-secondary">Temperatura</label>
                                <input type="text" class="form-control form-control-lg" id="temperature"
                                    name="temperature" value="{{ old('temperature', $plant_care->temperature) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="fertilization"
                                    class="form-label fw-semibold text-secondary">Fertilización</label>
                                <input type="text" class="form-control form-control-lg" id="fertilization"
                                    name="fertilization" value="{{ old('fertilization', $plant_care->fertilization) }}"
                                    required>
                            </div>
                            <div class="d-grid gap-2 mt-5">
                                <button type="submit" class="btn text-white fw-bold px-4 py-2 fs-5 shadow-sm"
                                    style="background-color: #008332; border-radius: 0.5rem;">Actualizar cuidado</button>
                                <a href="{{ route('plantcare.index') }}"
                                    class="btn btn-link btn-sm text-secondary text-decoration-none text-center">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
