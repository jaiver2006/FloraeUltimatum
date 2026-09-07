@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card shadow-sm border-0">
                    <div class="card-header py-3" style="background-color: #008332;">
                        <h5 class="card-title mb-0 text-white text-center fw-bold">Registrar plaga</h5>
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ route('plague.store') }}" method="POST">
                            @csrf

                            @foreach (['plague_name' => 'Nombre de la plaga', 'plague2_name' => 'Segundo nombre de la plaga', 'plague3_name' => 'Tercer nombre de la plaga', 'scientific_name' => 'Nombre científico'] as $field => $label)
                                <div class="mb-4">
                                    <label for="{{ $field }}"
                                        class="form-label fw-semibold text-secondary">{{ $label }}</label>
                                    <input type="text" class="form-control form-control-lg" id="{{ $field }}"
                                        name="{{ $field }}" value="{{ old($field) }}" required>
                                </div>
                            @endforeach

                            <div class="mb-4">
                                <label for="plague_description"
                                    class="form-label fw-semibold text-secondary">Descripción</label>
                                <textarea class="form-control" id="plague_description" name="plague_description" rows="4" required>{{ old('plague_description') }}</textarea>
                            </div>

                            <div class="mb-4">
                                <label for="plague_symptom" class="form-label fw-semibold text-secondary">Síntomas</label>
                                <textarea class="form-control" id="plague_symptom" name="plague_symptom" rows="4" required>{{ old('plague_symptom') }}</textarea>
                            </div>

                            <div class="mb-4">
                                <label for="image_plague_id" class="form-label fw-semibold text-secondary">Imagen de
                                    plaga</label>
                                <select name="image_plague_id" id="image_plague_id" class="form-select form-select-lg">
                                    <option value="">Sin imagen</option>
                                    @foreach ($imagePlagues as $imagePlague)
                                        <option value="{{ $imagePlague->id }}"
                                            data-image-url="{{ Storage::url($imagePlague->image) }}"
                                            {{ old('image_plague_id') == $imagePlague->id ? 'selected' : '' }}>
                                            {{ basename($imagePlague->image) }}
                                        </option>
                                    @endforeach
                                </select>
                                <img id="image_plague_preview" src="" alt="Vista previa de la plaga"
                                    class="img-thumbnail mt-3 d-none"
                                    style="width: 140px; height: 140px; object-fit: cover;">
                            </div>

                            <div class="d-grid gap-2 mt-5">
                                <button type="submit" class="btn text-white fw-bold px-4 py-2 fs-5 shadow-sm"
                                    style="background-color: #008332; border-radius: 0.5rem;">
                                    Registrar plaga
                                </button>
                                <a href="{{ route('plague.index') }}"
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
    <script>
        const plagueImageSelect = document.getElementById('image_plague_id');
        const plagueImagePreview = document.getElementById('image_plague_preview');

        plagueImageSelect.addEventListener('change', () => {
            const imageUrl = plagueImageSelect.selectedOptions[0]?.dataset.imageUrl;
            plagueImagePreview.src = imageUrl || '';
            plagueImagePreview.classList.toggle('d-none', !imageUrl);
        });

        plagueImageSelect.dispatchEvent(new Event('change'));
    </script>
@endsection
