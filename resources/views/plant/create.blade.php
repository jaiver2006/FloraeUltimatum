@extends('layouts.app')
@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">

                <div class="card shadow-sm border-0">
                    <div class="card-header py-3" style="background-color: #008332;">
                        <h5 class="card-title mb-0 text-white text-center fw-bold">
                            Registrar planta
                        </h5>
                    </div>

                    <div class="card-body p-4">
                        <form action="{{ route('plant.store') }}" method="POST">
                            @csrf

                            <div class="mb-4">
                                <label for="common_name" class="form-label fw-semibold text-secondary">Nombre común</label>
                                <input type="text" class="form-control form-control-lg" id="common_name"
                                    name="common_name" value="{{ old('common_name') }}" required>
                            </div>
                            @foreach (['common2_name' => 'Segundo nombre común', 'common3_name' => 'Tercer nombre común', 'common4_name' => 'Cuarto nombre común'] as $field => $label)
                                <div class="mb-4">
                                    <label for="{{ $field }}"
                                        class="form-label fw-semibold text-secondary">{{ $label }}</label>
                                    <input type="text" class="form-control form-control-lg" id="{{ $field }}"
                                        name="{{ $field }}" value="{{ old($field) }}">
                                </div>
                            @endforeach
                            <div class="mb-4">
                                <label for="scientific_name" class="form-label fw-semibold text-secondary">Nombre
                                    científico</label>
                                <input type="text" class="form-control form-control-lg" id="scientific_name"
                                    name="scientific_name" value="{{ old('scientific_name') }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="plant_description"
                                    class="form-label fw-semibold text-secondary">Descripción</label>
                                <textarea class="form-control" id="plant_description" name="plant_description" rows="4" required>{{ old('plant_description') }}</textarea>
                            </div>
                            @foreach (['origin' => 'Origen', 'type' => 'Tipo', 'size' => 'Tamaño'] as $field => $label)
                                <div class="mb-4">
                                    <label for="{{ $field }}"
                                        class="form-label fw-semibold text-secondary">{{ $label }}</label>
                                    <input type="text" class="form-control form-control-lg" id="{{ $field }}"
                                        name="{{ $field }}" value="{{ old($field) }}" required>
                                </div>
                            @endforeach

                            <div class="col-md-12">
                                <label for="image_plant_id" class="form-label fw-semibold text-secondary">Imagen de
                                    planta</label>
                                <select name="image_plant_id" id="image_plant_id" class="form-select form-select-lg">
                                    <option value="">Sin imagen</option>
                                    @foreach ($imagePlants as $imagePlant)
                                        <option value="{{ $imagePlant->id }}"
                                            data-image-url="{{ Storage::url($imagePlant->image) }}"
                                            {{ old('image_plant_id') == $imagePlant->id ? 'selected' : '' }}>
                                            {{ basename($imagePlant->image) }}
                                        </option>
                                    @endforeach
                                </select>
                                <img id="image_plant_preview" src="" alt="Vista previa de la planta"
                                    class="img-thumbnail mt-3 d-none"
                                    style="width: 140px; height: 140px; object-fit: cover;">
                            </div>

                            <div class="d-grid gap-2 mt-5">
                                <button type="submit"
                                    class="btn text-white fw-bold px-4 py-2 fs-5 text-decoration-none text-center shadow-sm"
                                    style="background-color: #008332; border-radius: 0.5rem;">
                                    Registrar planta
                                </button>
                                <a href="{{ route('plant.index') }}"
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
        const plantImageSelect = document.getElementById('image_plant_id');
        const plantImagePreview = document.getElementById('image_plant_preview');

        plantImageSelect.addEventListener('change', () => {
            const imageUrl = plantImageSelect.selectedOptions[0]?.dataset.imageUrl;
            plantImagePreview.src = imageUrl || '';
            plantImagePreview.classList.toggle('d-none', !imageUrl);
        });

        plantImageSelect.dispatchEvent(new Event('change'));
    </script>
@endsection
