/*=============================================
RANGO DE FECHAS
=============================================*/

$('#daterange-btn').daterangepicker(
    {
      ranges   : {
        'Hoy'       : [moment(), moment()],
        'Ayer'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        'Últimos 7 días' : [moment().subtract(6, 'days'), moment()],
        'Últimos 30 días': [moment().subtract(29, 'days'), moment()],
        'Este mes'  : [moment().startOf('month'), moment().endOf('month')],
        'Último mes'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
      },
      locale: {
        applyLabel: "Aplicar",
        cancelLabel: "Cancelar",
        startLabel: "Fecha inicial",
        endLabel: "Fecha final",
        customRangeLabel: "Seleccionar una fecha",
        daysOfWeek: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
        monthNames: [
          "Enero",
          "Febrero",
          "Marzo",
          "Abril",
          "Mayo",
          "Junio",
          "Julio",
          "Agosto",
          "Septiembre",
          "Octubre",
          "Noviembre",
          "Diciembre",
        ],
    }
,    
      startDate: moment(),
      endDate  : moment()
    },
    function (start, end) {
      $('#daterange-btn').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
  
      var fechaInicial = start.format('YYYY-MM-DD');
  
      var fechaFinal = end.format('YYYY-MM-DD');
      console.log(fechaInicial,fechaFinal);
      var capturarRango = $("#daterange-btn").html();
      console.log(capturarRango);
         localStorage.setItem("capturarRango", capturarRango);
  
         window.location = "index.php?ruta=caja-chica&fechaInicial="+fechaInicial+"&fechaFinal="+fechaFinal;
  
    }
  
  )

  /*=============================================
CANCELAR RANGO DE FECHAS
=============================================*/

$(".daterangepicker .opensleft .opensright .range_inputs .cancelBtn").on("click", function(){


	localStorage.removeItem("capturarRango");
	localStorage.clear();
	window.location = "caja-chica";
})

/*=============================================
CAPTURAR HOY
=============================================*/

$(".daterangepicker .opensright .ltr .ranges li").on("click", function(){

	var textoHoy = $(this).attr("data-range-key");
  console.log(textoHoy);
	if(textoHoy == "Hoy"){

		var d = new Date();

		var dia = d.getDate();
		var mes = d.getMonth()+1;
		var año = d.getFullYear();

		 if(mes < 10){

	 	var fechaInicial = año+"-0"+mes+"-"+dia;
	 	var fechaFinal = año+"-0"+mes+"-"+dia;

	 }else if(dia < 10){

	 	var fechaInicial = año+"-"+mes+"-0"+dia;
			var fechaFinal = año+"-"+mes+"-0"+dia;
	 }else if(mes < 10 && dia < 10){

	 	var fechaInicial = año+"-0"+mes+"-0"+dia;
	 	var fechaFinal = año+"-0"+mes+"-0"+dia }else{

	 	var fechaInicial = año+"-"+mes+"-"+dia;
	    	var fechaFinal = año+"-"+mes+"-"+dia;

		 }

		dia = ("0"+dia).slice(-2);
		mes = ("0"+mes).slice(-2);

		var fechaInicial = año+"-"+mes+"-"+dia;
		var fechaFinal = año+"-"+mes+"-"+dia;

    	localStorage.setItem("capturarRango", "Hoy");

    	window.location = "index.php?ruta=caja-chica&fechaInicial="+fechaInicial+"&fechaFinal="+fechaFinal;

	}

})
