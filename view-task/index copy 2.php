<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DataTable con Ajax</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/font-awesome.css" />

    <!-- Incluyendo jQuery y DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="index.js"></script>


</head>

<body>


    <div id='main-wrapper'>

        <div class='page-wrapper'>



           
            <div align="center">
                
                  <div class="mt-6 mb-4">
                  
                   <h4 class="text-uppercase">Dirección de Tecnologías de la Información y Comunicación</h4>
                  
                  </div>
                  <!-- /.input group -->
                </div>
                <div class='container-fluid'>
                <div align="">
                <?php $fecha_actual = date('d/m/Y'); ?>
                  <div class="">
                  
                   <h4 for="">Fecha: <?php echo $fecha_actual?></h4>
                  
                  </div>
                  <!-- /.input group -->
                </div>
               

                    <div class="datatables">
                        <!-- start Zero Configuration -->
                        <div class="card">
                            <div class="card-body">

                                <div>
                                    <br />

                                    <div class="col-12 table-responsive">


                                        <table id="lang_opt" class="tablas table table-striped table-bordered align-middle tablaTareas">
                                            <thead>
                                                <!-- start row -->
                                                <tr>
                                                    <th style="width: 3%;">#</th>
                                                    <th>Departamento</th>
                                                    <th>Tipo de Caso</th>
                                                    <th>Descripcion</th>
                                                    <th>Técnico Asignado</th>
                                                    <th style="width: 10%;">Prioridad</th>
                                                    <th style="width: 18%;">Estado</th>


                                                </tr>
                                                <!-- end row -->
                                            </thead>


                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
      
        <!-- end DOM Positioning -->

        <!-- end Alternative Pagination -->
    </div>

</body>

</html>