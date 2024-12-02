<?php

class ControladorEventos
{
	
	/*=============================================
	CREAR tareaS
	=============================================*/

	static public function ctrCrearEventos()
	{

		if (isset($_POST["nuevoEvento"])) {


			date_default_timezone_set('America/Santo_Domingo');
			$tabla = "task";
			$opcionesSeleccionadas = $_POST['nuevoTecnico'];
			$fechahoraactual = date('Y-m-d H:i:s');
			$datos = array(
				"tipo_caso" => 8,
				"descripcion" =>  $_POST["nuevoEvento"],
				"inicio" => $fechahoraactual,
				"fecha_listo" => NULL,
				"prioridad" => $_POST["nuevaPrioridad"],
				"tarea_departamento_id" => $_POST["nuevoDepartamento"],
				"estatus" => "3",
				"nota" => $_POST["nuevaNota"]
			);

			

			$respuestaUltimoID = 1;
			$respuestaUltimoID = ModeloTareas::mdlIngresarTareas($tabla, $datos);

			$respuestafinal = "ok";
		
		
			
			foreach ($opcionesSeleccionadas as $datoTecnico) {
				$datoTecnico1 = array(
					"id_tarea" => $respuestaUltimoID,
					"id_tecnico" => $datoTecnico
				);
				$fechaFinal = date('Y-m-d H:i:s', strtotime('+1 hour'));
				$fechaActual = date('Y-m-d H:i:s');

// Verificamos si las fechas están vacías y asignamos la fecha y hora actual si es necesario
$fechaListo = !empty($_POST["fecha_inicio"]) ? $_POST["fecha_inicio"] : $fechaActual;
$fechaFin = !empty($_POST["fecha_fin"]) ? $_POST["fecha_fin"] : $fechaFinal;

				$datosEvento = array(
					"evento" => $_POST["nuevoEvento"],
					"lugar" => $_POST["nuevoLugar"],
					"solicitante" => $_POST["nuevoSolicitante"],
					"fecha_listo" => $fechaListo,
					"fecha_fin" => $fechaFin,
					"id_tarea_evento" => $respuestaUltimoID,
					"estado" => 0
					
				);


				$respuestafinal = ModeloTareas::mdlIngresarTecnicoAsignado($datoTecnico1);
				$respuestaEvento = ModeloEventos::mdlIngresarEventos($datosEvento);

			}
			if ($respuestaEvento == "ok") {

				echo '<script>

				swal.fire({
					icon: "success",
					title: "Evento guardado",
					showConfirmButton: true,
					confirmButtonText: "Cerrar",
					allowOutsideClick: false,
					timer: 2000, // Redirige después de 3 segundos
					timerProgressBar: true
				}).then(function(result) {
					// Si el usuario presiona el botón de confirmación
					if (result.value) {
						window.location = "eventos";
					}
				});

				// Redirección automática sin necesidad de hacer clic en "Cerrar"
				setTimeout(function() {
					window.location = "eventos";
				}, 2000); // Redirige automáticamente después de 3 segundos (3000 milisegundos) 
							</script>';
			}
		} 
	}

	/*=============================================
	MOSTRAR tareaS
	=============================================*/

	static public function ctrMostrarEvento($item, $valor)
	{

		$tabla = "eventos";

		$respuesta = ModeloEventos::mdlMostrarEvento($tabla, $item, $valor);

		return $respuesta;
	}
	static public function ctrActualizarEstado($item, $valor)
	{

		$tabla = "task";

		$respuesta = Modelotareas::mdlActualizarEstado($tabla, $item, $valor);
		echo $respuesta;
		return $respuesta;
	}



	static public function ctrEditarEvento()
	{

		if (isset($_POST["editarEvento"])) {

			

				$tabla = "task";
				$opcionesSeleccionadas = $_POST['editarTecnico'];
				$datos = array(
					"tarea_id" => $_POST["idTarea"],
					"tipo_caso" => $_POST["editarTipocaso"],
					"descripcion" => $_POST["editarEvento"],
					"prioridad" => $_POST["editarPrioridad"],
					"tarea_departamento_id" => $_POST["editarDepartamento"],
				);

				$respuesta = "ok";


				foreach ($opcionesSeleccionadas as $datoTecnico) {
					$datoTarea = array("id_tarea" => $_POST["idTarea"]);


					$respuestafinal1 = ModeloTareas::mdlBorrarTecnicosAsignados($datoTarea);

					echo "<script>console.log(" . json_encode($datoTarea) . ");</script>";
				}
				foreach ($opcionesSeleccionadas as $datoTecnico1) {
					$datoTecnico1 = array(
						"id_tarea" => $_POST["idTarea"],
						"id_tecnico" => $datoTecnico1
					);

					$respuestafinal = ModeloTareas::mdlIngresarTecnicoAsignado($datoTecnico1);
				}
			

				$datosEvento = array(
					"evento" => $_POST["editarEvento"],
					"lugar" => $_POST["editarLugar"],
					"solicitante" => $_POST["editarSolicitante"],
					"fecha_listo" => $_POST["editarfecha_inicio"],
					"fecha_fin" => $_POST["editarfecha_fin"],
					"idEvento" => $_POST["idEvento"] ,
					
					
				);
				$respuesta = Modelotareas::mdlEditartarea($datos);
				$respuestaevento = ModeloEventos::mdlEditarEvento($datosEvento);
				if ($respuestaevento == "ok") {

					echo '<script>

				   swal.fire({
        icon: "success",
        title: "Evento guardado",
        showConfirmButton: true,
        confirmButtonText: "Cerrar",
		allowOutsideClick: false,
        timer: 2000, // Redirige después de 3 segundos
        timerProgressBar: true
    }).then(function(result) {
        // Si el usuario presiona el botón de confirmación
        if (result.value) {
            window.location = "eventos";
        }
    });

    // Redirección automática sin necesidad de hacer clic en "Cerrar"
    setTimeout(function() {
        window.location = "eventos";
    }, 2000); // Redirige automáticamente después de 3 segundos (3000 milisegundos) 
				</script>';
				}
			
		}
	}

	/*=============================================
	BORRAR tarea
	=============================================*/

	static public function ctrBorrartarea()
	{

		if (isset($_GET["tarea_id"])) {

			$tabla = "tarea";
			$datos = $_GET["tarea_id"];

			$respuesta = Modelotareas::mdlBorrartarea($tabla, $datos);

			if ($respuesta == "ok") {

				echo '<script>

					swal.fire({
						  type: "success",
						  icon: "success",
						  title: "La categoría ha sido borrada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "tareas";

									}
								})

					</script>';
			}
		}
	}
}
