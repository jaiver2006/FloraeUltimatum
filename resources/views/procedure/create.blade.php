@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card shadow-sm border-0">
                    <div class="card-header py-3" style="background-color: #008332;">
                        <h5 class="card-title mb-0 text-white text-center fw-bold">Registrar procedimiento</h5>
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ route('procedure.store') }}" method="POST">
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
                                <label for="step1" class="form-label fw-semibold text-secondary">Paso 1</label>
                                <textarea class="form-control" id="step1" name="step1" rows="3" required>{{ old('step1') }}</textarea>
                            </div>
                            <div class="mb-4">
                                <label for="step2" class="form-label fw-semibold text-secondary">Paso 2</label>
                                <textarea class="form-control" id="step2" name="step2" rows="3" required>{{ old('step2') }}</textarea>
                            </div>
                            <div class="mb-4">
                                <label for="step3" class="form-label fw-semibold text-secondary">Paso 3</label>
                                <textarea class="form-control" id="step3" name="step3" rows="3" required>{{ old('step3') }}</textarea>
                            </div>
                            <div class="mb-4">
                                <label for="step4" class="form-label fw-semibold text-secondary">Paso 4</label>
                                <textarea class="form-control" id="step4" name="step4" rows="3" required>{{ old('step4') }}</textarea>
                            </div>
                            <div class="d-grid gap-2 mt-5">
                                <button type="submit" class="btn text-white fw-bold px-4 py-2 fs-5 shadow-sm"
                                    style="background-color: #008332; border-radius: 0.5rem;">Enviar formulario</button>
                                <a href="{{ route('procedure.index') }}"
                                    class="btn btn-link btn-sm text-secondary text-decoration-none text-center">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
