@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card shadow-sm border-0">
                    <div class="card-header py-3" style="background-color: #008332;">
                        <h5 class="card-title mb-0 text-white text-center fw-bold">Registrar medicamento de tratamiento</h5>
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ route('medicationtreatment.store') }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label for="treatment_id" class="form-label fw-semibold text-secondary">Tratamiento</label>
                                <select class="form-select form-select-lg" id="treatment_id" name="treatment_id">
                                    <option value="">Sin tratamiento</option>
                                    @foreach ($treatments as $treatment)
                                        <option value="{{ $treatment->id }}">Tratamiento #{{ $treatment->id }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="medicine_id" class="form-label fw-semibold text-secondary">Medicamento</label>
                                <select class="form-select form-select-lg" id="medicine_id" name="medicine_id">
                                    <option value="">Sin medicamento</option>
                                    @foreach ($medicines as $medicine)
                                        <option value="{{ $medicine->id }}">{{ $medicine->medicine_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="start_date" class="form-label fw-semibold text-secondary">Fecha de
                                    inicio</label>
                                <input type="date" class="form-control form-control-lg" id="start_date" name="start_date"
                                    value="{{ old('start_date') }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="end_date" class="form-label fw-semibold text-secondary">Fecha final</label>
                                <input type="date" class="form-control form-control-lg" id="end_date" name="end_date"
                                    value="{{ old('end_date') }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="applied_dose" class="form-label fw-semibold text-secondary">Dosis
                                    aplicada</label>
                                <input type="text" class="form-control form-control-lg" id="applied_dose"
                                    name="applied_dose" value="{{ old('applied_dose') }}" required>
                            </div>
                            <div class="d-grid gap-2 mt-5">
                                <button type="submit" class="btn text-white fw-bold px-4 py-2 fs-5 shadow-sm"
                                    style="background-color: #008332; border-radius: 0.5rem;">Enviar formulario</button>
                                <a href="{{ route('medicationtreatment.index') }}"
                                    class="btn btn-link btn-sm text-secondary text-decoration-none text-center">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
