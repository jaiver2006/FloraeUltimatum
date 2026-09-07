@extends('layouts.app')
@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">

                <div class="card shadow-sm border-0">
                    <div class="card-header py-3" style="background-color: #008332;">
                        <h5 class="card-title mb-0 text-white text-center fw-bold">
                            Editar imagen
                        </h5>
                    </div>

                    <div class="card-body p-4">
                        <form action="{{ route('imageplague.update', $imagePlague->id) }}" method="POST"
                            enctype="multipart/form-data">

                            @csrf
                            @method('PUT')

                            <div class="mb-4">
                                <label for="image" class="form-label fw-semibold text-secondary">
                                    Imagen
                                </label>

                                <input type="file" class="form-control form-control-lg" id="image" name="image">
                            </div>

                            <div class="d-grid gap-2 mt-5">

                                <button type="submit"
                                    class="btn text-white fw-bold px-4 py-2 fs-5 text-decoration-none text-center shadow-sm"
                                    style="background-color: #008332; border-radius: 0.5rem;">
                                    Actualizar imagen
                                </button>

                                <a href="{{ route('imageplague.index') }}"
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
