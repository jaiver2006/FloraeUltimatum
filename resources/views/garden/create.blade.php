@extends('layouts.app')
@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">

                <div class="card shadow-sm border-0">
                    <div class="card-header py-3" style="background-color: #008332;">
                        <h5 class="card-title mb-0 text-white text-center fw-bold">
                            Registrar jardin
                        </h5>
                    </div>

                    <div class="card-body p-4">
                        <form action="{{ route('garden.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-4">
                                <label for="plant_classification" class="form-label fw-semibold text-secondary">Clasificación de la planta</label>
                                <input type="text" class="form-control form-control-lg" id="plant_classification" name="plant_classification"
                                    required>
                            </div>
                            <div class="mb-4">
                                <label for="plant_quantity" class="form-label fw-semibold text-secondary">Cantidad de plantas</label>
                                <input type="text" class="form-control form-control-lg" id="plant_quantity" name="plant_quantity"
                                    required>
                            </div>
                            <div class="mb-4">
                                <label for="creation_date" class="form-label fw-semibold text-secondary">Fecha de creación</label>
                                <input type="date" class="form-control form-control-lg" id="creation_date" name="creation_date"
                                    required>
                            </div>

                            <div class="d-grid gap-2 mt-5">
                                <button type="submit"
                                    class="btn text-white fw-bold px-4 py-2 fs-5 text-decoration-none text-center shadow-sm"
                                    style="background-color: #008332; border-radius: 0.5rem;">
                                    Enviar formulario
                                </button>
                                <a href="{{ route('garden.index') }}"
                                    class="btn btn-link btn-sm text-secondary text-decoration-none text-center">
                                    Cancelar
                                </a>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
