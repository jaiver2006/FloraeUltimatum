<nav class="navbar navbar-expand-lg" style="background-color: #bacfbf;" data-bs-theme="light">
    <div class="container-fluid">

        <a class="navbar-brand d-flex align-items-center gap-2 fw-bold fs-4 text-white" href="{{ url('/') }}">
            <span class="d-inline-block position-relative overflow-hidden rounded-circle bg-white"
                style="width: 44px; height: 44px;">
                <img src="{{ asset('logo.png') }}" alt="Logo de Florae" class="position-absolute"
                    style="width: 130px; max-width: none; top: -20px; left: -43px;">
            </span>
            <span>Florae</span>
        </a>


        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav nav-underline navbar-dark ms-auto mb-2 mb-lg-0 gap-1">

                <li class="nav-item rounded overflow-hidden">
                    <a class="nav-link text-white px-3 py-2 {{ request()->is('garden*') ? 'active' : '' }}"
                        href="{{ route('garden.index') }}">Jardines</a>
                </li>

                <li class="nav-item rounded overflow-hidden">
                    <a class="nav-link text-white px-3 py-2 {{ request()->is('imageplant*') ? 'active' : '' }}"
                        href="{{ route('imageplant.index') }}">Imágenes de plantas</a>
                </li>

                <li class="nav-item rounded overflow-hidden">
                    <a class="nav-link text-white px-3 py-2 {{ request()->is('imageplague*') ? 'active' : '' }}"
                        href="{{ route('imageplague.index') }}">Imágenes de plagas</a>
                </li>

                <li class="nav-item rounded overflow-hidden">
                    <a class="nav-link text-white px-3 py-2 {{ request()->is('symptom*') ? 'active' : '' }}"
                        href="{{ route('symptom.index') }}">Síntomas</a>
                </li>

                <li class="nav-item rounded overflow-hidden">
                    <a class="nav-link text-white px-3 py-2 {{ request()->is('medicine*') ? 'active' : '' }}"
                        href="{{ route('medicine.index') }}">Medicinas</a>
                </li>

                <li class="nav-item rounded overflow-hidden">
                    <a class="nav-link text-white px-3 py-2 {{ request()->is('treatment*') ? 'active' : '' }}"
                        href="{{ route('treatment.index') }}">Tratamientos</a>
                </li>

                <li class="nav-item rounded overflow-hidden">
                    <a class="nav-link text-white px-3 py-2 {{ request()->is('plant*') ? 'active' : '' }}"
                        href="{{ route('plant.index') }}">Plantas</a>
                </li>

                <li class="nav-item rounded overflow-hidden">
                    <a class="nav-link text-white px-3 py-2 {{ request()->is('plantcare*') ? 'active' : '' }}"
                        href="{{ route('plantcare.index') }}">Cuidados de plantas</a>
                </li>

                <li class="nav-item rounded overflow-hidden">
                    <a class="nav-link text-white px-3 py-2 {{ request()->is('carerecord*') ? 'active' : '' }}"
                        href="{{ route('carerecord.index') }}">Registros de cuidado</a>
                </li>

                <li class="nav-item rounded overflow-hidden">
                    <a class="nav-link text-white px-3 py-2 {{ request()->is('recommendation*') ? 'active' : '' }}"
                        href="{{ route('recommendation.index') }}">Recomendaciones</a>
                </li>

                <li class="nav-item rounded overflow-hidden">
                    <a class="nav-link text-white px-3 py-2 {{ request()->is('warning*') ? 'active' : '' }}"
                        href="{{ route('warning.index') }}">Advertencias</a>
                </li>

                <li class="nav-item rounded overflow-hidden">
                    <a class="nav-link text-white px-3 py-2 {{ request()->is('medicationtreatment*') ? 'active' : '' }}"
                        href="{{ route('medicationtreatment.index') }}">Medicamentos de tratamientos</a>
                </li>

                <li class="nav-item rounded overflow-hidden">
                    <a class="nav-link text-white px-3 py-2 {{ request()->is('procedure*') ? 'active' : '' }}"
                        href="{{ route('procedure.index') }}">Procedimientos</a>
                </li>

                <li class="nav-item rounded overflow-hidden">
                    <a class="nav-link text-white px-3 py-2 {{ request()->is('activityhistorie*') ? 'active' : '' }}"
                        href="{{ route('activityhistorie.index') }}">Historial de actividades</a>
                </li>

                <li class="nav-item rounded overflow-hidden">
                    <a class="nav-link text-white px-3 py-2 {{ request()->is('gardenplant*') ? 'active' : '' }}"
                        href="{{ route('gardenplant.index') }}">Plantas de jardines</a>
                </li>

                <li class="nav-item rounded overflow-hidden">
                    <a class="nav-link text-white px-3 py-2 {{ request()->is('plague*') ? 'active' : '' }}"
                        href="{{ route('plague.index') }}">Plagas</a>
                </li>

                <li class="nav-item rounded overflow-hidden">
                    <a class="nav-link text-white px-3 py-2 {{ request()->is('pestplant*') ? 'active' : '' }}"
                        href="{{ route('pestplant.index') }}">Plagas de plantas</a>
                </li>

                <li class="nav-item rounded overflow-hidden">
                    <a class="nav-link text-white px-3 py-2 {{ request()->is('plaguesymptom*') ? 'active' : '' }}"
                        href="{{ route('plaguesymptom.index') }}">Síntomas de plagas</a>
                </li>

                <li class="nav-item rounded overflow-hidden">
                    <a class="nav-link text-white px-3 py-2 {{ request()->is('user*') ? 'active' : '' }}"
                        href="{{ route('user.index') }}">Usuarios</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
