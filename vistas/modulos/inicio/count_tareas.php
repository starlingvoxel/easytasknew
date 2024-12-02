<?php
// Aquí deberías tener la lógica para ejecutar la consulta SQL
$tareasPorEstado = ControladorTareas::ctrContarTareasPorEstado(); // Esta función debería devolver los resultados de la consulta

// Inicializar variables para almacenar el conteo de cada estado
$listas = 0;
$enProceso = 0;
$noIniciadas = 0;
$retenidas = 0;
foreach ($tareasPorEstado as $tarea) {
    

    switch ($tarea["estatus"]) {
        case 2:
            $listas = $tarea["total_tareas"];
            break;
        case 1:
            $enProceso = $tarea["total_tareas"];
            break;
        case 3:
            $noIniciadas = $tarea["total_tareas"];
            break;
        case 0:
            $retenidas = $tarea["total_tareas"];
            break;
    }
}
// Asignar los valores del conteo según los estados

?>

<!-- Ahora en tu HTML puedes reemplazar los valores en cada tarjeta -->

<div class="col-lg-3 col-md-6">
    <div class="card text-bg-success text-white">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <iconify-icon icon="solar:check-read-line-duotone" width="45" height="45"></iconify-icon>
                <div class="ms-3">
                    <h4 class="card-title mb-0 text-white">Listas</h4>
                    <p class="text-white fs-4 mb-0 opacity-75"><?= $listas; ?> Tareas</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-3 col-md-6">
    <div class="card text-bg-warning text-white">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <iconify-icon icon="solar:clock-circle-line-duotone" width="45" height="45"></iconify-icon>
                <div class="ms-3">
                    <h4 class="card-title mb-0 text-white">En proceso</h4>
                    <p class="text-white fs-4 mb-0 opacity-75"><?= $enProceso; ?> Tareas</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-3 col-md-6">
    <div class="card text-bg-danger text-white">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <iconify-icon icon="solar:danger-line-duotone" width="45" height="45"></iconify-icon>
                <div class="ms-3">
                    <h4 class="card-title mb-0 text-white">No iniciadas</h4>
                    <p class="text-white fs-4 mb-0 opacity-75"><?= $noIniciadas; ?> Tareas</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-3 col-md-6">
    <div class="card text-bg-dark text-white">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <iconify-icon icon="solar:bill-cross-line-duotone" width="45" height="45"></iconify-icon>
                <div class="ms-3">
                    <h4 class="card-title mb-0 text-white">Retenidas</h4>
                    <p class="text-white fs-4 mb-0 opacity-75"><?= $retenidas; ?> Tareas</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Ahora en tu HTML puedes reemplazar los valores en cada tarjeta -->

