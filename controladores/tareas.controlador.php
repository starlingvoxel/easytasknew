<?php

class ControladorTareas
{

	/*=============================================
	CREAR tareaS
	=============================================*/

	static public function ctrCrearTareas()
	{

		if (isset($_POST["nuevaDescripcion"])) {


			date_default_timezone_set('America/Santo_Domingo');
			$tabla = "task";
			$opcionesSeleccionadas = $_POST['nuevoTecnico'];
			$fechahoraactual = date('Y-m-d H:i:s');
			$datos = array(
				"tipo_caso" => $_POST["nuevoTipoCaso"],
				"descripcion" => $_POST["nuevaDescripcion"],
				"inicio" => $fechahoraactual,
				"fecha_listo" => NULL,
				"prioridad" => $_POST["nuevaPrioridad"],
				"tarea_departamento_id" => $_POST["nuevoDepartamento"],
				"estatus" => "3",
				"nota" => $_POST["nuevaNota"]
			);

			$respuestaUltimoID = "ok";
			$respuestaUltimoID = ModeloTareas::mdlIngresarTareas($tabla, $datos);

			$respuestafinal = "ok";
			foreach ($opcionesSeleccionadas as $datoTecnico) {
				$datoTecnico1 = array(
					"id_tarea" => $respuestaUltimoID,
					"id_tecnico" => $datoTecnico
				);

				$respuestafinal = ModeloTareas::mdlIngresarTecnicoAsignado($datoTecnico1);
			}
			if ($respuestafinal == "ok") {

				echo '<script>

				swal.fire({
					icon: "success",
					title: "Tarea guardada correctamente",
					showConfirmButton: true,
					confirmButtonText: "Cerrar",
					allowOutsideClick: false,
					timer: 2000, // Redirige después de 3 segundos
					timerProgressBar: true
				}).then(function(result) {
					// Si el usuario presiona el botón de confirmación
					if (result.value) {
						window.location = "tareas";
					}
				});

				// Redirección automática sin necesidad de hacer clic en "Cerrar"
				setTimeout(function() {
					window.location = "tareas";
				}, 2000); // Redirige automáticamente después de 3 segundos (3000 milisegundos) 
							</script>';
			}
		}
	}

	/*=============================================
	MOSTRAR tareaS
	=============================================*/

	static public function ctrMostrarTareas($item, $valor)
	{

		$tabla = "task";

		$respuesta = Modelotareas::mdlMostrartarea($tabla, $item, $valor);

		return $respuesta;
	}
	static public function ctrActualizarEstado($item, $valor)
	{

		$tabla = "task";

		$respuesta = Modelotareas::mdlActualizarEstado($tabla, $item, $valor);
		echo $respuesta;
		return $respuesta;
	}

	/*=============================================
	MOSTRAR tareaS
	=============================================*/

	static public function ctrMostrarTareasTecnico($item, $valor)
	{

		$tabla = "task";

		$respuesta = Modelotareas::mdlMostrarTareaTecnico($tabla, $item, $valor);

		return $respuesta;
	}

	static public function ctrMostrarTareasTecnicoMes($item, $valor)
	{

		$tabla = "task";

		$respuesta = Modelotareas::mdlMostrarTareaTecnicoMes($tabla, $item, $valor);

		return $respuesta;
	}
	/*=============================================
	MOSTRAR TAREAS DE CADA TECNICO PARA EL MODULO DE VIEW-TECNICOS
	=============================================*/
	static public function ctrMostrarTareaPorTecnico($valor)
	{

		$respuesta = Modelotareas::mdlMostrarTareaPorTecnico($valor);

		return $respuesta;
	}

	static public function ctrMostrarTareasTecnicoID($item, $valor)
	{

		$tabla = "task";

		$respuesta = Modelotareas::mdlMostrarTareaTecnicoID($tabla, $item, $valor);

		return $respuesta;
	}
	public static function ctrMostrarCantidadTareasTecnico()
	{
		return ModeloTareas::mdlMostrarCantidadTareasTecnico();
	}
	public static function ctrObtenerDatosParaDonut()
	{
		return ModeloTareas::mdlObtenerDatosParaDonut();
	}
	public static function ctrContarTareasPorEstado()
	{
		return ModeloTareas::mdlContarTareasPorEstado();
	}


	/*=============================================
	BORRAR TECNICO ASIGNADO
	=============================================*/
	// Método para eliminar los técnicos asignados previamente
	static public function ctrBorrarTecnicosAsignados($id_tarea)
	{
		$respuesta = ModeloTareas::mdlBorrarTecnicosAsignados($id_tarea);
		return $respuesta;
	}
	static public function ctrEditartarea()
	{

		if (isset($_POST["editarDescripcion"])) {



			$tabla = "task";
			$opcionesSeleccionadas = $_POST['editarTecnico'];
			$datos = array(
				"tarea_id" => $_POST["idTarea"],
				"tipo_caso" => $_POST["editarTipocaso"],
				"descripcion" => $_POST["editarDescripcion"],
				"prioridad" => $_POST["editarPrioridad"],
				"nota" => $_POST["editarNota"],
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
			$respuesta = Modelotareas::mdlEditartarea($datos);
			if ($respuesta == "ok") {

				echo '<script>

				   swal.fire({
        icon: "success",
        title: "Tarea guardada correctamente",
        showConfirmButton: true,
        confirmButtonText: "Cerrar",
		allowOutsideClick: false,
        timer: 2000, // Redirige después de 3 segundos
        timerProgressBar: true
    }).then(function(result) {
        // Si el usuario presiona el botón de confirmación
        if (result.value) {
            window.location = "tareas";
        }
    });

    // Redirección automática sin necesidad de hacer clic en "Cerrar"
    setTimeout(function() {
        window.location = "tareas";
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
