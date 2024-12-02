<ul class="nav nav-pills p-3 mb-3 rounded align-items-center card flex-row">
            <li class="nav-item">
              <a href="javascript:void(0)" class="
                      nav-link
                     gap-6
                      note-link
                      d-flex
                      align-items-center
                      justify-content-center
                      active
                      px-3 px-md-3
                      me-0 me-md-2 fs-11
                    " id="todas">
                <span class="d-none d-md-block fw-medium">Todas mis tareas</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="javascript:void(0)" class="
                      nav-link
                    gap-6
                      note-link
                      d-flex
                      align-items-center
                      justify-content-center
                      px-3 px-md-3
                      me-0 me-md-2 fs-11
                    " id="Listas">
                    <iconify-icon icon="solar:check-read-line-duotone" ></iconify-icon>
                <span class="d-none d-md-block fw-medium">Listas</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="javascript:void(0)" class="
                      nav-link
                    gap-6
                      note-link
                      d-flex
                      align-items-center
                      justify-content-center
                      px-3 px-md-3
                      me-0 me-md-2 fs-11
                    " id="enproceso">
                    <iconify-icon icon="solar:clock-circle-line-duotone" ></iconify-icon>
                <span class="d-none d-md-block fw-medium">En proceso</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="javascript:void(0)" class="
                      nav-link
                    gap-6
                      note-link
                      d-flex
                      align-items-center
                      justify-content-center
                      px-3 px-md-3
                      me-0 me-md-2 fs-11
                    " id="noiniciadas">
                    <iconify-icon icon="solar:danger-line-duotone" ></iconify-icon>
                <span class="d-none d-md-block fw-medium">No iniciadas</span>
              </a>
            </li>
        
            <li class="nav-item">
              <a href="javascript:void(0)" class="
                      nav-link
                    gap-6
                      note-link
                      d-flex
                      align-items-center
                      justify-content-center
                      px-3 px-md-3
                      me-0 me-md-2 fs-11
                    " id="Retenidas">
                    <iconify-icon icon="solar:bill-cross-line-duotone" ></iconify-icon>
                <span class="d-none d-md-block fw-medium">Retenidas</span>
              </a>
            </li>
       
</ul>


          <div class="tab-content">
            <div id="note-full-container" class="note-has-grid row">
            <?php

            
              $valor = $_SESSION["id"];

              $tareasPorTecnico = ControladorTareas::ctrMostrarTareaPorTecnico($valor);


              foreach ($tareasPorTecnico as $value ) {
                $itemDepartamento = "departamento_id";
                $valorDepartamento = $value["tarea_departamento_id"];

                $respuestaDepartamentos = ControladorDepartamentos::ctrMostrarDepartamentos($itemDepartamento, $valorDepartamento);
                $fechaCompleta = $value["inicio"];

                $dateTime = new DateTime($fechaCompleta);


                $fecha = $dateTime->format('d-m-Y');

                $hora = $dateTime->format('H:i');

                echo '
                                         
              <div class="col-md-4 single-note-item all-category">
                <div class="card card-body">';

                
                echo '
                <span class="side-stick bg-' . 
                    ($value["estatus"] == 0 ? 'dark' : 
                    ($value["estatus"] == 1 ? 'warning' : 
                    ($value["estatus"] == 2 ? 'success' : 
                    'danger'))) . 
                '"></span>
                
                  <h5 class="note-title text-truncate w-75 mb-0" >
                  ' ;
                  if ($value["tipo_caso"] == 1) {

                    echo 'PC';
                } else if ($value["tipo_caso"] == 2) {

                    echo 'IMPRESORA';
                } else if ($value["tipo_caso"] == 3) {
                    echo 'INTERNET';
                } else if ($value["tipo_caso"] == 4) {
                    echo 'TELEFONO';
                } else if ($value["tipo_caso"] == 5) {
                    echo 'SOFTWARE';
                } else if ($value["tipo_caso"] == 7) {
                    echo 'WIFI';
                } else {
                    echo 'OTROS';
                }
                  echo '</h5>
                   <h6 class="text-dark " style="margin-bottom: 0">' . $respuestaDepartamentos["descripcion"] . '</h6>
                   <span class="text-muted fs-3">#TI-00' . $value["tarea_id"] . '</span>
                   <br>
                 
                  <div class="note-content">
                    <p class="note-inner-content" data-notecontent="' . $value["descripcion"] .'">' . $value["descripcion"] .'</p>
                     <p class="note-date fs-2"><strong>' . $fecha . '</strong> a las ' . $hora . '</p>
                  </div>
                  <div class="d-flex align-items-center">
                    <a href="javascript:void(0)" class="link me-1">
                      <i class="ti ti-star fs-4 favourite-note"></i>
                    </a>
                    <a href="javascript:void(0)" class="link text-danger ms-2">
                      <i class="ti ti-trash fs-4 remove-note"></i>
                    </a>
                    
                  </div>
                </div>
              </div>
                ';
              }
              ?>
         
          
            </div>
          </div>