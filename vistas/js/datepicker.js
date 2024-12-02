
/*******************************************/
// Date & Time
/*******************************************/
$(".datetime").daterangepicker({
    timePicker: true,
    timePicker24Hour: true,
    timePickerIncrement: 30,
    locale: {
      format: "YYYY-MM-DD HH:mm ",
      separator: " - ",  // Define el separador
      applyLabel: "Aplicar",
      cancelLabel: "Cancelar",
    },
    opens: "right"
  }, function(start, end) {
    // Convierte el rango en fechas separadas y asigna a variables o inputs ocultos
    $('#fechaInicio').val(start.format("YYYY-MM-DD HH:mm"));
    $('#fechaFin').val(end.format("YYYY-MM-DD HH:mm"));
  });
  $(".datetimeedit").daterangepicker({
    timePicker: true,
    timePicker24Hour: true,
    timePickerIncrement: 30,
    locale: {
      format: "YYYY-MM-DD HH:mm",
      separator: " - ",  // Define el separador
      applyLabel: "Aplicar",
      cancelLabel: "Cancelar",
    },
    opens: "right"
  }, function(start, end) {
    // Convierte el rango en fechas separadas y asigna a variables o inputs ocultos
    $('#editarfechaInicio').val(start.format("YYYY-MM-DD HH:mm"));
    $('#editarfechaFin').val(end.format("YYYY-MM-DD HH:mm"));
  });