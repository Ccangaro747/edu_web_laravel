@extends('app')

@include('components/alertas')

@include('components/encabezado')

@include('components/notificaciones')

@section('contenido')
<!-- Sección de Contenido Principal -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h2 class="titulos">{{$materias->first()->curso}}</h2>
        </div>
    </div>
</div>
<div class="container-fluid my-2">
    <div class="row py-2 d-flex align-items-stretch">
        @foreach ($materias as $mat)
        <div class="col-lg-3 col-6 d-flex my-2">
            <a href="{{ url('materia', ['materia' => $mat->materia, 'idmateria' => $mat->idmateria])}}" class="col box-componentes" style="background-color: #{{$mat->color}};">
                <div class="d-flex flex-column align-items-center gap-2">
                    <span class="box-componentes-icon"><i class="fas {{$mat->icono}} fa-2x"></i></span>
                    <h4 style="text-align: center;">{{$mat->materia}}</h4>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function() {
        $('.navbar-toggler').on('click', function() {
            if ($('#navbarNav').hasClass('show')) {
                $('#navbarItems').removeClass('text-right');
            } else {
                $('#navbarItems').addClass('text-right');
            }
        });
    });
</script>
@endsection