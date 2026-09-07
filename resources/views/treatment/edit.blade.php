@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card shadow-sm border-0">
                    <div class="card-header py-3" style="background-color: #008332;">
                        <h5 class="card-title mb-0 text-white text-center fw-bold">Editar tratamiento</h5>
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ route('treatment.update', $treatment->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-4">
                                <label for="start_date" class="form-label fw-semibold text-secondary">Fecha de
                                    inicio</label>
                                <input type="date" class="form-control form-control-lg" id="start_date" name="start_date"
                                    value="{{ old('start_date', $treatment->start_date) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="end_date" class="form-label fw-semibold text-secondary">Fecha final</label>
                                <input type="date" class="form-control form-control-lg" id="end_date" name="end_date"
                                    value="{{ old('end_date', $treatment->end_date) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="status" class="form-label fw-semibold text-secondary">Estado</label>
                                <input type="text" class="form-control form-control-lg" id="status" name="status"
                                    value="{{ old('status', $treatment->status) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="description" class="form-label fw-semibold text-secondary">Descripción</label>
                                <textarea class="form-control" id="description" name="description" rows="3" required>{{ old('description', $treatment->description) }}</textarea>
                            </div>
                            <div class="mb-4">
                                <label for="plague_id" class="form-label fw-semibold text-secondary">Plaga</label>
                                <select class="form-select form-select-lg" id="plague_id" name="plague_id">
                                    <option value="">Sin plaga</option>
                                    @foreach ($plagues as $plague)
                                        <option value="{{ $plague->id }}"
                                            {{ old('plague_id', $treatment->plague_id) == $plague->id ? 'selected' : '' }}>
                                            {{ $plague->plague_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="d-grid gap-2 mt-5">
                                <button type="submit" class="btn text-white fw-bold px-4 py-2 fs-5 shadow-sm"
                                    style="background-color: #008332; border-radius: 0.5rem;">Actualizar
                                    tratamiento</button>
                                <a href="{{ route('treatment.index') }}"
                                    class="btn btn-link btn-sm text-secondary text-decoration-none text-center">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
