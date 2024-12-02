<?php

if ($_SESSION["tipo_usuario"] == "Tecnico") {

  echo '<script>

    window.location = "inicio";

  </script>';

  return;
}

?>

<div class="card">
  <div class="card-body calender-sidebar app-calendar">
    <div id="calendar"></div>
  </div>
</div>


<!--modal agregar nueva tarea -->
<div id="modalAgregarEvento" class="modal fade" tabindex="-1" aria-labelledby="modalAgregarEvento" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-lg">
    <div class="modal-content">

      <div class="modal-body">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Agregar nuevo evento</h4>
            <p class="card-subtitle mb-3">

            </p>

            <form class="form" id="" method="post">

                    <!-- ENTRADA PARA SELECCIONAR EVENTO -->
                    <div class="mb-3 row">
                <label for="example-text-input" class="form-label">Evento</label>
                <div class="col-md-12">
                  <input class="form-control" type="text" name="nuevoEvento"
                    id="nuevoEvento" required>
                </div>
              </div>

              <!-- ENTRADA PARA SELECCIONAR LUGAR -->
              <div class="mb-3 row">
                <label for="example-text-input" class="form-label">Lugar</label>
                <div class="col-md-12">
                  <input class="form-control" type="text" name="nuevoLugar"
                    id="example-text-input nuevoLugar" required>
                </div>
              </div>

              <!-- ENTRADA PARA SELECCIONAR LUGAR -->
              <div class="mb-3 row">
                <label for="example-text-input" class="form-label">Solicitante</label>
                <div class="col-md-12">
                  <input class="form-control" type="text" name="nuevoSolicitante"
                    id=" nuevoSolicitante">
                </div>
              </div>

              <!-- ENTRADA PARA SELECCIONAR fechas -->
              <div class="mb-3 row">
                <label for="example-month-input2" class="form-label">Fecha</label>


               
                  <div class="input-group mb-3">
                    <input type="text" class="form-control datetime" id="dateime" placeholder="Selecciona la fecha y hora" required>
                    <span class="error-message text-danger" id="errorMessage" style="display: none;">Debes llenar la fecha y hora</span>
                    </span>
                  </div>
                  <input type="hidden" id="fechaInicio" name="fecha_inicio" required>
                  <input type="hidden" id="fechaFin" name="fecha_fin" required>

           

              </div>




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
          <button type="submit" class="btn bg-success text-bg-success" 0.2>
            Guardar Evento
          </button>
        </div>
        <?php
      $crearEvento = new ControladorEventos();
      $crearEvento->ctrCrearEventos();

        ?>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
</div>

<!--modal editar evento s -->
<div id="modalEditarEvento" class="modal fade" tabindex="-1" aria-labelledby="modalAgregarEvento" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-lg">
    <div class="modal-content">

      <div class="modal-body">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Editar evento</h4>
            <p class="card-subtitle mb-3">

            </p>

            <form class="form" method="post">

                    <!-- ENTRADA PARA SELECCIONAR EVENTO -->
                    <div class="mb-3 row">
                <label for="example-text-input" class="form-label">Evento</label>
                <div class="col-md-12">
                  <input class="form-control" type="text" id="editarEvento" name="editarEvento"
                    id=" nuevoEvento" required>
                </div>
              </div>

              <!-- ENTRADA PARA SELECCIONAR LUGAR -->
              <div class="mb-3 row">
                <label for="example-text-input" class="form-label">Lugar</label>
                <div class="col-md-12">
                  <input class="form-control" type="text" id="editarLugar"  name="editarLugar"
                    id="example-text-input nuevoLugar" required>
                </div>
              </div>

              <!-- ENTRADA PARA SELECCIONAR LUGAR -->
              <div class="mb-3 row">
                <label for="example-text-input" class="form-label">Solicitante</label>
                <div class="col-md-12">
                  <input class="form-control" type="text" id="editarSolicitante" name="editarSolicitante"
                    id=" nuevoSolicitante">
                </div>
              </div>

              <!-- ENTRADA PARA SELECCIONAR fechas -->
              <div class="mb-3 row">
                <label for="example-month-input2" class="form-label">Fecha</label>


               
                  <div class="input-group ">
                    <input type="text" class="form-control datetimeedit" id="editarFecha" placeholder="Selecciona la fecha y hora">

                    </span>
                  </div>
                  <input type="hidden" id="editarfechaInicio" name="editarfecha_inicio">
                  <input type="hidden" id="editarfechaFin" name="editarfecha_fin">

              </div>

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
                  <textarea class="form-control" rows="3" name="nuevaNota"
                    id="nuevaNota"></textarea>

                </div>
              </div>

              <div class="col-md-12">



              </div>
          </div>

        </div>
        <input type="hidden" id="idEvento" name="idEvento">
        <input type="hidden" id="idTarea" name="idTarea">
        <div class="modal-footer">
          <button type="button" class="btn bg-danger-subtle text-danger waves-effect" data-bs-dismiss="modal">
            Close
          </button>
          <button type="submit" class="btn bg-success text-bg-success" 0.2>
            Guardar 
          </button>
        </div>
        <?php

  
      $editarEvento = new ControladorEventos();
      $editarEvento->ctrEditarEvento();
        ?>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
</div>

