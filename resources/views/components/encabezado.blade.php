<?php
$perfil = DB::table('v_usuarios_perfiles')
  ->where('id', '=', session()->get('userAct.idperfil'))
  ->get()->first();
$tipo_perfil = ['', 'Directivo', 'Docente', 'Padre / Madre', 'Alumno'];
$nombre = Str::slug(session()->get('userAct.nombre'));
?>
@section('encabezado')
<header class="d-flex justify-content-between align-items-center p-2 w-100">
  <nav class="navbar navbar-expand-lg navbar-dark bg-info w-100 p-2" style="border-radius: 5px;">
    <div>
      <p style="color: white;">
        <a href="#" style="text-decoration: none; color: inherit; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#verperfil">
          <span style="font-weight: bold;">{{$tipo_perfil[$perfil->perfil]}}:</span> <b style="text-decoration: underline;">{{ session('userAct.nombre') }}</b>
        </a>
      </p>
    </div>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto" id="navbarItems">
        <li class="nav-item active">
          <a class="nav-link px-2" href="{{url('inicio',['nombre'=>$nombre,'idperfil'=>session('userAct.idperfil')])}}">
            <p style="color: white;">Inicio</p>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link px-2" href="{{url('cerrar')}}">
            <p style="color: white;">Salir</p>
          </a>
        </li>
      </ul>
    </div>
  </nav>
</header>
<div class="modal fade ps-child" id="verperfil" tabindex="-1" role="dialog" aria-labelledby="ver" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        <h4 class="modal-title titulos">Perfil de {{ session('userAct.nombre') }}</h4>
      </div>
      <div class="modal-body">
        <center>
          <img src="{{asset('img/perfil'.$perfil->perfil.'.png')}}" class="img-roundex" width="60">
        </center>
        <h4 align="center" class="titulos">Datos Personales:</h4>
        <ul class="list-group list-group-horizontal">
          <li class="list-group-item w-50">
            <p>D.N.I.:</p>
          </li>
          <li class="list-group-item w-100">
            <p><b>{{$perfil->dni}}</b></p>
          </li>
        </ul>
        <ul class="list-group list-group-horizontal">
          <li class="list-group-item w-50">
            <p>Domicilio:</p>
          </li>
          <li class="list-group-item w-100">
            <p><b>{{$perfil->domicilio}}</b></p>
          </li>
        </ul>
        <ul class="list-group list-group-horizontal">
          <li class="list-group-item w-50">
            <p>Teléfono:</p>
          </li>
          <li class="list-group-item w-100">
            <p><b>{{$perfil->telefono}}</b></p>
          </li>
        </ul>
        <ul class="list-group list-group-horizontal">
          <li class="list-group-item w-50">
            <p>E-mail:</p>
          </li>
          <li class="list-group-item w-100">
            <p><b>{{$perfil->email}}</b></p>
          </li>
        </ul>
        <h4 align="center" class="titulos">Datos asociados al rol:</h4>
        <ul class="list-group list-group-horizontal">
          <li class="list-group-item w-50">
            <p>Rol:</p>
          </li>
          <li class="list-group-item w-100">
            <p><b>{{$tipo_perfil[$perfil->perfil]}}</b></p>
          </li>
        </ul>
        <ul class="list-group list-group-horizontal">
          <li class="list-group-item w-50">
            <p>Escuela:</p>
          </li>
          <li class="list-group-item w-100">
            <p><b>{{$perfil->escuela}}</b></p>
          </li>
        </ul>
        @if(!is_null($perfil->alumno))
        <ul class="list-group list-group-horizontal">
          <li class="list-group-item w-50">
            <p>Padre de:</p>
          </li>
          <li class="list-group-item w-100">
            <p><b>{{$perfil->alumno}}</b></p>
          </li>
        </ul>
        @endif
        @if(!is_null($perfil->curso))
        <ul class="list-group list-group-horizontal">
          <li class="list-group-item w-50">
            <p>Curso:</p>
          </li>
          <li class="list-group-item w-100">
            <p><b>{{$perfil->curso}}</b></p>
          </li>
        </ul>
        @endif
        @if(!is_null($perfil->materia))
        <ul class="list-group list-group-horizontal">
          <li class="list-group-item w-50">
            <p>Materia:</p>
          </li>
          <li class="list-group-item w-100">
            <p><b>{{$perfil->materia}}</b></p>
          </li>
        </ul>
        @endif
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
@endsection