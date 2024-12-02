/*=============================================
EDITAR Departamento
=============================================*/
$(".tablas").on("click", ".btnEditarDepartamento", function(){

	var idDepartamento = $(this).attr("idDepartamento");
	console.log("entro ", idDepartamento);
	var datos = new FormData();
	datos.append("idDepartamento", idDepartamento);

	$.ajax({
		url: "ajax/Departamentos.ajax.php",
		method: "POST",
      	data: datos,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",
     	success: function(respuesta){
console.log(respuesta);

     		$("#editarDepartamento").val(respuesta["descripcion"]);
     		$("#idDepartamento").val(idDepartamento);

     	}

	})


})

/*=============================================
ELIMINAR Departamento
=============================================*/
$(".tablas").on("click", ".btnEliminarDepartamento", function(){

	 var idDepartamento = $(this).attr("departamento_id");

	Swal.fire({
		title: "Estas seguro que deseas eliminar este registro?",
		showDenyButton: true,
		showCancelButton: false,
		confirmButtonText: "Eliminar",
		denyButtonText: `Cancelar`
	  }).then((result) => {
		/* Read more about isConfirmed, isDenied below */
		if (result.isConfirmed) {
			window.location = "index.php?ruta=departamentos&departamento_id="+idDepartamento;
		  
		} else if (result.isDenied) {
		  Swal.fire("cambios no guargados", "", "info");
		}
	  });

})