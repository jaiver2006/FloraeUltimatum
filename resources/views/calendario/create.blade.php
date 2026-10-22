@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card shadow-sm border-0">
                    <div class="card-header py-3" style="background-color: #008332;">
                        <h5 class="card-title mb-0 text-white text-center fw-bold">Registrar evento del calendario</h5>
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ route('calendario.store') }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label for="care_record_id" class="form-label fw-semibold text-secondary">
                                    Registro de cuidado
                                </label>
                                <select class="form-select form-select-lg" id="care_record_id" name="care_record_id">
                                    <option value="">Sin registro de cuidado</option>
                                    @foreach ($care_records as $care_record)
                                        <option value="{{ $care_record->id }}">
                                            Registro #{{ $care_record->id }} - {{ $care_record->care_date }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="garden_id" class="form-label fw-semibold text-secondary">Jardín</label>
                                <select class="form-select form-select-lg" id="garden_id" name="garden_id">
                                    <option value="">Sin jardín</option>
                                    @foreach ($gardens as $garden)
                                        <option value="{{ $garden->id }}">
                                            {{ $garden->plant_classification }} (Jardín #{{ $garden->id }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="d-grid gap-2 mt-5">
                                <button type="submit" class="btn text-white fw-bold px-4 py-2 fs-5 shadow-sm"
                                    style="background-color: #008332; border-radius: 0.5rem;">Enviar formulario</button>
                                <a href="{{ route('calendario.index') }}"
                                    class="btn btn-link btn-sm text-secondary text-decoration-none text-center">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
