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
                <div align="right">
                    <button type="button" id="add_button"
                        class="btn me-1 mb-1 bg-primary-subtle text-primary px-4 fs-4 " data-bs-toggle="modal"
                        data-target="#modal_tarea" data-bs-target="#modal_tarea">
                        Agregar
                    </button>
                    <button type="button" id="add_button"
                        class="btn me-1 mb-1 bg-primary-subtle text-primary px-4 fs-4 "><a href="view-task/realtime-task.php" target="_blank" rel="noopener noreferrer">RealTime Tareas</a>

                    </button>

                </div>

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

                            $tareas = ControladorTareas::ctrMostrarTareasTecnicoMes($item, $valor);


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
                                } else if ($value["tipo_caso"] == 8) {
                                    echo 'EVENTO';
                                
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

<!--modal agregar nueva tarea -->
<div id="modal_tarea" class="modal fade" tabindex="-1" aria-labelledby="modal_tarea" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">

            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Agregar nueva tarea</h4>
                        <p class="card-subtitle mb-3">

                        </p>
                        <form class="form" method="post">

                            <!-- ENTRADA PARA SELECCIONAR TECNICO -->
                            <div class="mb-3 row">
                                <label for="example-month-input2" class="form-label">Departamento</label>


                                <div class="col-md-12">
                                    <select class="select2  form-control" multiple="multiple" name="nuevoDepartamento" required>


                                        <option>Selecciona un departamento</option>

                                        <?
                                        $item = null;
                                        $valor = null;

                                        $departamentoAdd = ControladorDepartamentos::ctrMostrarDepartamentos($item, $valor);

                                        foreach ($departamentoAdd as $key => $value) {
                                            echo '<option value="' . $value["departamento_id"] . '">' . $value["descripcion"] . '</option>';
                                        }

                                        ?>
                                    </select>

                                </div>

                            </div>

                            <!-- ENTRADA PARA SELECCIONAR TIPO DE CASO -->

                            <div class="mb-3 row">
                                <label for="example-month-input2" class="form-label">Tipo de caso </label>
                                <!-- ENTRADA PARA SELECCIONAR DEPARTAMENTO -->
                                <div class="col-md-12">
                                    <select class="form-select" id="nuevoTipoCaso" name="nuevoTipoCaso" required>
                                        <option selected="">Selecciona el tipo de caso</option>
                                        <option value="1">PC</option>
                                        <option value="2">IMPRESORA</option>
                                        <option value="3">INTERNET</option>
                                        <option value="7">WIFI</option>
                                        <option value="4">TELEFONO</option>
                                        <option value="5">SOFTWARE</option>
                                        <option value="8">EVENTO</option>
                                        <option value="6">OTROS</option>

                                    </select>
                                </div>
                            </div>
                            <!-- ENTRADA PARA SELECCIONAR DEPARTAMENTO -->
                            <div class="mb-3 row">
                                <label for="example-text-input" class="form-label">Descripcion</label>
                                <div class="col-md-12">
                                    <input class="form-control" type="text" name="nuevaDescripcion"
                                        id="example-text-input nuevaDescripcion" required>
                                </div>
                            </div>

                            <!-- ENTRADA PARA SELECCIONAR TECNICO -->
                            <div class="mb-3 row">
                                <label for="example-month-input2" class="form-label">Tecnico</label>


                                <div class="col-md-12">
                                    <select class="select2 form-control" multiple="multiple" name="nuevoTecnico[]" required>


                                        <option>Selecciona un tecnico</option>

                                        <?

                                        $usuarioAdd = ControladorUsuarios::ctrMostrarUsuariosTecnicos();

                                        foreach ($usuarioAdd as $key1 => $value1) {
                                            echo '<option value="' . $value1["id"] . '">' . $value1["nombre"] . '</option>';
                                        }

                                        ?>
                                    </select>

                                </div>

                            </div>

                            <div class="mb-3 row">
                                <label for="example-month-input2" class="form-label">Prioridad </label>
                                <!-- ENTRADA PARA SELECCIONAR DEPARTAMENTO -->
                                <div class="col-md-12">
                                    <select class="form-select" id="example-month-input2 nuevaPrioridad"
                                        name="nuevaPrioridad" required>
                                        <option value="1" selected="">Baja</option>
                                        <option value="2">Media</option>
                                        <option value="3">Alta</option>

                                    </select>
                                </div>

                            </div>
                             <!-- ENTRADA PARA SELECCIONAR NOTA -->
              <div class="mb-3 row">
                <label for="example-text-input" class="form-label">Nota</label>
                <div class="col-md-12">
                  <textarea class="form-control" rows="3" name="nuevaNota"
                    id="nuevaNota"></textarea>

                </div>
              </div>



                            <div class="col-md-12">



                            </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-danger-subtle text-danger waves-effect" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn bg-success text-bg-success" 0
                        .2>
                        Guardar tarea
                    </button>
                </div>
                <?php

                $guardarTarea = new ControladorTareas();
                $guardarTarea->ctrCrearTareas();

                ?>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</div>
<!--modal editar tarea -->
<div id="modalEditarTarea" class="modal fade" tabindex="-1" aria-labelledby="modalEditarTarea" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">

            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Editar tarea</h4>
                        <p class="card-subtitle mb-3">

                        </p>
                        <form class="form" method="post">
                            <div class="mb-3 row">
                                <label for="example-month-input2" class="form-label">Departamento</label>
                                <!-- ENTRADA PARA SELECCIONAR DEPARTAMENTO -->
                                <div class="col-md-12">
                                    <select class="form-select"
                                        name="editarDepartamento" required>
                                        <option id="editarDepartamento"></option>

                                        <?

                                        $item = null;
                                        $valor = null;

                                        $departamentoAdd = ControladorDepartamentos::ctrMostrarDepartamentos($item, $valor);


                                        foreach ($departamentoAdd as $key => $value) {
                                            echo '<option value="' . $value["departamento_id"] . '">' . $value["descripcion"] . '</option>';
                                        }

                                        ?>
                                    </select>
                                </div>

                            </div>

                            <!-- ENTRADA PARA SELECCIONAR DEPARTAMENTO -->
                            <div class="col-md-12">
                                <label for="example-month-input2" class="form-label">Tipo de caso </label>
                                <select class="form-select" id="editarTipocaso" name="editarTipocaso" required>

                                    <option value="1">PC</option>
                                    <option value="2">IMPRESORA</option>
                                    <option value="3">INTERNET</option>
                                    <option value="7">WIFI</option>
                                    <option value="4">TELEFONO</option>
                                    <option value="5">SOFTWARE</option>
                                    <option value="8">EVENTO</option>
                                    <option value="6">OTROS</option>

                                </select>
                            </div>

                            <!-- ENTRADA PARA SELECCIONAR DEPARTAMENTO -->
                            <div class="mb-3 row">
                                <label for="example-text-input" class="form-label">Descripcion</label>
                                <div class="col-md-12">
                                    <input class="form-control" type="text" name="editarDescripcion"
                                        id="editarDescripcion">
                                </div>
                            </div>

                            <!-- ENTRADA PARA SELECCIONAR TECNICO -->
                            <div class="mb-3 row">
                                <label for="example-month-input2" class="form-label">Tecnico</label>


                                <div class="col-md-12">
                                    <select class="select2 form-control" multiple="multiple" name="editarTecnico[]" id="editarTecnico">


                                        <option>Selecciona un tecnico</option>

                                        <?

                                        $usuarioAdd = ControladorUsuarios::ctrMostrarUsuariosTecnicos();

                                        foreach ($usuarioAdd as $key1 => $value1) {
                                            echo '<option value="' . $value1["id"] . '">' . $value1["nombre"] . '</option>';
                                        }

                                        ?>
                                    </select>

                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="example-month-input2" class="form-label">Prioridad </label>
                                <!-- ENTRADA PARA SELECCIONAR DEPARTAMENTO -->
                                <div class="col-md-12">
                                    <select class="form-select" id="editarPrioridad" name="editarPrioridad"
                                        required>
                                        <option value="1">Baja</option>
                                        <option value="2">Media</option>
                                        <option value="3">Alta</option>

                                    </select>
                                </div>

                            </div>
                            
                                             <!-- ENTRADA PARA SELECCIONAR NOTA -->
              <div class="mb-3 row">
                <label for="example-text-input" class="form-label">Nota</label>
                <div class="col-md-12">
                  <textarea class="form-control" rows="3" name="editarNota"
                    id="editarNota"></textarea>

                </div>
              </div>




                    </div>
                </div>

            </div>
            <input type="hidden" id="idTarea" name="idTarea">
            <div class="modal-footer">
                <button type="button" class="btn bg-danger-subtle text-danger  waves-effect"
                    data-bs-dismiss="modal">
                    Close
                </button>
                <button type="submit" class="btn bg-success text-white">
                    Guardar
                </button>
            </div>
            <?php

            $editarTarea = new ControladorTareas();
            $editarTarea->ctrEditartarea();

            ?>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<?php

//  $borrarTarea = new ControladorTareas();
//$borrarTarea->ctrBorrarTareas();

?>