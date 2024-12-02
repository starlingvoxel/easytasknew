    <!-- Our Visitors -->
    <div class="row">
   <?php include "inicio/count_tareas.php"; ?>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Departamentos mas visitados</h4>
                    <p class="card-subtitle">Estadistica de los 5 departamentos mas visitados en el mes actual</p>
                    <div id="our-visitors" class="mt-4"></div>
                </div>
                <div class="card-body d-flex align-items-center justify-content-center border-top mt-1">
                    <ul class="list-inline mb-0 hstack justify-content-center" id="departamentos-lista">
                        <!-- Los nombres de los departamentos se agregarán dinámicamente aquí -->
                    </ul>
                </div>
            </div>
        </div>


        <!-- contact -->
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body pb-0">
                    <h4 class="card-title">Tareas</h4>
                    <p class="card-subtitle mb-0">
                        Ultimas 5 tareas
                    </p>

                    <div class="message-box contact-box position-relative mt-3">
                        <div class="message-widget contact-widget position-relative">
                            <!-- contact -->



                            <table id="" class=" p-5 table align-middle ">

                                <tbody>
                                    <!-- start row -->
                                    <?php

                                    $item = null;
                                    $valor = null;

                                    $tareas = ControladorTareas::ctrMostrarTareasTecnico($item, $valor);
                                    $contador = 0;

                                    foreach ($tareas as $value) {

                                        $itemDepartamento = "departamento_id";
                                        $valorDepartamento = $value["tarea_departamento_id"];

                                        $respuestaDepartamentos = ControladorDepartamentos::ctrMostrarDepartamentos($itemDepartamento, $valorDepartamento);

                                        echo ' <tr class="align-top">



<td class="text-uppercase" style="padding-left: 1.2rem">
<h5 class="link-primary link-offset-2 ">' . $value["descripcion"] . '</h5>
<span class="text-dark font-weight-medium" style="margin-bottom: 0">' . $respuestaDepartamentos["descripcion"] . '</span> 
';

                                        echo '<span class="text-muted fs-3">#TI-00' . $value["tarea_id"] . '</span> </td>';

                                        echo '<td class="text-uppercase text-end">
  <div class="d-flex justify-content-end align-items-end">
<button style="
    width: 130px; id="' . $value["tarea_id"] . '" type="button" class="btn bg-' . ($value["estado"] == 0 ? 'dark text-white' : ($value["estado"] == 1 ? 'warning text-bg-warning' : ($value["estado"] == 2 ? 'success text-bg-success' : 'danger text-bg-danger '))) . '">
' . ($value["estado"] == 0 ? 'Retenido' : ($value["estado"] == 1 ? 'En proceso' : ($value["estado"] == 2 ? 'Listo' : 'No iniciado'))) . '
</button>

</div>
</td>



</tr>';
                                        $contador++;
                                        if ($contador > 4) {
                                            break;
                                        }
                                    }

                                    ?>

                                    <!-- end row -->

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>






        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex align-items-center flex-wrap">
                                <div>
                                    <h4 class="card-title">Tareas Completadas Por Tecnico</h4>
                                    <p class="card-subtitle">

                                    </p>
                                </div>
                                <div class="ms-auto">
                                    <ul class="d-flex align-items-center gap-3 mb-0">
                                        <li class="d-flex">
                                            <div class="text-primary d-flex align-items-center gap-2 fs-3">
                                                <iconify-icon icon="ri:circle-fill" class="fs-2"></iconify-icon>Tareas
                                            </div>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="me-n4 me-rtl-n4">
                                <div id="sales-overview"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>