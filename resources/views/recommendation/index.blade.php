@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="mb-0 text-dark fw-bold text-uppercase fs-3">Listar recomendaciones</h1>

            <a href="{{ route('recommendation.create') }}"
                class="btn fw-semibold text-white px-3 py-2 d-inline-flex align-items-center shadow-sm"
                style="background-color: #025a00; border-radius: 0.5rem;">
                <i class="bi bi-plus-circle me-2 fs-5"></i> Crear recomendación
            </a>
        </div>

        <div class="table-responsive shadow-sm rounded">
            <table id="idtruker" class="table table-striped table-bordered align-middle mb-0" style="width:100%">
                <thead class="table-light">
                    <tr>
                        <th>Id</th>
                        <th>Planta</th>
                        <th>Recomendación 1</th>
                        <th>Recomendación 2</th>
                        <th class="text-center" style="width: 197px; min-width: 197px; max-width: 197px;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($recommendations as $recommendation)
                        <tr>
                            <td>{{ $recommendation->id }}</td>
                            <td>{{ $recommendation->plant ? $recommendation->plant->common_name : 'Sin planta' }}</td>
                            <td>{{ $recommendation->recommendation1 }}</td>
                            <td>{{ $recommendation->recommendation2 }}</td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center align-items-center gap-2">
                                    <a href="{{ route('recommendation.show', $recommendation->id) }}"
                                        class="btn btn-sm btn-outline-success d-inline-flex align-items-center justify-content-center"
                                        style="width: 40px; height: 30px;">
                                        <i class="bi bi-eye" style="font-size: 20px"></i>
                                    </a>
                                    <a href="{{ route('recommendation.edit', $recommendation->id) }}"
                                        class="btn btn-sm btn-outline-primary d-inline-flex align-items-center justify-content-center"
                                        style="width: 40px; height: 30px;">
                                        <i class="bi bi-pencil" style="font-size: 18px"></i>
                                    </a>
                                    <form action="{{ route('recommendation.destroy', $recommendation->id) }}" method="POST"
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
