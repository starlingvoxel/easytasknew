<?php

if ($_SESSION["tipo_usuario"] == "Especial" || $_SESSION["perfil"] == "Vendedor") {

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
            <h4 class="card-title">Administrador de tecnicos</h4>

            <div>
                <br />
                <div align="right">
                    <button type="button" id="add_button"
                        class="btn me-1 mb-1 bg-primary-subtle text-primary px-4 fs-4 " data-bs-toggle="modal"
                        data-target="#modal_usuario" data-bs-target="#modal_usuario">
                        Agregar
                    </button>
                   
                </div>

                <div class="table-responsive ">
                    <table id="lang_opt"
                        class="tablas table table-striped table-bordered text-nowrap align-middle tablaTareas">
                        <thead>

                            <tr>

                                <th style="width:10px">#</th>
                                <th>Nombre</th>
                                <th>Estado</th>
                                <th>Último login</th>
                                <th>Acciones</th>

                            </tr>

                        </thead>
                        <?php

                   

                        $usuarios = ControladorUsuarios::ctrMostrarUsuariosTecnicos();

                        foreach ($usuarios as $key => $value) {

                            echo ' <tr>
          <td>' . ($key + 1) . '</td>
          <td>' . $value["nombre"] . ' ' . $value["apellido"] . '</td>
          ';

                           

                            
                            if ($value["estado"] != 0) {

                                echo '<td><button class="btn btn-success btn-xs btnActivar" idUsuario="' . $value["id"] . '" estadoUsuario="0">Activado</button></td>';
                            } else {

                                echo '<td><button class="btn btn-danger btn-xs btnActivar" idUsuario="' . $value["id"] . '" estadoUsuario="1">Desactivado</button></td>';
                            }

                            echo '<td>' . $value["ultimo_login"] . '</td>
          <td>

            <div class"btn-group">

                   
              <button type="button" class="btn text-success btnEditarUsuario" idUsuario="' . $value["id"] . '"  data-bs-toggle="modal"
                        data-target="#editarUsuario" data-bs-target="#editarUsuario"><iconify-icon icon="solar:pen-new-square-bold-duotone" width="25" height="25"></iconify-icon></button>

              

            </div>

          </td>

        </tr>';
                        }

                       /* <button class="btn text-danger btnEliminarUsuario" idUsuario="' . $value["id"] . '" fotoUsuario="' . $value["foto"] . '" usuario="' . $value["usuario"] . '"><iconify-icon icon="solar:trash-bin-trash-line-duotone" width="25" height="25"></iconify-icon></button>*/
                        ?>
                    </table>
                </div>

            </div>
        </div>
    </div>

    <!-- end DOM Positioning -->

    <!-- end Alternative Pagination -->
</div>
<!-- Modal de Success -->
<div class="modal fade" id="al-success-alert" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content bg-success-subtle text-success">
      <div class="modal-header">
        
       
      </div>
      <div class="modal-body p-4">
      <div class="text-center text-success">
      <iconify-icon icon="solar:check-circle-bold-duotone" width="60" height="60"></iconify-icon>
                              <h4 class="mt-2">El usuario ha sido actualizado exitosamente!</h4>
                              <p class="mt-3 text-success-50">
                              </p>
                            
                            </div>
        
      
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-bs-dismiss="modal">Continue</button>
      </div>
      </div>
    </div>
  </div>
</div>
<!--=====================================
MODAL AGREGAR USUARIO
======================================-->

<div id="modal_usuario" class="modal fade" tabindex="-1" aria-labelledby="modal_tarea" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">

            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Agregar nuevo técnico</h4>
                        <p class="card-subtitle mb-3">

                        </p>
                        <form class="form" method="post" enctype="multipart/form-data">

                            <!-- ENTRADA PARA NOMBRE -->
                            <div class="mb-3 row">
                                <label for="example-text-input" class="form-label">Nombre</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control input-lg" name="nuevoNombre" required>
                                </div>
                            </div>
                            <!-- ENTRADA PARA NOMBRE -->
                            <div class="mb-3 row">
                                <label for="example-text-input" class="form-label">Apellido</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control input-lg" name="nuevoApellido" required>
                                </div>
                            </div>
                            <!-- ENTRADA PARA NOMBRE -->
                            <div class="mb-3 row">
                                <label for="example-text-input" class="form-label">Usuario</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control input-lg" name="nuevoUsuario" value=""
                                        id="nuevoUsuario" required>
                                </div>
                            </div>
                            <!-- ENTRADA PARA NOMBRE -->
                            <div class="mb-3 row">
                                <label for="example-text-input" class="form-label">Contraseña</label>
                                <div class="col-md-12">
                                    <input type="password" class="form-control input-lg" name="nuevoPassword" required>
                                </div>
                            </div>

                            <!-- ENTRADA PARA SELECCIONAR TECNICO -->

                            <div class="mb-3 row">
                                <label for="example-month-input2" class="form-label">Perfil </label>
                                <!-- ENTRADA PARA SELECCIONAR DEPARTAMENTO -->
                                <div class="col-md-12">
                                    <select class="form-select" id="example-month-input2 nuevoTipoUsuario"
                                        name="nuevoTipoUsuario" required>
                                        <option selected="">Selecciona el perfil</option>
                                        <option value="Administrador">Administrador</option>
                                        <option value="Tecnico">Tecnico</option>


                                    </select>
                                </div>
                                <div class="mb-3 row"> </div>

                              <!--  <div class="form-group">

                                    <div class="panel">SUBIR FOTO</div>

                                    <input type="file" class="nuevaFoto" name="nuevaFoto">

                                    <p class="help-block">Peso máximo de la foto 2MB</p>

                                    <img src="vistas/img/usuarios/user.png" class="img-thumbnail previsualizar"
                                        width="100px">

                                </div>
                    -->
                            </div>



                            <div class="col-md-12">



                            </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-danger-subtle text-danger waves-effect" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn bg-success" data-bs-dismiss="modal">
                        Guardar 
                    </button>
                </div>

                <?php

                $crearUsuario = new ControladorUsuarios();
                $crearUsuario->ctrCrearUsuario();

                ?>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</div>


<!--=====================================
MODAL EDITAR USUARIO
======================================-->
<div id="editarUsuario" class="modal fade" tabindex="-1" aria-labelledby="modal_tarea" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">

            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Editar Tarea</h4>
                        <p class="card-subtitle mb-3">

                        </p>
                        <form role="form" method="post" enctype="multipart/form-data">



                            <!-- EDITAR PARA NOMBRE -->
                            <div class="mb-3 row">
                                <label for="example-text-input" class="form-label">Nombre</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control input-lg" id="editarNombre" name="editarNombre" required>
                                </div>
                            </div>

                            <!-- EDITAR NOMBRE -->
                            <div class="mb-3 row">
                                <label for="example-text-input" class="form-label">Apellido</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control input-lg" id="editarApellido" name="editarApellido" required>
                                </div>
                            </div>


                            <!-- EDITAR EL USUARIO -->
                            <div class="mb-3 row">
                                <label for="example-text-input" class="form-label">Usuario</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control input-lg" id="editarUsa" name="editarUsa" required>
                                </div>
                            </div>

                            

                            <!-- EDITAR LA CONTRASEÑA -->

                            <div class="mb-3 row">
                                <label for="example-text-input" class="form-label">Contraseña</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control input-lg"  name="editarContra" placeholder="Escriba la nueva contraseña">
                                    <input type="hidden" id="contraActual" name="contraActual">
                                </div>
                            </div>
                            

                            <!-- EDITAR SELECCIONAR SU PERFIL -->

                            <div class="mb-3 row">
                                <label for="example-text-input" class="form-label">Tipo Usuario</label>

                                    <select class="form-control input-lg" name="editarTipoUsuario">

                                        <option value="" id="editarTipoUsuario"></option>

                                        <option value="Administrador">Administrador</option>
                                        <option value="Tecnico">Tecnico</option>

                                        <option value="Especial">Especial</option>

                                       

                                    </select>

                                

                            </div>

                            <!-- EDITAR SUBIR FOTO 

                            <div class="form-group">

                                <div class="panel">SUBIR FOTO</div>

                                <input type="file" class="nuevaFoto" name="editarFoto">

                                <p class="help-block">Peso máximo de la foto 2MB</p>

                                <img src="vistas/img/usuarios/user.png" class="img-thumbnail previsualizarEditar" width="100px">

                                <input type="hidden" name="fotoActual" id="fotoActual">

                            </div>-->

                    </div>

                </div>

                <!--=====================================
PIE DEL MODAL
======================================-->
<input type="hidden"  name="idUsuario" id="idUsuario" required>
                <div class="modal-footer">
                    <button type="button" class="btn bg-danger-subtle text-danger waves-effect" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn bg-success" data-bs-dismiss="modal">
                        Guardar 
                    </button>
                </div>

                <?php

                $editarUsuario = new ControladorUsuarios();
                $editarUsuario->ctrEditarUsuario();

                ?>

                </form>
            </div>
            <!-- /.modal-content -->
        </div>
    </div>



  
    <?php

    $borrarUsuario = new ControladorUsuarios();
    $borrarUsuario->ctrBorrarUsuario();

    ?>

