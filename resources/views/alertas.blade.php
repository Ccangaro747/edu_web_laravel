@section ('alertas')

<div class="alert alert-primary d-flex justify-content-between align-items-center p-3 m-0" role="alert">
    <div class="d-flex align-items-center gap-3">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"
            class="text-white">
            <path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9" />
            <path d="M10.3 21a1.94 1.94 0 0 0 3.4 0" />
        </svg>
        <p class="text-white">Aquí van los mensajes importantes</p>
    </div>
    <button class="btn btn-link text-white">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"
            class="h-4 w-4">
            <path d="M18 6 6 18" />
            <path d="m6 6 12 12" />
        </svg>
    </button>
</div>
@section('script')
    <script>
        const alerta = document.querySelector('.alert');
        const boton = document.querySelector('.btn-link');
        boton.addEventListener('click', () => {
            alerta.classList.toggle('d-none');
        });
    </script>
@stop
@endsection
