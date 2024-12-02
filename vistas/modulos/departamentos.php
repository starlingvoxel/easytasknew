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
            <h4 class="card-title">Administrador de Departamentos</h4>

            <div>
                <br />
                <div align="right">
                    <button type="button" id="add_button"
                        class="btn me-1 mb-1 bg-primary-subtle text-primary px-4 fs-4 " data-bs-toggle="modal"
                        data-target="#modal_departamento" data-bs-target="#modal_departamento">
                        Agregar
                    </button>

                </div>

                <div class="table-responsive">
                    <table id="lang_opt" class="tablas table table-striped table-bordered text-nowrap align-middle">
                        <thead>
                            <!-- start row -->
                            <tr>
                                <th>#</th>
                                <th>Departamentos</th>
                                <th>Acciones</th>

                            </tr>
                            <!-- end row -->
                        </thead>
                        <tbody>
                            <!-- start row -->
                            <?php

                            $item = null;
                            $valor = null;

                            $departamentos = ControladorDepartamentos::ctrMostrarDepartamentos($item, $valor);

                            foreach ($departamentos as $key => $value) {

                                echo ' <tr>

                    <td>' . ($key + 1) . '</td>

                    <td class="text-uppercase">' . $value["descripcion"] . '</td>

                    <td>
    <div class="action-btn">
                         <button class="btn text-success waves-effect waves-light btnEditarDepartamento"  idDepartamento="' . $value["departamento_id"] . '" data-bs-toggle="modal"
                        data-target="#editarmodal_departamento" data-bs-target="#editarmodal_departamento"><iconify-icon icon="solar:pen-new-square-bold-duotone" width="25" height="25"></iconify-icon></button>
                        ';

                                if ($_SESSION["tipo_usuario"] == "Administrador1") {


                                    echo ' <button class="btn text-danger waves-effect waves-light btnEliminarDepartamento" type="button"  departamento_id="' . $value["departamento_id"] . '"><iconify-icon icon="solar:trash-bin-trash-line-duotone" width="25" height="25"></iconify-icon></button>';
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


<div id="modal_departamento" class="modal fade" tabindex="-1" aria-labelledby="modal_departamento" aria-hidden="true">

    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">

            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Agregar nuevo Departamento</h4>
                        <p class="card-subtitle mb-3">

                        </p>
                        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->
                        <form method="post">


                            <!-- ENTRADA PARA EL NOMBRE -->

                            <div class="mb-3 row">
                                <label for="example-text-input" class="form-label">Departamento</label>

                                <input type="text" class="form-control input-lg" name="nuevoDepartamento"
                                    required>

                            </div>

                    </div>



                    <!--=====================================
                        PIE DEL MODAL
                    ======================================-->


                    <div class="modal-footer">
                        <button type="button" class="btn bg-danger-subtle text-danger  waves-effect"
                            data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-success" data-bs-dismiss="modal">
                            Guardar
                        </button>

                    </div>

                    <?php

                    $crearDepartamento = new ControladorDepartamentos();
                    $crearDepartamento->ctrCrearDepartamento();

                    ?>

                    </form>
                    <!-- /.modal-dialog -->
                </div>
            </div>
        </div>
    </div>
</div>

<!--=====================================
                       EDITAR DEPARTAMENTO
                    ======================================-->

<div id="editarmodal_departamento" class="modal fade" tabindex="-1" aria-labelledby="editarmodal_departamento" aria-hidden="true">

    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">

            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Editar Departamento</h4>
                        <p class="card-subtitle mb-3">

                        </p>
                        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->
                        <form method="post">


                            <!-- ENTRADA PARA EL NOMBRE -->

                            <div class="mb-3 row">
                                <label for="example-text-input" class="form-label">Departamento</label>

                                <input type="text" class="form-control input-lg" id="editarDepartamento" name="editarDepartamento"
                                    required>

                            </div>

                    </div>

                    <input type="hidden" id="idDepartamento" name="idDepartamento">

                    <!--=====================================
                        PIE DEL MODAL
                    ======================================-->


                    <div class="modal-footer">
                        <button type="button" class="btn bg-danger-subtle text-danger  waves-effect"
                            data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-success" data-bs-dismiss="modal">
                            Guardar
                        </button>

                    </div>

                    <?php

                    $editarDepartamento = new ControladorDepartamentos();
                    $editarDepartamento->ctrEditardepartamento();

                    ?>

                    </form>
                    <!-- /.modal-dialog -->
                </div>
            </div>
        </div>
    </div>
</div>
<?php

$borrarDepartamento = new ControladorDepartamentos();
$borrarDepartamento->ctrBorrardepartamento();

?>