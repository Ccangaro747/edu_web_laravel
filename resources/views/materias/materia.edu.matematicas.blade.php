@section('content')

    <div class="container">
        <h1>Matemáticas</h1>
        
        <div class="row mt-4">
            <div class="col-sm-6">
                <div class="card">
                    <img src="{{ asset('ruta_de_la_imagen1.jpg') }}" class="card-img-top" alt="Imagen 1">
                    <div class="card-body">
                        <h5 class="card-title">Contenido 1</h5>
                        <p class="card-text">Descripción o información adicional sobre el contenido 1.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <img src="{{ asset('ruta_de_la_imagen2.jpg') }}" class="card-img-top" alt="Imagen 2">
                    <div class="card-body">
                        <h5 class="card-title">Contenido 2</h5>
                        <p class="card-text">Descripción o información adicional sobre el contenido 2.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
