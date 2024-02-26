<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduLibros</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
        <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
            <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                <!-- Icono de documento -->
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1 0-5H20"/>
                </svg>
                <span class="fs-4">EduLibros</span>
            </a>
            <form class="w-100">
                <input class="form-control" type="search" placeholder="Search books..." aria-label="Search">
            </form>
            <button class="btn btn-outline-secondary rounded-circle ms-2" type="submit">
                <!-- Icono de búsqueda -->
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8"/>
                    <path d="m21 21-4.3-4.3"/>
                </svg>
            </button>
        </header>

        <main>
            <div class="row mb-4">
                <div class="col">
                    <h1 class="fw-bold fs-5">Librerías</h1>
                </div>
                <div class="col-auto">
                    <button class="btn btn-outline-secondary btn-sm">Limpiar filtros</button>
                </div>
            </div>
            
            <!-- Cards de documentos -->
            <div class="row row-cols-1 row-cols-md-2 g-4">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title fw-bold fs-6">PDF 1</h5>
                            <p class="card-text">Docente </p>
                            <button class="btn btn-outline-secondary btn-sm">Ver detalles</button>
                        </div>
                    </div>
                </div>
                <!-- Otros PDF -->
            </div>
        </main>
    </div>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
