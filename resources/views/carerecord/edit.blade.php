@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card shadow-sm border-0">
                    <div class="card-header py-3" style="background-color: #008332;">
                        <h5 class="card-title mb-0 text-white text-center fw-bold">Editar registro de cuidado</h5>
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ route('carerecord.update', $care_record->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-4">
                                <label for="care_date" class="form-label fw-semibold text-secondary">Fecha de
                                    cuidado</label>
                                <input type="date" class="form-control form-control-lg" id="care_date" name="care_date"
                                    value="{{ old('care_date', $care_record->care_date) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="plant_id" class="form-label fw-semibold text-secondary">Planta</label>
                                <select class="form-select form-select-lg" id="plant_id" name="plant_id">
                                    <option value="">Sin planta</option>
                                    @foreach ($plants as $plant)
                                        <option value="{{ $plant->id }}"
                                            {{ old('plant_id', $care_record->plant_id) == $plant->id ? 'selected' : '' }}>
                                            {{ $plant->common_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="plant_care_id" class="form-label fw-semibold text-secondary">Cuidado de
                                    planta</label>
                                <select class="form-select form-select-lg" id="plant_care_id" name="plant_care_id">
                                    <option value="">Sin cuidado</option>
                                    @foreach ($plant_cares as $plant_care)
                                        <option value="{{ $plant_care->id }}"
                                            {{ old('plant_care_id', $care_record->plant_care_id) == $plant_care->id ? 'selected' : '' }}>
                                            Cuidado #{{ $plant_care->id }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="d-grid gap-2 mt-5">
                                <button type="submit" class="btn text-white fw-bold px-4 py-2 fs-5 shadow-sm"
                                    style="background-color: #008332; border-radius: 0.5rem;">Actualizar registro</button>
                                <a href="{{ route('carerecord.index') }}"
                                    class="btn btn-link btn-sm text-secondary text-decoration-none text-center">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
