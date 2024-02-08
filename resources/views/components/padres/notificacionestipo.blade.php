@extends('app')
<<<<<<< HEAD
=======

@include('components/alertas')

>>>>>>> 9a0bbc6b4bbeb2aa9b3850babca916cd629e7bbe
@include('components/encabezado')

@section('notificaciones')

@if (count($notificaciones) > 0)
<div class="container-fluid">
<<<<<<< HEAD
    @foreach($notificaciones as $not) 
    <div data-bs-toggle="modal" onclick="ver({{$not->Id}});" data-bs-target="#ver">
        <div class="mensaje">
            <div class="tipomensaje" align="center">
                <i class="fas {{$not->iconotipo}} fa-2x" aria-hidden="true" style="color: #{{$not->colortipo}};"></i>
                <br>
                <div class="tipomensaje-texto">{{$not->nombretipo}}</div>
            </div>
            <div class="foto-box">
                <div class="foto">
                    <img src="{{asset('img/perfil'.$not->perfilEmisor.'.png')}}" class="img-foto" alt="User" />
                </div>
            </div>
            <div class="contenido">
                <div class="titulo">{{$not->Motivo}}
                    @if($not->Leida == 0) 
                    <span id="noleido" style="color: #2222ff"><i class="fas fa-message" aria-hidden="true"></i></span>
=======
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
>>>>>>> 9a0bbc6b4bbeb2aa9b3850babca916cd629e7bbe
                    @else
                    <span style="color: #28A745"><i class="fas fa-check" aria-hidden="true"></i><i class="fas fa-check" aria-hidden="true"></i></span>
                    @endif
                </div>
<<<<<<< HEAD
                <div class="emisor">{{$not->nombre_emisor}}</div>
                <div class="fecha-hora">
                    <i class="fas fa-calendar" aria-hidden="true"></i> {{$not->Fecha}} 
                    <i class="fa fa-clock-o" aria-hidden="true"></i> {{$not->Hora}}            
                </div>
            </div>
            <div class="icons-section">
                @if(!is_null($not->Link))
                <span class="attachment-icon"><i class="fas fa-link"></i></span>
                @endif
                @if(!is_null($not->Adjunto))
                <span class="link-icon"><i class="fas fa-paperclip ml-2"></i></span>
                @endif
            </div>                
        </div>   
    </div>
    @endforeach            
    <div class="modal fade ps-child" id="ver" tabindex="-1" role="dialog" aria-labelledby="ver" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" >
=======
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
>>>>>>> 9a0bbc6b4bbeb2aa9b3850babca916cd629e7bbe
            <div id="vermensaje"></div>
        </div>
    </div>
</div>
@endif
<<<<<<< HEAD
<div class="row" style="padding: 5px;">
    <div class="col-12" align="right">
        <a href="javascript:history.back(-1);" class="btn btn-info btn-sm text-white">Volver</a>
    </div>
</div>
<script type="text/javascript">
function ver(id){
  $("#vermensaje").load("{{ url('vermensajecompleto')}}/"+id);
}
</script>
@endsection

=======
<div class="w-100 px-4 bg-red-400" align="right">
    <a href="javascript:history.back(-1);" class="btn btn-info btn-sm text-white">Volver</a>
</div>
<script type="text/javascript">
        function ver(id) {
            $("#noleido" + id).html('<span style="color: #28A745"><i class="fas fa-check" aria-hidden="true"></i><i class="fas fa-check" aria-hidden="true"></i></span>');
            $("#vermensaje").load("{{ url('vermensajecompleto') }}/" + id);
        }
    </script>
@endsection
>>>>>>> 9a0bbc6b4bbeb2aa9b3850babca916cd629e7bbe
