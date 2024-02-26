<div class="container-fluid">
  <div class="row min-vh-100 justify-content-start align-items-start gap-4 p-4 lg:justify-content-center lg:align-items-center lg:gap-8 lg:p-10">
    <div class="col-12 d-flex justify-content-start align-items-center gap-4">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8">
        <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z" />
        <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z" />
      </svg>
      <div class="d-flex flex-column gap-2 text-2xl font-semibold">
        <span class="text-2xl font-bold">Tareas</span>
        <span class="badge bg-secondary">4</span>
      </div>
      <button class="btn btn-sm btn-primary">Nueva Tarea</button>
      <button class="btn btn-sm btn-outline-primary">Completadas</button>
    </div>
    <div class="col-12">
      <div class="card">
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table border-collapse text-sm">
              <thead>
                <tr class="border-t">
                  <th class="text-left px-4 py-2">Tarea</th>
                  <th class="d-none d-md-table-cell px-4 py-2">Descripción</th>
                  <th class="d-none d-md-table-cell px-4 py-2">Vencimiento</th>
                  <th class="d-none d-md-table-cell px-4 py-2">Estado</th>
                  <th class="d-none d-md-table-cell px-4 py-2">Acciones</th>
                </tr>
              </thead>
              <tbody>
                <tr class="border-t">
                  <td class="border-t">
                    <div class="d-flex justify-content-start align-items-center gap-4 py-3 px-4">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6">
                        <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z" />
                        <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z" />
                      </svg>
                      <a href="#" class="font-medium text-decoration-none">Leer Capítulo 5</a>
                    </div>
                  </td>
                  <td class="d-none d-md-table-cell border-t">
                    Leer Capítulo 5: La Historia de Internet y la Web
                  </td>
                  <td class="d-none d-md-table-cell border-t">2023-08-25 23:59</td>
                  <td class="d-none d-md-table-cell border-t">
                    <span class="badge bg-primary">Pendiente</span>
                  </td>
                  <td class="d-none d-md-table-cell border-t">
                    <button class="btn btn-sm btn-outline-primary rounded-circle" aria-label="Marcar como completada">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4">
                        <polyline points="20 6 9 17 4 12" />
                      </svg>
                    </button>
                  </td>
                </tr>

                <!-- Acá van más tareas -->
                
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
