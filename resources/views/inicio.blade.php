@extends('app')

@include('components/alertas')

@include('components/encabezado')

@include('components/materias')

@section('contenido')
<!-- Sección de Contenido Principal -->
<div class="d-flex flex-column p-3 w-100">
    <div class="d-flex justify-content-start gap-3 border-bottom align-items-center p-2">
        <div>
            <div class="avatar">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-school" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M22 9l-10 -4l-10 4l10 4l10 -4v6" />
                    <path d="M6 10.6v5.4a6 3 0 0 0 12 0v-5.4" />
                </svg>
            </div>
        </div>

        <div class="d-flex flex-column">
            <h6>ID (Tipo)</h6>
            <p class="text-muted" style="margin-top: 10px;">
                Mensaje general o mensaje importante.
            </p>
        </div>
    </div>

    <div class="d-flex align-items-center gap-3 border-bottom  align-items-center p-2">
        <div>
            <div class="avatar">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                    <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                </svg>
            </div>
        </div>

        <div class="d-flex flex-column">
            <h6>ID Profesor</h6>
            <p class="text-muted" style="margin-top: 10px;">
                Mensaje general o mensaje importante.
            </p>
        </div>
    </div>

    <div class="d-flex align-items-center gap-3 border-bottom align-items-center p-2">
        <div>
            <div class="avatar">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                    <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                </svg>
            </div>
        </div>

        <div class="d-flex flex-column">
            <h6>ID Profesor</h6>
            <p class="text-muted" style="margin-top: 10px;">
                Mensaje general o mensaje importante.
            </p>
        </div>
    </div>
</div>



@endsection