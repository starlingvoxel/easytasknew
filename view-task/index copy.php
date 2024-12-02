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

    <script>
        $(document).ready(function() {
            // Inicializamos el DataTable con Ajax
            $('#lang_opt').DataTable({
                "ajax": {
                    "url": "get_data.php", // Archivo que devuelve los datos en formato JSON
                    "type": "POST"
                },
                "columns": [
    { "data": "tarea_id" }, // Columna para el ID
    { "data": "departamento" }, // Columna para el Departamento
    { "data": "tipo_caso" }, // Columna para el Tipo de Caso
    { "data": "descripcion" }, // Columna para la Descripción
    { "data": "tecnicos_asignados" }, // Columna para el Técnico Asignado
    { 
        "data": "prioridad", // Columna para la Prioridad
        "render": function(data, type, row, meta) {
            let prioridadTexto = '';
            let prioridadClass = '';

            if (data == 3) {
                prioridadTexto = 'Alta';
                prioridadClass = 'bg-danger-subtle text-danger'; // Clases para prioridad alta
            } else if (data == 2) {
                prioridadTexto = 'Media';
                prioridadClass = 'bg-warning-subtle text-warning'; // Clases para prioridad media
            } else {
                prioridadTexto = 'Baja';
                prioridadClass = 'bg-primary-subtle text-primary'; // Clases para prioridad baja
            }

            // Retornamos el HTML con la etiqueta <span> y las clases personalizadas
            return '<span class="badge ' + prioridadClass + '">' + prioridadTexto + '</span>';
        }
    },
    { 
        "data": "estado", // Columna para el Estado
        "render": function(data, type, row, meta) {
            let estadoTexto = '';
            let bgClass = '';

            switch(data) {
                case '0': // Retenido
                    estadoTexto = 'Retenido';
                    bgClass = 'bg-danger text-white'; // Clases de Bootstrap para color de fondo rojo
                    break;
                case '1': // En proceso
                    estadoTexto = 'En proceso';
                    bgClass = 'bg-warning text-dark'; // Fondo amarillo
                    break;
                case '2': // Listo
                    estadoTexto = 'Listo';
                    bgClass = 'bg-success text-white'; // Fondo verde
                    break;
                case '3': // No iniciado
                    estadoTexto = 'No iniciado';
                    bgClass = 'bg-light text-dark'; // Fondo gris claro
                    break;
                default:
                    estadoTexto = 'Desconocido';
                    bgClass = 'bg-secondary text-white'; // Fondo gris oscuro para casos no previstos
            }

            // Retornamos el HTML con el estado y las clases correspondientes
            return '<span class="badge ' + bgClass + '">' + estadoTexto + '</span>';
        }
    }
],

                "autoWidth": true,
                "processing": true,
                "serverSide": true,
                "responsive": true
               
            });

            // Recarga automática cada 30 segundos
            setInterval(function() {
                $('#lang_opt').DataTable().ajax.reload(null, false); // Recarga los datos sin reiniciar la tabla
            }, 30000); // 30 segundos
        });
    </script>
</head>
<body>
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

    <!-- end DOM Positioning -->

    <!-- end Alternative Pagination -->
</div>

</body>
</html>
