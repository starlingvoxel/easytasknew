<div class="datatables">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Inventario</h4>
            <div>
                <br />
                <div align="right">
                    <button type="button" id="add_button"
                        class="btn me-1 mb-1 bg-primary-subtle text-primary px-4 fs-4 " data-bs-toggle="modal"
                        data-target="#modalAgregarProducto" data-bs-target="#modalAgregarProducto">
                        Agregar
                    </button>
                </div>
                <table class="tablas table table-striped table-bordered text-nowrap align-middle tablaProductos">

                    <thead>

                        <tr>

                            <th style="width:10px">#</th>
                            <th>Imagen</th>
                            <th>Código</th>
                            <th>Descripción</th>
                            <th>Categoría</th>
                            <th>Stock</th>
                            <th>Precio de compra</th>
                            <th>Precio de venta</th>
                            <th>Agregado</th>
                            <th>Acciones</th>

                        </tr>

                    </thead>

                </table>

                <input type="hidden" value="<?php echo $_SESSION['tipo_usuario']; ?>" id="perfilOculto">

            </div>

        </div>
    </div>



    <!--=====================================
MODAL AGREGAR PRODUCTO
======================================-->

    <div id="modalAgregarProducto" class="modal fade" role="dialog">

        <div class="modal-dialog">

            <div class="modal-content">

                <form role="form" method="post" enctype="multipart/form-data">

                    <!--=====================================
  CABEZA DEL MODAL
  ======================================-->

                    <div class="modal-header" style="background:#5e72e4; color:white">

                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                        <h4 class="modal-title">Agregar producto</h4>

                    </div>

                    <!--=====================================
  CUERPO DEL MODAL
  ======================================-->

                    <div class="modal-body">

                        <div class="box-body">


                            <!-- ENTRADA PARA SELECCIONAR CATEGORÍA -->

                            <div class="form-group">

                                <div class="input-group">

                                    <span class="input-group-addon"><i class="fa fa-th"></i></span>

                                    <select class="form-control input-lg" id="nuevaCategoria" name="nuevaCategoria"
                                        required>

                                        <option value="">Selecionar categoría</option>

                                        <?php

                                        $item = null;
                                        $valor = null;


                                        echo '<option value="' . $value["id"] . '">' . $value["categoria"] . '</option>';


                                        ?>

                                    </select>

                                </div>

                            </div>

                            <!-- ENTRADA PARA EL CÓDIGO -->

                            <div class="form-group">

                                <div class="input-group">

                                    <span class="input-group-addon"><i class="fa fa-code"></i></span>

                                    <input type="text" class="form-control input-lg" id="nuevoCodigo" name="nuevoCodigo"
                                        placeholder="Ingresar código" required>

                                </div>

                            </div>

                            <!-- ENTRADA PARA LA DESCRIPCIÓN -->

                            <div class="form-group">

                                <div class="input-group">

                                    <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>

                                    <input type="text" class="form-control input-lg" name="nuevaDescripcion"
                                        placeholder="Ingresar descripción" required>

                                </div>

                            </div>

                            <!-- ENTRADA PARA STOCK -->

                            <div class="form-group">

                                <div class="input-group">

                                    <span class="input-group-addon"><i class="fa fa-check"></i></span>

                                    <input type="number" class="form-control input-lg" name="nuevoStock" min="0"
                                        placeholder="Stock" required>

                                </div>

                            </div>

                            <!-- ENTRADA PARA PRECIO COMPRA -->

                            <div class="form-group row">

                                <div class="col-xs-6">

                                    <div class="input-group">

                                        <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span>

                                        <input type="number" class="form-control input-lg" id="nuevoPrecioCompra"
                                            name="nuevoPrecioCompra" step="any" min="0" placeholder="Precio de compra"
                                            required>

                                    </div>

                                </div>

                                <!-- ENTRADA PARA PRECIO VENTA -->

                                <div class="col-xs-6">

                                    <div class="input-group">

                                        <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span>

                                        <input type="number" class="form-control input-lg" id="nuevoPrecioVenta"
                                            name="nuevoPrecioVenta" step="any" min="0" placeholder="Precio de venta"
                                            required>

                                    </div>

                                    <br>

                                    <!-- CHECKBOX PARA PORCENTAJE -->

                                    <div class="col-xs-12 col-sm-6">

                                        <div class="form-group">

                                            <label>

                                                <input type="checkbox" class="minimal porcentaje" checked>
                                                Utilizar procentaje
                                            </label>

                                        </div>

                                    </div>

                                    <!-- ENTRADA PARA PORCENTAJE -->

                                    <div class="col-xs-12 col-sm-6" style="padding:0">

                                        <div class="input-group">

                                            <input type="number" class="form-control input-lg nuevoPorcentaje" min="0"
                                                value="40" required>

                                            <span class="input-group-addon"><i class="fa fa-percent"></i></span>

                                        </div>

                                    </div>


                                </div>
                                <div class="col-xs-12 col-sm-6">

                                    <div class="form-group">

                                        <label>

                                            <input type="checkbox" class="minimal" checked>
                                            Facturar sin existencia
                                        </label>

                                    </div>

                                </div>

                            </div>

                            <!-- ENTRADA PARA SUBIR FOTO -->

                            <div class="form-group">

                                <div class="panel">SUBIR IMAGEN</div>

                                <input type="file" class="nuevaImagen" name="nuevaImagen">

                                <p class="help-block">Peso máximo de la imagen 2MB</p>

                                <img src="vistas/img/productos/default/anonymous.png"
                                    class="img-thumbnail previsualizar" width="100px">

                            </div>

                        </div>

                    </div>

                    <!--=====================================
  PIE DEL MODAL
  ======================================-->

                    <div class="modal-footer">

                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                        <button type="submit" class="btn btn-primary">Guardar producto</button>

                    </div>

                </form>

                <?php

                $crearProducto = new ControladorProductos();
                $crearProducto->ctrCrearProducto();

                ?>

            </div>

        </div>

    </div>

    <!--=====================================
