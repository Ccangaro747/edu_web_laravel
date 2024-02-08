<?php
$alertas = DB::table('v_notificaciones')
    ->where('IdReceptor', '=', session()->get('userAct.idperfil'))
    ->where('Tipo', '=', 1)
    ->where('idmateria', '=', null)
    ->get(); 
    ?>
@section('alertas')
@if (count($alertas) > 0)
    <div class="alert alert-info d-flex justify-content-between align-items-center p-1 m-0 w-100" role="alert">
        <div class="d-flex align-items-center gap-2">
            <i class="fa fa-exclamation-circle" aria-hidden="true" style="color: #f22;"></i>
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <?php $i = 0; ?>
                    @foreach ($alertas as $alerta)
                        @if ($i == 0)
                        <div class="carousel-item active">
                        @else
                        <div class="carousel-item">
                        @endif
                            <p class="d-block w-100">{{ $alerta->Motivo }}</p>
                        </div>
                        <?php $i = $i + 1; ?>
                        @endforeach
                    </div>
                </div>
            </div>
            
            <button class="btn btn-link text-black">
                <i class="fa fa-times-circle-o" aria-hidden="true"></i>
            </button>
        </div>
    </div>
@endif
<script>
    const alerta = document.querySelector('.alert');
    const boton = document.querySelector('.btn-link');
    boton.addEventListener('click', () => {
        alerta.classList.toggle('d-none');
    });
</script>
@stop