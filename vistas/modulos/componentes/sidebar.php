<aside class="left-sidebar with-vertical">
    <div>
        <!-- ---------------------------------- -->
        <!-- Start Vertical Layout Sidebar -->
        <!-- ---------------------------------- -->
        <!-- Sidebar scroll-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar>

            <ul id="sidebarnav">
                <!-- ---------------------------------- -->
                <!-- Home -->
                <!-- ---------------------------------- -->

                <li class="nav-small-cap">


                </li>
                
                <!-- ---------------------------------- -->
                <!-- Dashboard -->
                <!-- ---------------------------------- -->
                <li class="nav-small-cap">
              <iconify-icon icon="solar:menu-dots-bold" class="nav-small-cap-icon fs-4"></iconify-icon>
              <span class="hide-menu">General</span>
            </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="#" id="get-url">
                        <iconify-icon icon="solar:pie-chart-3-line-duotone" ></iconify-icon>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <!-- ---------------------------------- -->
                <!-- tareas -->
                <!-- ---------------------------------- -->
                <?php
                   if($_SESSION["tipo_usuario"] == "Administrador"){

                  
                echo '  <li class="sidebar-item">
                    <a class="sidebar-link" href="tareas">
                        <iconify-icon icon="solar:document-add-line-duotone" ></iconify-icon>
                        <span class="hide-menu">tareas</span>
                    </a>
                </li>

                <!-- ---------------------------------- -->
                <!-- EVENTOS -->
                <!-- ---------------------------------- -->
                <li class="sidebar-item">
                    <a class="sidebar-link" href="eventos">
                    <iconify-icon icon="solar:calendar-line-duotone"></iconify-icon>
                        <span class="hide-menu">Eventos</span>
                    </a>
                </li>
                <!-- ---------------------------------- -->
                <!-- Tecnicos -->
                <!-- ---------------------------------- -->
                <li class="sidebar-item">
                    <a class="sidebar-link" href="tecnicos">
                        <iconify-icon icon="solar:user-line-duotone" ></iconify-icon>
                        <span class="hide-menu">Tecnicos</span>
                    </a>
                </li>
                <!-- ---------------------------------- -->
                <!-- Departamentos -->
                <!-- ---------------------------------- -->
                <li class="sidebar-item">
                    <a class="sidebar-link" href="departamentos">
                        <iconify-icon icon="solar:widget-add-line-duotone" ></iconify-icon>
                        <span class="hide-menu">Departamentos</span>
                    </a>
                </li>
                <!-- ---------------------------------- -->
                <!-- Inventario -->
                <!-- ---------------------------------- 
                <li class="sidebar-item">
                    <a class="sidebar-link" href="inventario">
                        <iconify-icon icon="solar:box-line-duotone" ></iconify-icon>
                        <span class="hide-menu">Inventario</span>
                    </a>
                </li>-->
                <!-- ---------------------------------- -->
                <!-- INVENTARIO -->
                <!-- ---------------------------------- -->
                <li class="nav-small-cap">
              <iconify-icon icon="solar:menu-dots-bold" class="nav-small-cap-icon fs-4"></iconify-icon>
              <span class="hide-menu">Inventario</span>
            </li>
             <!-- ---------------------------------- -->
                <!-- Caja Chica -->
                <!-- ---------------------------------- -->
                <li class="sidebar-item">
                    <a class="sidebar-link" href="caja-chica">
                        <iconify-icon icon="solar:wallet-money-line-duotone"></iconify-icon>
                        <span class="hide-menu">Caja Chica</span>
                    </a>
                </li>

                 <!-- ---------------------------------- -->
                <!-- REPORTES -->
                <!-- ---------------------------------- -->
                <li class="nav-small-cap">
              <iconify-icon icon="solar:menu-dots-bold" class="nav-small-cap-icon fs-4"></iconify-icon>
              <span class="hide-menu">Reportes</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
              <iconify-icon icon="solar:documents-minimalistic-line-duotone" ></iconify-icon>
                <span class="hide-menu">Todos los reportes</span>
              </a>
              <ul aria-expanded="false" class="collapse first-level">
                <li class="sidebar-item">
                  <a href="reporte-tarea" class="sidebar-link sublink">
                    <div class="round-16 d-flex align-items-center justify-content-center">
                      <iconify-icon icon="solar:stop-circle-line-duotone"></iconify-icon>
                    </div>
                    <span class="hide-menu">Reporte de tarea</span>
                  </a>
                </li>
                <li class="sidebar-item">
                  <a href="" class="sidebar-link sublink">
                    <div class="round-16 d-flex align-items-center justify-content-center">
                      <iconify-icon icon="solar:stop-circle-line-duotone"></iconify-icon>
                    </div>
                    <span class="hide-menu">Reporte de técnicos</span>
                  </a>
                </li>';
                  
                  }else if($_SESSION["tipo_usuario"] == "Tecnico"){
                  
 
                   
                 echo '   
                 <!-- ---------------------------------- -->
                <!-- Tarea del tecnico -->
                <!-- ---------------------------------- -->
                <li class="sidebar-item">
                    <a class="sidebar-link" href="view-tecnicos">
                        <iconify-icon icon="solar:widget-add-line-duotone" ></iconify-icon>
                        <span class="hide-menu">Tareas asignadas</span>
                    </a>
                </li>';
                  }
                ?>
              
               
              </ul>
            </li>
            </ul>
        </nav>

        <!-- End Sidebar scroll-->
    </div>
</aside>