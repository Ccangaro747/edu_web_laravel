@extends('app')

@include('components.encabezado')

@section('contenido')
<div class="container-fluid d-flex flex-column mt-2 mb-4">
    <div class="row justify-content-center flex-grow-1">
        <div class="col-lg-8 col-md-10 d-flex flex-column bg-white border rounded">
            <h2 class="text-xl font-semibold text-gray-700 text-center py-4 border-bottom">RESPONDER MENSAJE</h2>
            <form method="POST" action="{{ url('guardar_respuesta') }}" id="form_responder" class="px-4">
                @csrf
                <input type="hidden" name="IdOriginal" value="{{ $not->Id }}">
                <input type="hidden" name="Tipo" value="{{ $not->Tipo }}">
                <input type="hidden" name="IdEmisor" value="{{ $not->IdReceptor }}">
                <input type="hidden" name="IdReceptor" value="{{ $not->IdEmisor }}">
                <input type="hidden" name="Permite_Rta" value="0">
                <input type="hidden" name="Respondido" value="0">
                <input type="hidden" name="Leida" value="0">
                <div class="p-4">
                    <div class="row mb-3">
                        <div class="col-lg-6 ">
                            <label for="message" class="block text-sm font-medium text-gray-700 my-2">
                                Motivo:
                            </label>
                            <input class="form-control bg-light" name="Motivo" required value="Rta. {{ $not->Motivo }}" readonly>
                        </div>
                        <div class="col-lg-6">
                            <label for="message" class="block text-sm font-medium text-gray-700 my-2">
                                Tipo de mensaje:
                            </label>
                            <input class="form-control bg-light" value="{{ $not->nombretipo }}" readonly>
                        </div>
                        <div class="col-lg-6">
                            <label for="message" class="block text-sm font-medium text-gray-700 my-2">
                                Emisor:
                            </label>
                            <input class="form-control bg-light" value="{{ $not->nombre_receptor }}" readonly>
                        </div>
                        <div class="col-lg-6">
                            <label for="message" class="block text-sm font-medium text-gray-700 my-2">
                                Receptor:
                            </label>
                            <input class="form-control bg-light" value="{{ $not->nombre_emisor }}" readonly>
                        </div>
                        <div class="col-lg-6">
                            <label for="message" class="block text-sm font-medium text-gray-700 my-2">
                                Fecha:
                            </label>
                            <input class="form-control bg-light" value="{{ $not->Fecha }}" readonly>
                        </div>
                        <div class="col-lg-6">
                            <label for="message" class="block text-sm font-medium text-gray-700 my-2">
                                Hora:
                            </label>
                            <input class="form-control bg-light" value="{{ $not->Hora }}" readonly>
                        </div>
                    </div>
                </div>
                <div class="p-4 border-top">
                    <div class="mb-3">
                        <label for="message" class="block text-sm font-medium text-gray-700 my-2">
                            Mensaje:
                        </label>
                        <textarea class="form-control bg-light" id="message" placeholder="Escribe tu mensaje aquí." rows="3" name="Texto" required></textarea>
                    </div>
                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{url('notificaciones_todas')}}" class="btn btn-primary">Volver</a>
                        <button class="btn btn-primary" type="submit">Enviar Respuesta</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection