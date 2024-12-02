<?php

if($_SESSION["tipo_usuario"] == "Tecnico"){

  echo '<script>

    window.location = "inicio";

  </script>';

  return;

}

?>
<div class="datatables">
    <!-- start Zero Configuration -->
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Administrador de tareas</h4>

            <div>
                <br />
              

                <div class="col-12 table-responsive">


                    <table id="lang_opt" class="tablas table table-striped table-bordered align-middle tablaTareas">
                        <thead>
                            <!-- start row -->
                            <tr>
                                <th style="width: 3%;"># </th>
                                <th style="width: 34%;">Descripcion</th>
                                <th style="width: 20%;">Técnico Asignado</th>
                                <th style="width: 12%;">Fecha </th>
                                <th style="width: 8%;">Prioridad</th>
                                <th style="width: 15%;">Estado</th>
                                <th style="width: 8%;">Acciones</th>

                            </tr>
                            <!-- end row -->
                        </thead>
                        <tbody>
                            <!-- start row -->
                            <?php

                            $item = null;
                            $valor = null;

                            $tareas = ControladorTareas::ctrMostrarTareasTecnico($item, $valor);


                            foreach ($tareas as $key => $value) {

                                $itemDepartamento = "departamento_id";
                                $valorDepartamento = $value["tarea_departamento_id"];

                                $respuestaDepartamentos = ControladorDepartamentos::ctrMostrarDepartamentos($itemDepartamento, $valorDepartamento);




                                echo ' <tr class="align-top">
                
                   <td>' . ($key + 1) . '</td>
              
                 <td class="text-uppercase" style="padding-left: 1.2rem">
                 <strong class="link-primary link-offset-2 ">' . $value["descripcion"] . '</strong>
                 <br><h5 class="text-dark font-weight-medium" style="margin-bottom: 0">' . $respuestaDepartamentos["descripcion"] . '</h5> 
                 ';

                                if ($value["tipo_caso"] == 1) {

                                    echo 'PC';
                                } else if ($value["tipo_caso"] == 2) {

                                    echo 'impresora';
                                } else if ($value["tipo_caso"] == 3) {
                                    echo 'internet';
                                } else if ($value["tipo_caso"] == 4) {
                                    echo 'telefono';
                                } else if ($value["tipo_caso"] == 5) {
                                    echo 'software';
                                } else if ($value["tipo_caso"] == 7) {
                                    echo 'WIFI';
                                } else {
                                    echo 'otros';
                                }
                                echo '<br><span class="text-muted fs-3">#TI-00' . $value["tarea_id"] . '</span>';
                                echo ' </td><td class="text-uppercase">' . $value["tecnicos_asignados"] . '</td>';
                                $fechaCompleta = $value["inicio"];

                                $dateTime = new DateTime($fechaCompleta);


                                $fecha = $dateTime->format('d-m-Y');

                                $hora = $dateTime->format('H:i');

                                echo '<td class="text-uppercase"><strong>' . $fecha . '</strong><br>a las ' . $hora . '</td>';
                                if ($value["prioridad"] == 3) {

                                    echo '<td class="text-uppercase text-center "><span class="badge bg-danger-subtle text-danger ">alta</span></td>';
                                } else if ($value["prioridad"] == 2) {

                                    echo '<td class="text-uppercase text-center "><span class="badge bg-warning-subtle text-warning ">media</span></td>';
                                } else {
                                    echo '<td class="text-uppercase text-center "><span class="badge bg-primary-subtle text-primary ">baja</span></td>';
                                }

                                echo '<td class="text-uppercase text-center ">
        <div class="dropdown justify-content-center align-items-center">
            <button id="btnGroupDrop' . $value["tarea_id"] . '" type="button" class="btn bg-' . ($value["estado"] == 0 ? 'dark text-white' : ($value["estado"] == 1 ? 'warning text-bg-warning' : ($value["estado"] == 2 ? 'success text-bg-success' : 'danger text-bg-danger '))) . ' dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                ' . ($value["estado"] == 0 ? 'Retenido' : ($value["estado"] == 1 ? 'En proceso' : ($value["estado"] == 2 ? 'Listo' : 'No iniciado'))) . '
            </button>
            <div class="dropdown-menu" aria-labelledby="btnGroupDrop' . $value["tarea_id"] . '">
                <a class="dropdown-item actualizarEstado" href="javascript:void(0)" data-id="' . $value["tarea_id"] . '" data-estado="0">Retenido</a>
                <a class="dropdown-item actualizarEstado" href="javascript:void(0)" data-id="' . $value["tarea_id"] . '" data-estado="1">En proceso</a>
                <a class="dropdown-item actualizarEstado" href="javascript:void(0)" data-id="' . $value["tarea_id"] . '" data-estado="2">Listo</a>
                <a class="dropdown-item actualizarEstado" href="javascript:void(0)" data-id="' . $value["tarea_id"] . '" data-estado="3">No iniciado</a>
            </div>
        </div>
      </td>
              
                    <td>
                
                      <div class="action-btn">
                 
                       <button  class="btn btn-md text-success btnEditarTarea" tarea_id="' . $value["tarea_id"] . '" data-bs-toggle="modal"
                        data-target="#modalEditarTarea" data-bs-target="#modalEditarTarea"><iconify-icon icon="solar:eye-bold-duotone" width="25" height="25"></iconify-icon></button>';

                                if ($_SESSION["tipo_usuario"] == "Administrador1") {

                                    echo ' <button  class="btn btn-md  text-danger   btnEliminartarea" type="button"  tarea_id="' . $value["tarea_id"] . '"><iconify-icon icon="solar:trash-bin-trash-line-duotone" width="25" height="25"></iconify-icon></button>';
                                }

                                echo '</div>  
                
                    </td>
                
                  </tr>';
                            }

                            ?>

                            <!-- end row -->

                    </table>
                </div>

            </div>
        </div>
    </div>

    <!-- end DOM Positioning -->

    <!-- end Alternative Pagination -->
</div>


