@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card shadow-sm border-0">
                    <div class="card-header py-3" style="background-color: #008332;">
                        <h5 class="card-title mb-0 text-white text-center fw-bold">Registrar medicamento</h5>
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ route('medicine.store') }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label for="medicine_name" class="form-label fw-semibold text-secondary">Nombre</label>
                                <input type="text" class="form-control form-control-lg" id="medicine_name"
                                    name="medicine_name" value="{{ old('medicine_name') }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="medicine_type" class="form-label fw-semibold text-secondary">Tipo</label>
                                <input type="text" class="form-control form-control-lg" id="medicine_type"
                                    name="medicine_type" value="{{ old('medicine_type') }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="medicine_description"
                                    class="form-label fw-semibold text-secondary">Descripción</label>
                                <textarea class="form-control" id="medicine_description" name="medicine_description" rows="3" required>{{ old('medicine_description') }}</textarea>
                            </div>
                            <div class="mb-4">
                                <label for="suggested_dose" class="form-label fw-semibold text-secondary">Dosis
                                    sugerida</label>
                                <input type="text" class="form-control form-control-lg" id="suggested_dose"
                                    name="suggested_dose" value="{{ old('suggested_dose') }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="instructions"
                                    class="form-label fw-semibold text-secondary">Instrucciones</label>
                                <textarea class="form-control" id="instructions" name="instructions" rows="3" required>{{ old('instructions') }}</textarea>
                            </div>
                            <div class="d-grid gap-2 mt-5">
                                <button type="submit" class="btn text-white fw-bold px-4 py-2 fs-5 shadow-sm"
                                    style="background-color: #008332; border-radius: 0.5rem;">Enviar formulario</button>
                                <a href="{{ route('medicine.index') }}"
                                    class="btn btn-link btn-sm text-secondary text-decoration-none text-center">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
