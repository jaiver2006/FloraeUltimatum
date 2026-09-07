@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card shadow-sm border-0">
                    <div class="card-header py-3" style="background-color: #008332;">
                        <h5 class="card-title mb-0 text-white text-center fw-bold">Editar actividad</h5>
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ route('activityhistorie.update', $activity->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-4">
                                <label for="event_description" class="form-label fw-semibold text-secondary">Descripción del
                                    evento</label>
                                <textarea class="form-control" id="event_description" name="event_description" rows="3" required>{{ old('event_description', $activity->event_description) }}</textarea>
                            </div>
                            <div class="mb-4">
                                <label for="registration_date" class="form-label fw-semibold text-secondary">Fecha de
                                    registro</label>
                                <input type="date" class="form-control form-control-lg" id="registration_date"
                                    name="registration_date"
                                    value="{{ old('registration_date', $activity->registration_date) }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="garden_plant_id" class="form-label fw-semibold text-secondary">Jardín y
                                    planta</label>
                                <select class="form-select form-select-lg" id="garden_plant_id" name="garden_plant_id">
                                    <option value="">Sin jardín ni planta</option>
                                    @foreach ($garden_plants as $garden_plant)
                                        <option value="{{ $garden_plant->id }}"
                                            {{ old('garden_plant_id', $activity->garden_plant_id) == $garden_plant->id ? 'selected' : '' }}>
                                            Jardín:
                                            {{ $garden_plant->garden ? $garden_plant->garden->plant_classification : 'Sin jardín' }}
                                            - Planta:
                                            {{ $garden_plant->plant ? $garden_plant->plant->common_name : 'Sin planta' }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="d-grid gap-2 mt-5">
                                <button type="submit" class="btn text-white fw-bold px-4 py-2 fs-5 shadow-sm"
                                    style="background-color: #008332; border-radius: 0.5rem;">Actualizar actividad</button>
                                <a href="{{ route('activityhistorie.index') }}"
                                    class="btn btn-link btn-sm text-secondary text-decoration-none text-center">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
