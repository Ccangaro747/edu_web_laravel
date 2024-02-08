@extends('app')

@include('components/alertas')

@include('components/encabezado')

@section('contenido')
<!-- Sección de Contenido Principal -->
<div class="container-fluid py-2">
    <div class="row">
        <div class="col-12">
            <h2 class="titulos">Materia: {{ $materia }} </h2>
        </div>
    </div>
</div>
<div class="container-fluid py-2">
<div class="row py-2 d-flex align-items-stretch">
        @foreach ($notificaciones as $not)
        <div class="col-lg-3 col-6 materia-container d-flex my-2">
            <a href="{{ url('notificacionesmateria', ['idmateria' => $idmateria, 'tipo' => $not->id])}}" class="col flex-column box-componentes text-white text-decoration-none d-flex align-items-center justify-content-center" style="background-color: #{{ $not->color }};">
                <div class="box-componentes-header">
                    <div class="box-componentes-icon"><i class="fas {{$not->icono}} fa-2x"></i></div>
                    <div class="box-componentes-titulo">{{ $not->cantidad }}</div>
                </div>
                <div class="box-componentes-footer">
                    {{ $not->nombre }}
                </div>
            </a>
        </div>
        @endforeach
    </div>
    <div class="row" style="padding: 5px;">
        <div class="col-12" align="right">
            <a href="javascript:history.back(-1);" class="btn btn-info btn-sm text-white">Volver</a>
        </div>
    </div>
</div>
@endsection