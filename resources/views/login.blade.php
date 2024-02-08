@extends('app')

@section('login')

<div class="container-fluid degrades">
    <div class="login-container">
        <div class="logo-container">
            <img src="{{asset('img/logo.png')}}" alt="Logo">
            <h5><b>EduComunica</b></h5>
            <p><b>El canal de comunicación para la comunidad educativa pública de Mercedes</b></p>
        </div>
        <form action="{{ url('control') }}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group mb-3">
                <label for="email">Correo electrónico</label>
                <input type="email" id="user" name="usuario" class="form-control" placeholder="Ingresá tu correo electrónico" />
            </div>
            <div class="form-group mb-3">
                <label for="password">Contraseña</label>
                <input type="password" class="form-control" id="password" name="clave" placeholder="Contraseña" required>
            </div>
            <div class="form-group form-check mb-3">
                <input type="checkbox" class="form-check-input" id="showPassword">
                <label class="form-check-label" for="showPassword">Mostrar contraseña</label>
            </div>
            <button type="submit" class="btn btn-primary">Iniciar sesión</button>
        </form>
    </div>
</div>
@endsection

@section('script')

<script>
    $(document).ready(function() {
        $('#showPassword').click(function() {
            if ($(this).is(':checked')) {
                $('#password').attr('type', 'text');
            } else {
                $('#password').attr('type', 'password');
            }
        });
    });
</script>

@stop