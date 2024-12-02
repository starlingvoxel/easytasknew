<div class="datatables">
    <!-- start Zero Configuration -->
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Administrador de categorias</h4>

            <div>
                <br />
                <div align="right">
                    <button type="button" id="add_button"
                        class="btn me-1 mb-1 bg-primary-subtle text-primary px-4 fs-4 " data-bs-toggle="modal"
                        data-target="#userModal" data-bs-target="#modal_departamento">
                        Agregar
                    </button>

                </div>

                <div class="table-responsive">
                    <table id="lang_opt" class="tablas table table-striped table-bordered text-nowrap align-middle">
                        <thead>
                            <!-- start row -->
                            <tr>
                                <th>#</th>
                                <th>Categoria</th>
                                <th>Acciones</th>

                            </tr>
                            <!-- end row -->
                        </thead>
                        <tbody>
                            <!-- start row -->
                            <?php

                            $item = null;
                            $valor = null;

                            $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

                            foreach ($categorias as $key => $value) {

                                echo ' <tr>

                    <td>' . ($key + 1) . '</td>

                    <td class="text-uppercase">' . $value["categoria"] . '</td>

                    <td>
    <div class="action-btn">
                          
                        <button class="btn text-success waves-effect waves-light" idCategoria="' . $value["id"] . '" data-toggle="modal" data-target="#modalEditarCategoria"><iconify-icon icon="solar:pen-new-square-bold-duotone" width="25" height="25"></iconify-icon></button>';

                                if ($_SESSION["tipo_usuario"] == "Administrador") {


                                    echo ' <button class="btn text-danger waves-effect waves-light btnEliminarDepartamento" type="button"  departamento_id="' . $value["id"] . '"><iconify-icon icon="solar:trash-bin-trash-line-duotone" width="25" height="25"></iconify-icon></button>';
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
            <div class="modal-header d-flex align-items-center">
                <h4 class="modal-title" id="myModalLabel">
                    Agregar nuevo departamento
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!--=====================================
        CUERPO DEL MODAL
        ======================================-->
            <form method="post">
                <div class="modal-body">

                    <div class="box-body">

                        <!-- ENTRADA PARA EL NOMBRE -->

                        <div class="form-group">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                                <input type="text" class="form-control input-lg" name="nuevoDepartamento"
                                    placeholder="Ingresar categoría" required>

                            </div>

                        </div>

                    </div>

                </div>

                <!--=====================================
PIE DEL MODAL
======================================-->

                <div class="modal-footer">

                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                    <button type="submit" class="btn btn-primary">Guardar categoría</button>

                </div>

                <?php

                $crearDepartamento = new ControladorDepartamentos();
                $crearDepartamento->ctrCrearDepartamento();

                ?>

            </form>
            <!-- /.modal-dialog -->
        </div>

        <?php

        $borrarDepartamento = new ControladorDepartamentos();
        $borrarDepartamento->ctrBorrardepartamento();

        ?>