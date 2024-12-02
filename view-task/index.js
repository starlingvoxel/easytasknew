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
            bgClass = 'bg-dark text-white'; // Clases de Bootstrap para color de fondo rojo
            break;
        case '1': // En proceso
            estadoTexto = 'En proceso';
            bgClass = 'bg-warning text-white'; // Fondo amarillo
            break;
        case '2': // Listo
            estadoTexto = 'Listo';
            bgClass = 'bg-success text-white'; // Fondo verde
            break;
        case '3': // No iniciado
            estadoTexto = 'No iniciado';
            bgClass = 'bg-danger text-white'; // Fondo gris claro
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

        "autoWidth": false,
        "processing": true,
        "serverSide": true,
        "responsive": true,
        "dom": 't',
       // Eliminar el campo de búsqueda predeterminado
        language: {
            "processing": "Procesando...",
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "emptyTable": "Ningún dato disponible en esta tabla",
            "infoEmpty": "",
            "infoFiltered": "",
            "search": "Buscar:",
            "infoThousands": ",",
            "loadingRecords": "Cargando...",
            "info": "Mostrando _START_ a _END_ de _TOTAL_",
        }
    
       
    });

    // Recarga automática cada 30 segundos
    setInterval(function() {
        $('#lang_opt').DataTable().ajax.reload(null, false); // Recarga los datos sin reiniciar la tabla
    }, 10000); // 30 segundos
});

