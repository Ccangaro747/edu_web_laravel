@extends('app')

@include('components/alertas')

@include('components/encabezado')

@include('components/notificaciones')

@section('contenido')
<!-- Sección de Contenido Principal -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h2 class="titulos">Directivo de: <small>{{$escuela->escuela}}</small></h2>
        </div>
    </div>    
</div>    
@if (count($notificaciones) > 0)
<div class="container-fluid">
    <div class="row py-2 d-flex align-items-stretch">
        @foreach ($notificaciones as $not)
        <div class="col-lg-3 col-6 d-flex my-2">
            <a href="{{ url('notificacionesdocentestipo', ['tipo' => $not->id]) }}" class="col box-componentes" style="background-color: #{{ $not->color }};">
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
@else
    <p>No existen notificaciones para su perfil.</p>
@endif    
</div>    
@endsection