MODAL EDITAR PRODUCTO
======================================-->

    <div id="modalEditarProducto" class="modal fade" role="dialog">

        <div class="modal-dialog">

            <div class="modal-content">

                <form role="form" method="post" enctype="multipart/form-data">

                    <!--=====================================
  CABEZA DEL MODAL
  ======================================-->

                    <div class="modal-header" style="background:#3c8dbc; color:white">

                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                        <h4 class="modal-title">Editar producto</h4>

                    </div>

                    <!--=====================================
  CUERPO DEL MODAL
  ======================================-->

                    <div class="modal-body">

                        <div class="box-body">


                            <!-- ENTRADA PARA SELECCIONAR CATEGORÍA -->

                            <div class="form-group">

                                <div class="input-group">

                                    <span class="input-group-addon"><i class="fa fa-th"></i></span>

                                    <select class="form-control input-lg" name="editarCategoria" readonly required>

                                        <option id="editarCategoria"></option>

                                    </select>

                                </div>

                            </div>

                            <!-- ENTRADA PARA EL CÓDIGO -->

                            <div class="form-group">

                                <div class="input-group">

                                    <span class="input-group-addon"><i class="fa fa-code"></i></span>

                                    <input type="text" class="form-control input-lg" id="editarCodigo"
                                        name="editarCodigo" readonly required>

                                </div>

                            </div>

                            <!-- ENTRADA PARA LA DESCRIPCIÓN -->

                            <div class="form-group">

                                <div class="input-group">

                                    <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>

                                    <input type="text" class="form-control input-lg" id="editarDescripcion"
                                        name="editarDescripcion" required>

                                </div>

                            </div>

                            <!-- ENTRADA PARA STOCK -->


                            <div class="form-group">

                                <div class="input-group">

                                    <span class="input-group-addon"><i class="fa fa-check"></i></span>

                                    <input type="number" class="form-control input-lg" id="editarStock"
                                        name="editarStock" min="0" required>

                                </div>

                            </div>

                            <!-- ENTRADA PARA PRECIO COMPRA -->

                            <div class="form-group row">

                                <div class="col-xs-6">

                                    <div class="input-group">

                                        <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span>

                                        <input type="number" class="form-control input-lg" id="editarPrecioCompra"
                                            name="editarPrecioCompra" step="any" min="0" required>

                                    </div>

                                </div>

                                <!-- ENTRADA PARA PRECIO VENTA -->

                                <div class="col-xs-6">

                                    <div class="input-group">

                                        <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span>

                                        <input type="number" class="form-control input-lg" id="editarPrecioVenta"
                                            name="editarPrecioVenta" step="any" min="0" required>

                                    </div>

                                    <br>

                                    <!-- CHECKBOX PARA PORCENTAJE -->

                                    <div class="col-xs-6">

                                        <div class="form-group">

                                            <label>

                                                <input type="checkbox" class="minimal porcentaje" checked>
                                                Utilizar procentaje
                                            </label>

                                        </div>

                                    </div>

                                    <!-- ENTRADA PARA PORCENTAJE -->

                                    <div class="col-xs-6" style="padding:0">

                                        <div class="input-group">

                                            <input type="number" class="form-control input-lg nuevoPorcentaje" min="0"
                                                value="40" required>

                                            <span class="input-group-addon"><i class="fa fa-percent"></i></span>

                                        </div>

                                    </div>

                                </div>

                            </div>

                            <!-- ENTRADA PARA SUBIR FOTO -->

                            <div class="form-group">

                                <div class="panel">SUBIR IMAGEN</div>

                                <input type="file" class="nuevaImagen" name="editarImagen">

                                <p class="help-block">Peso máximo de la imagen 2MB</p>

                                <img src="vistas/img/productos/default/anonymous.png"
                                    class="img-thumbnail previsualizar" width="100px">

                                <input type="hidden" name="imagenActual" id="imagenActual">

                            </div>

                        </div>

                    </div>

                    <!--=====================================
  PIE DEL MODAL
  ======================================-->

                    <div class="modal-footer">

                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                        <button type="submit" class="btn btn-primary">Guardar cambios</button>

                    </div>

                </form>

                <?php

                $editarProducto = new ControladorProductos();
                $editarProducto->ctrEditarProducto();

                ?>

            </div>

        </div>

    </div>

    <?php

    $eliminarProducto = new ControladorProductos();
    $eliminarProducto->ctrEliminarProducto();

    ?>