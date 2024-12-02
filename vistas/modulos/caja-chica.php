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
            <h4 class="card-title">Administrador de Caja chica</h4>
            <div class="card-header-action" align="right">

<div class="buttons">
<button type="button" id="add_button"
                        class="btn me-1 mb-1 bg-primary-subtle text-primary px-4 fs-4 " data-bs-toggle="modal"
                        data-target="#modal_tarea" data-bs-target="#modal_tarea">
                        Agregar
                    </button>
    <button type="button" class="btn btn-outline-primary" id="daterange-btn">

        <span>
       

            <?php

if(isset($_GET["fechaInicial"])){

 echo $_GET["fechaInicial"]." - ".$_GET["fechaFinal"];

}else{

 echo 'Rango de fecha';

}

?>
        </span>

        <iconify-icon icon="solar:alt-arrow-down-bold"></iconify-icon>

    </button>
</div>


</div>
            <div>


                <div class="col-12 table-responsive">


                    <table id="lang_opt" class="tablas table table-striped table-bordered align-middle tablaTareas">
                        <thead>
                            <!-- start row -->
                            <tr>
                               
                                <th style="width: 8%;">NO COMP</th>
                                <th style="width: 8%;">Fecha </th>
                                <th style="width: 15%;">Beneficiario</th>
                                <th style="width: 20%;">Concepto de pago</th>
                                <th style="width: 15%;">RNC/Cédula</th>
                                <th style="width: 10%;">NCC Válido</th>
                                <th style="width: 10%;">Total</th>
                                <th style="width: 8%;">Acciones</th>

                            </tr>
                            <!-- end row -->
                        </thead>
                        <tbody>
                            <!-- start row -->
                            <?php

$fechaInicio = new DateTime('first day of this month');

// Obtener la fecha de fin del mes actual (último día)
$fechaFin = new DateTime('last day of this month');
if(isset($_GET["fechaInicial"])){
    echo "entrofecha";
    $fechainicio = $_GET["fechaInicial"];
    $fechafin; $_GET["fechaFinal"];

   }else{
   
  // Convertir a formato de cadena (opcional)
$fechainicio = $fechaInicio->format('Y-m-d');
$fechafin = $fechaFin->format('Y-m-d');
   
   }



                            $item = null;
                            $valor = null;
                            echo $fechainicio;
                            $caja_chica = ControladorCaja::ctrRangoFechasCaja($fechainicio, $fechafin);


                           foreach ($caja_chica as $key => $value) {  
                          echo'  <td>' .$value["no_comp"] . '</td>
                          <td>' .$value["fecha"] . '</td>
                            <td>' .$value["beneficiario"] . '</td>
                              <td>' .$value["concepto_pago"] . '</td>
                                <td>' .$value["doc_fiscal"] . '</td>
                                  <td>' .$value["ncc_valido"] . '</td>
                                    <td>' .$value["impte_pago"] . '</td>
                           <td>editar</td>
                          ';
                           }?>

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