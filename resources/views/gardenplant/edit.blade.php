@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card shadow-sm border-0">
                    <div class="card-header py-3" style="background-color: #008332;">
                        <h5 class="card-title mb-0 text-white text-center fw-bold">Editar planta en jardín</h5>
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ route('gardenplant.update', $garden_plant->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-4">
                                <label for="garden_id" class="form-label fw-semibold text-secondary">Jardín</label>
                                <select class="form-select form-select-lg" id="garden_id" name="garden_id">
                                    <option value="">Sin jardín</option>
                                    @foreach ($gardens as $garden)
                                        <option value="{{ $garden->id }}"
                                            {{ old('garden_id', $garden_plant->garden_id) == $garden->id ? 'selected' : '' }}>
                                            {{ $garden->plant_classification }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="plant_id" class="form-label fw-semibold text-secondary">Planta</label>
                                <select class="form-select form-select-lg" id="plant_id" name="plant_id">
                                    <option value="">Sin planta</option>
                                    @foreach ($plants as $plant)
                                        <option value="{{ $plant->id }}"
                                            {{ old('plant_id', $garden_plant->plant_id) == $plant->id ? 'selected' : '' }}>
                                            {{ $plant->common_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="d-grid gap-2 mt-5">
                                <button type="submit" class="btn text-white fw-bold px-4 py-2 fs-5 shadow-sm"
                                    style="background-color: #008332; border-radius: 0.5rem;">Actualizar relación</button>
                                <a href="{{ route('gardenplant.index') }}"
                                    class="btn btn-link btn-sm text-secondary text-decoration-none text-center">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
