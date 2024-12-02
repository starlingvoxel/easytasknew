<div class="card">

    <div class="card-body">

        <div class="row">


            <div class="col-12">

                <h4 class="card-title mb-3">Administrar Perfil</h4>


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
                            <input type="text" class="form-control input-lg" name="editarContra" placeholder="Escriba la nueva contraseña">
                            <input type="hidden" id="contraActual" name="contraActual">
                        </div>
                    </div>

                

            </div>

        </div>

        <!--=====================================
                    PIE DEL MODAL
                    ======================================-->
        <input type="hidden" name="idUsuario" id="idUsuario" required>
        <div class="modal-footer">
         
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
</div>