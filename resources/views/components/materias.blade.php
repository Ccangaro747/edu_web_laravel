@section('materias')


<div class="row w-100 justify-content-center p-4">

    <div class="col-6 col-md-3 d-flex justify-content-center align-items-center square mb-3">
        <a href="{{ url('materia', ['materia' => 'Matematicas']) }}" class="text-decoration-none">
            <div class="d-flex flex-column align-items-center btn-math border rounded min-w-110 min-h-110">
                <button class="btn d-flex align-items-center justify-content-center col p-0 text-white btn-square">
                    <div class="d-flex flex-column align-items-center p-2 gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-square-root-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M13 12h1c1 0 1 1 2.016 3.527c.984 2.473 .984 3.473 1.984 3.473h1" />
                            <path d="M12 19c1.5 0 3 -2 4 -3.5s2.5 -3.5 4 -3.5" />
                            <path d="M3 12h1l3 8l3 -16h10" />
                        </svg>
                        <p class="m-0">Matemáticas</p>
                    </div>
                </button>
            </div>
        </a>
    </div>

    <div class="col-6 col-md-3 d-flex justify-content-center align-items-center square mb-3">
        <a href="{{ url('materia', ['materia' => 'Ciencia']) }}" class="text-decoration-none">
            <div class="d-flex flex-column align-items-center btn-sci border rounded min-w-110 min-h-110">
                <button class="btn d-flex align-items-center justify-content-center col p-0 text-white btn-square">
                    <div class="d-flex flex-column align-items-center p-2 gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-microscope" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M5 21h14" />
                            <path d="M6 18h2" />
                            <path d="M7 18v3" />
                            <path d="M9 11l3 3l6 -6l-3 -3z" />
                            <path d="M10.5 12.5l-1.5 1.5" />
                            <path d="M17 3l3 3" />
                            <path d="M12 21a6 6 0 0 0 3.715 -10.712" />
                        </svg>
                        <p class="m-0">Ciencia</p>
                    </div>
                </button>
            </div>
        </a>
    </div>

    <h2 class="text-center text-2xl font-bold mb-4">Primer Grado turno tarde</h2>
            <div class="row row-cols-1 row-cols-md-2 g-4">
                <div class="col">
                    <div class="card bg-purple text-white">
                        <div class="card-body text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-square-root-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M13 12h1c1 0 1 1 2.016 3.527c.984 2.473 .984 3.473 1.984 3.473h1" />
                            <path d="M12 19c1.5 0 3 -2 4 -3.5s2.5 -3.5 4 -3.5" />
                            <path d="M3 12h1l3 8l3 -16h10" />
                        </svg>
                        <p class="font-semibold">Historia</p>
                    </div>
                </button>
            </div>
        </a>
    </div>

    <div class="col-6 col-md-3 d-flex justify-content-center align-items-center square mb-3">
        <a href="{{ url('materia', ['materia' => 'Geografía']) }}" class="text-decoration-none">
            <div class="d-flex flex-column align-items-center btn-geo border rounded min-w-110 min-h-110">
                <button class="btn d-flex align-items-center justify-content-center col p-0 text-white btn-square">
                    <div class="d-flex flex-column align-items-center p-2 gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-world" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                            <path d="M3.6 9h16.8" />
                            <path d="M3.6 15h16.8" />
                            <path d="M11.5 3a17 17 0 0 0 0 18" />
                            <path d="M12.5 3a17 17 0 0 1 0 18" />
                        </svg>
                        <p class="m-0">Geografía</p>
                    </div>
                </button>
            </div>
        </a>
    </div>
</div>


@endsection