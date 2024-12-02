function fetchCalendarEvents() {
  $.ajax({
    url: 'ajax/eventos.ajax.php', // Cambia esta URL por la ruta de tu controlador PHP
    type: "POST",
    data: { obtenerEventos: true },
    dataType: 'json',
    success: function(response) {
      // Crea un array de promesas para esperar todas las llamadas AJAX de tareas
      const eventPromises = response.map(event => {
        return new Promise((resolve) => {
          const datoIdTarea = new FormData();
          datoIdTarea.append("tarea_id", event["id_tarea_evento"]);

          $.ajax({
            url: "ajax/tareas.ajax.php",
            method: "POST",
            data: datoIdTarea,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(respuesta) {
              // Determina el tipo de evento según el estado de la tarea
              const calendarType = (respuesta["estatus"] === 2) ? "success" : "danger";

              resolve({
                id: event.id_evento,
                title: event.evento,
                start: event.fecha_inicio,
                end: event.fecha_fin,
                extendedProps: {
                  calendar: calendarType // Colocamos calendarType directamente aquí
              }
              });
            },
            error: function(error) {
              console.error("Error al obtener la tarea:", error);
              resolve(null); // Resolver como null en caso de error para continuar con otros eventos
            }
          });
        });
      });

      // Espera a que todas las promesas se completen
      Promise.all(eventPromises).then(calendarEventsList => {
        // Filtra posibles valores `null` si alguna promesa falló
        calendarEventsList = calendarEventsList.filter(event => event !== null);

        // Inicializa el calendario con los eventos obtenidos
        initializeCalendar(calendarEventsList);
      });
    },
    error: function(error) {
      console.error("Error al cargar eventos:", error);
    }
  });
}

// Define la función de inicialización del calendario
function initializeCalendar(events) {
  var calendarEl = document.querySelector("#calendar");



 /*=====================*/
  // Calendar AddEvent fn.
  /*=====================*/
  var checkWidowWidth = function () {
    if (window.innerWidth <= 1199) {
      return true;
    } else {
      return false;
    }
  };

  var calendarAddEvent = function () {

    modalAgregarEvento.show();
    
  };

  var calendarEventClick = function (info) {
    var eventObj = info.event;

      var idEvento = eventObj._def.publicId;
      console.log(idEvento);
      var datoIdEvento = new FormData();
      datoIdEvento.append("id_evento", idEvento);
      modalEditarEvento.show();
   
      $.ajax({

        url: "ajax/eventos.ajax.php",
        method: "POST",
        data: datoIdEvento,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
          console.log(respuesta);
          var datoIdTarea = new FormData();
          datoIdTarea.append("tarea_id", respuesta["id_tarea_evento"]);
      $.ajax({

        url: "ajax/tareas.ajax.php",
        method: "POST",
        data: datoIdTarea,
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
     /*=============================================
  ASIGNANDO DATOS DEL DEPARTAMENTO
  =============================================*/
              $("#editarDepartamento").val(respuesta["departamento_id"]);
              $("#editarDepartamento").html(respuesta["descripcion"]);
            }
    
          })
    
          $.ajax({
    
            url: "ajax/tecnico_asignado.ajax.php",
            method: "POST",
            data: datoIdTarea,
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
     /*=============================================
  ASIGNANDO DATOS DEL TECNICO
  =============================================*/
            
              $("#editarTecnico").val(tecnicosAsignados).trigger('change');
            }
    
          })
     /*=============================================
  ASIGNANDO DATOS DE LA TAREA
  =============================================*/
          $("#idEvento").val(idEvento);
         
          $("#editarTipocaso").val(respuesta["tipo_caso"]);
    
          $("#editarDescripcion").val(respuesta["descripcion"]);
    
          $("#editarPrioridad").val(respuesta["prioridad"]);
    
    
        }
    
      })
 /*=============================================
  ASIGNANDO DATOS DEL EVENTO
  =============================================*/
  $("#idTarea").val(respuesta["id_tarea_evento"]);
  $("#editarEvento").val(respuesta["evento"]);
    
  $("#editarLugar").val(respuesta["lugar"]);

  $("#editarSolicitante").val(respuesta["solicitante"]);

  $("#editarfechaInicio").val(respuesta["fecha_inicio"]);

  $("#editarfechaFin").val(respuesta["fecha_fin"]);
// Cuando tengas las fechas desde la base de datos, asígnalas
$("#editarFecha").data('daterangepicker').setStartDate(respuesta["fecha_inicio"]);
$("#editarFecha").data('daterangepicker').setEndDate(respuesta["fecha_fin"]);
    
    }
    })
    
  };

  var calendarHeaderToolbar = {
    left: "prev next addEventButton",
    center: "title",
    right: "dayGridMonth,dayGridWeek,listWeek",
     
  };

  var calendarSelect = function (info) {
    modalAgregarEvento.show();
  };





  var calendar = new FullCalendar.Calendar(calendarEl, {
      selectable: true,
      height: window.innerWidth <= 1199 ? 900 : 1052,
                initialView: window.innerWidth <= 1199 ? "listWeek" : "dayGridMonth",
      headerToolbar: calendarHeaderToolbar,
      buttonText: {
        today: "Hoy",
        month: "Mes",
        week: "Semana",
        day: "Día",
        list: "Agenda"
      },
      locale: 'es',
      events: events,
      displayEventTime: true,      // Muestra la hora en la vista de día y semana
      eventTimeFormat: {           
        hour: 'numeric',        // Muestra la hora en formato de 12 horas
        minute: '2-digit',
        meridiem: 'short',
        hour12: true      // Agrega AM/PM
    },
      select: calendarSelect,
      unselect: function() {
          console.log("unselected");
      },
      customButtons: {
          addEventButton: {
              text: "Agregar Evento",
              click: calendarAddEvent,
          },
      },
      eventClassNames: function({ event }) {
        // Accede a la propiedad `calendar` en `extendedProps` y ajusta la clase en función de su valor.
        let className = event.extendedProps.calendar === "success" ? "fc-bg-success" : "fc-bg-danger";
        
        // Retorna el arreglo de clases.
        return ["event-fc-color", className];
    },
      eventClick: calendarEventClick,
      windowResize: function(arg) {
          if (checkWidowWidth()) {
              calendar.changeView("listWeek");
              calendar.setOption("height", 900);
          } else {
              calendar.changeView("dayGridMonth");
              calendar.setOption("height", 1052);
          }
      },
  });
  
  calendar.render();
  var modalEditarEvento = new bootstrap.Modal(document.getElementById("modalEditarEvento"));
  var modalAgregarEvento = new bootstrap.Modal(document.getElementById("modalAgregarEvento"));

}

// Llama a la función de obtención de eventos al cargar el DOM
document.addEventListener("DOMContentLoaded", function() {
  fetchCalendarEvents();
});
