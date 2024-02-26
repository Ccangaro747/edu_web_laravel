@extends('app')

@include('components/alertas')

@include('components/encabezado')

@section('contenido')
<div class="container-fluid">
    <div class="row">
        <h2 class="titulos">Mensajes emitidos</h2>
        @if (count($notificaciones) > 0)
        <div class="container-fluid">
            @foreach ($notificaciones as $not)
            <div data-bs-toggle="modal" onclick="ver({{ $not->Id }});" data-bs-target="#ver">
                <div class="mensaje">
                    <div class="tipomensaje" align="center">
                        <i class="fas {{ $not->iconotipo }} fa-2x" aria-hidden="true" style="color: #{{ $not->colortipo }};"></i>
                        <br>
                        <p>{{ $not->nombretipo }}</p>
                    </div>
                    <div class="foto-box">
                        <div class="foto">
                            <img src="{{ asset('img/perfil' . $not->perfilEmisor . '.png') }}" class="img-foto" alt="User" />
                        </div>
                    </div>
                    <div class="contenido">
                        <div class="titulo">{{ $not->Motivo }}
                            @if ($not->Leida == 0)
                            <span id="noleido{{ $not->Id }}">
                                <span style="color: #2222ff"><i class="fas fa-message" aria-hidden="true"></i></span>
                            </span>
                            @else
                            <span style="color: #28A745"><i class="fas fa-check" aria-hidden="true"></i><i class="fas fa-check" aria-hidden="true"></i></span>
                            @endif
                            @if ($not->Respondido)
                            <span class="link-icon">
                                <div class="badge bg-info" style="font-size: 8px">Respondido</div>
                            </span>
                            @endif
                        </div>
                        <div class="emisor">{{ $not->nombre_emisor }}</div>
                        <div class="fecha-hora">
                            <i class="fas fa-calendar" aria-hidden="true"></i> {{ $not->Fecha }}
                            <i class="fa fa-clock-o" aria-hidden="true"></i> {{ $not->Hora }}
                        </div>
                    </div>
                    <div class="icons-section">
                        @if (!is_null($not->Link))
                        <span class="attachment-icon"><i class="fas fa-link"></i></span>
                        @endif
                        @if (!is_null($not->Adjunto))
                        <span class="link-icon"><i class="fas fa-paperclip ml-2"></i></span>
                        @endif

                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        <div class="modal fade ps-child" id="ver" tabindex="-1" role="dialog" aria-labelledby="ver" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div id="vermensaje" class="p-3 d-flex flex-column gap-3"></div>
                </div>
            </div>
        </div>
        <div id="chat"></div>
        @else
        <p>No hay mensajes emitidos.</p>
        @endif
    </div>
    <div class="w-100 px-4 bg-red-400" align="right">
        <a href="javascript:history.back(-1);" class="btn btn-info btn-sm text-white mb">Volver</a>
    </div>
</div>
<script type="text/javascript">
    function ver(id) {
        $("#chat").load("{{ url('verchat') }}/" + id);
    }
</script>

<script type="text/javascript">
    function verchat(id) {
        $("#chat").load("{{ url('verchat') }}/" + id);
    }
</script>

<!-- Utilicé AJAX -->
<script type="text/javascript">
    function ver(id) {
        $.ajax({
            url: "{{ url('verchat') }}/" + id,
            type: "GET",
            success: function(response) {
                $("#vermensaje").html(response);
                $("#ver").modal("show");
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }
</script>

@endsection