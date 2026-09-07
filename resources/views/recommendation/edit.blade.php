@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card shadow-sm border-0">
                    <div class="card-header py-3" style="background-color: #008332;">
                        <h5 class="card-title mb-0 text-white text-center fw-bold">Editar recomendación</h5>
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ route('recommendation.update', $recommendation->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-4">
                                <label for="plant_id" class="form-label fw-semibold text-secondary">Planta</label>
                                <select class="form-select form-select-lg" id="plant_id" name="plant_id">
                                    <option value="">Sin planta</option>
                                    @foreach ($plants as $plant)
                                        <option value="{{ $plant->id }}"
                                            {{ old('plant_id', $recommendation->plant_id) == $plant->id ? 'selected' : '' }}>
                                            {{ $plant->common_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="recommendation1" class="form-label fw-semibold text-secondary">Recomendación
                                    1</label>
                                <textarea class="form-control" id="recommendation1" name="recommendation1" rows="3" required>{{ old('recommendation1', $recommendation->recommendation1) }}</textarea>
                            </div>
                            <div class="mb-4">
                                <label for="recommendation2" class="form-label fw-semibold text-secondary">Recomendación
                                    2</label>
                                <textarea class="form-control" id="recommendation2" name="recommendation2" rows="3">{{ old('recommendation2', $recommendation->recommendation2) }}</textarea>
                            </div>
                            <div class="d-grid gap-2 mt-5">
                                <button type="submit" class="btn text-white fw-bold px-4 py-2 fs-5 shadow-sm"
                                    style="background-color: #008332; border-radius: 0.5rem;">Actualizar
                                    recomendación</button>
                                <a href="{{ route('recommendation.index') }}"
                                    class="btn btn-link btn-sm text-secondary text-decoration-none text-center">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
