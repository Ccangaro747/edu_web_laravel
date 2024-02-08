
@extends('app') 

@section('contenido')
    <h1>Información de la Materia</h1>

    @if ($materiaInfo)
        <p>Nombre de la materia: {{ $materiaInfo->nombre }}</p>
        <p>Descripción: {{ $materiaInfo->descripcion }}</p>
    @else
        <p>Materia no encontrada</p>
    @endif
@endsection
