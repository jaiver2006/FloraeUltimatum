@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="mb-0 text-dark fw-bold text-uppercase fs-3">Listar síntomas de plagas</h1>

            <a href="{{ route('plaguesymptom.create') }}"
                class="btn fw-semibold text-white px-3 py-2 d-inline-flex align-items-center shadow-sm"
                style="background-color: #025a00; border-radius: 0.5rem;">
                <i class="bi bi-plus-circle me-2 fs-5"></i> Crear registro
            </a>
        </div>

        <div class="table-responsive shadow-sm rounded">
            <table id="idtruker" class="table table-striped table-bordered align-middle mb-0" style="width:100%">
                <thead class="table-light">
                    <tr>
                        <th>Id</th>
                        <th>Plaga</th>
                        <th>Síntoma</th>
                        <th class="text-center" style="width: 197px; min-width: 197px; max-width: 197px;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($plague_symptoms as $plague_symptom)
                        <tr>
                            <td>{{ $plague_symptom->id }}</td>
                            <td>{{ $plague_symptom->plague ? $plague_symptom->plague->plague_name : 'Sin plaga' }}</td>
                            <td>{{ $plague_symptom->symptom ? $plague_symptom->symptom->name : 'Sin síntoma' }}</td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center align-items-center gap-2">
                                    <a href="{{ route('plaguesymptom.show', $plague_symptom->id) }}"
                                        class="btn btn-sm btn-outline-success d-inline-flex align-items-center justify-content-center"
                                        style="width: 40px; height: 30px;">
                                        <i class="bi bi-eye" style="font-size: 20px"></i>
                                    </a>
                                    <a href="{{ route('plaguesymptom.edit', $plague_symptom->id) }}"
                                        class="btn btn-sm btn-outline-primary d-inline-flex align-items-center justify-content-center"
                                        style="width: 40px; height: 30px;">
                                        <i class="bi bi-pencil" style="font-size: 18px"></i>
                                    </a>
                                    <form action="{{ route('plaguesymptom.destroy', $plague_symptom->id) }}" method="POST"
                                        class="m-0">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="btn btn-sm btn-outline-danger d-inline-flex align-items-center justify-content-center"
                                            style="width: 40px; height: 30px;">
                                            <i class="bi bi-trash3" style="font-size: 18px"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
