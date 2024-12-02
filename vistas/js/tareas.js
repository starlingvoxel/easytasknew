/*=============================================
mostar TAREA
=============================================
var datos1 = new FormData();
datos1.append("tarea_id", 1);
$.ajax({

  url: "ajax/tecnico_asignado.ajax.php",
  method: "POST",
  data: datos1,
  cache: false,
  contentType: false,
  processData: false,
  dataType: "json",
  success: function (respuesta) {

    console.log("respuesta", respuesta);

  }

})*/

/*=============================================
EDITAR TAREA
=============================================*/
$(".tablaTareas tbody").on("click", "button.btnEditarTarea", function () {
 
  var tarea_id = $(this).attr("tarea_id");

  var datos = new FormData();
  datos.append("tarea_id", tarea_id);
 
  $.ajax({

    url: "ajax/tareas.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      var datosDepartamento = new FormData();
      datosDepartamento.append("idDepartamento", respuesta["tarea_departamento_id"]);

      $.ajax({

        url: "ajax/departamentos.ajax.php",
        method: "POST",
        data: datosDepartamento,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
          console.log("departamento", respuesta);

          $("#editarDepartamento").val(respuesta["departamento_id"]);
          $("#editarDepartamento").html(respuesta["descripcion"]);
        }

      })

      $.ajax({

        url: "ajax/tecnico_asignado.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
          console.log("tecnico asignado", respuesta);

          // Suponiendo que 'respuesta' es un array de objetos con los técnicos asignados
          // Mapear el array para extraer solo los IDs de los técnicos
          var tecnicosAsignados = respuesta.map(function (tecnico) {
            return tecnico.id_tecnico;
          });

          // Asignar los valores al select múltiple
          $("#editarTecnico").val(tecnicosAsignados).trigger('change');
        }

      })

      $("#idTarea").val(tarea_id);
      $("#editarTipocaso").val(respuesta["tipo_caso"]);

      $("#editarDescripcion").val(respuesta["descripcion"]);

      $("#editarPrioridad").val(respuesta["prioridad"]);
      $("#editarNota").val(respuesta["nota"]);

    }

  })

});

$('.actualizarEstado').click(function () {
  var estado = $(this).data('estado');  // Obtener el nuevo estado desde data-estado
  var tarea_id = $(this).data('id');  // Obtener el ID de la tarea desde el atributo data-id


  // Cambiar el color de fondo del botón padre (el dropdown toggle) según el estado seleccionado
  var botonDropdown = $(this).closest('.dropdown').find('button');  // Buscar el botón dentro del dropdown
  botonDropdown.removeClass('bg-danger bg-warning bg-success bg-light'); // Eliminar clases previas

  if (estado == 0) {
    botonDropdown.addClass('bg-dark text-white').text('Retenido');
  } else if (estado == 1) {
    botonDropdown.addClass('bg-warning').text('En proceso');
  } else if (estado == 2) {
    botonDropdown.addClass('bg-success').text('Listo');
  } else {
    botonDropdown.addClass('bg-danger text-white').text('No iniciado');
  }

  // Enviar los datos con AJAX
  $.ajax({
    url: 'ajax/tareas.ajax.php',  // Archivo PHP que manejará la actualización
    type: 'POST',
    data: {
      estado_update: estado,
      tarea_id_update: tarea_id
    },
    success: function (response) {


      // Aquí puedes manejar la respuesta del servidor
      if (response == "success") {
        toastr.success('Estado actualizado correctamente.');
      } else {
        toastr.error('Hubo un problema al actualizar el estado.');
      }
    }
  });
});



