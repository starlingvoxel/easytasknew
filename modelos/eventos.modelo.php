<?php

require_once "conexion.php";


class ModeloEventos
{

	/*=============================================
	CREAR tarea
	=============================================*/

	static public function mdlIngresarEventos($datos)
	{
		$conn = Conexion::conectar();
		$stmt = $conn->prepare("INSERT INTO eventos (id_tarea_evento, evento, lugar, solicitante, fecha_inicio, fecha_fin)
                                        VALUES (:id_tarea_evento, :evento, :lugar, :solicitante, :fecha_inicio, :fecha_fin)");


            $stmt->bindParam(":id_tarea_evento",  $datos["id_tarea_evento"], PDO::PARAM_INT);
            $stmt->bindParam(":evento", $datos["evento"], PDO::PARAM_STR);
            $stmt->bindParam(":lugar", $datos["lugar"], PDO::PARAM_STR);
            $stmt->bindParam(":solicitante", $datos["solicitante"], PDO::PARAM_STR);
			
            $stmt->bindParam(":fecha_inicio", $datos["fecha_listo"], PDO::PARAM_STR);
            $stmt->bindParam(":fecha_fin", $datos["fecha_fin"], PDO::PARAM_STR);

		if ($stmt->execute()) {
			// Obtener el último ID insertado
			
			// Retornar el último ID
			return "ok";
		} else {

			return "error";
		}

		$stmt->close();
		$stmt = null;
	}

	/*=============================================
	MOSTRAR TAREA
	=============================================*/

	static public function mdlMostrarEvento($tabla, $item, $valor)
	{

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

			$stmt->execute();

			return $stmt->fetch();
		} else {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id_evento DESC");

			$stmt->execute();

			return $stmt->fetchAll();
		}

		$stmt->close();

		$stmt = null;
	}
	

	/*=============================================
	EDITAR Eventos
	=============================================*/
	static public function mdlEditarEvento($datos){

		$conn = Conexion::conectar();
		$stmt = $conn->prepare("UPDATE eventos 
								SET 
									evento = :evento, 
									lugar = :lugar, 
									solicitante = :solicitante, 
									fecha_inicio = :fecha_inicio, 
									fecha_fin = :fecha_fin
								WHERE id_evento = :id_evento"); // Asegúrate de ajustar la clave primaria
		
		// Vincular los parámetros
		
		$stmt->bindParam(":evento", $datos["evento"], PDO::PARAM_STR);
		$stmt->bindParam(":lugar", $datos["lugar"], PDO::PARAM_STR);
		$stmt->bindParam(":solicitante", $datos["solicitante"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_inicio", $datos["fecha_listo"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_fin", $datos["fecha_fin"], PDO::PARAM_STR);
		$stmt->bindParam(":id_evento", $datos["idEvento"], PDO::PARAM_INT); // Identificador del evento a actualizar
		
		// Ejecutar y verificar el resultado
		if ($stmt->execute()) {
			return "ok";
		} else {
			return "error";
		}
		
		// Cerrar la conexión
		$stmt->close();
		$stmt = null;
		

	}
	/*=============================================
	ACTUALIZAR EL ESTADO DE LA TAREA MEDIANTE AJAX
	=============================================*/
	static public function mdlActualizarEstado($tabla, $item, $valor)
	{

		$estado = $valor;
		$tarea_id = $item;

		// Si el estado es 'Listo' (asumiendo que el valor 2 representa 'Listo')
		if ($estado == 2) {
			// Actualiza tanto el estado como la fecha actual
			$query = "UPDATE $tabla SET estatus = :estado, fecha_listo = NOW() WHERE tarea_id = :tarea_id";
		} else {
			// Solo actualiza el estado
			$query = "UPDATE $tabla SET estatus = :estado WHERE tarea_id = :tarea_id";
		}

		$stmt = Conexion::conectar()->prepare($query);
		$stmt->bindParam(':estado', $estado, PDO::PARAM_INT);
		$stmt->bindParam(':tarea_id', $tarea_id, PDO::PARAM_INT);

		if ($stmt->execute()) {
			echo "success";
		} else {
			echo "error";
		}
	}

	/*=============================================
	BORRAR TAREA (NO UTILIZADO EN ESTE MODULO)
	=============================================*/

	static public function mdlBorrarTarea($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE tarea_id = :tarea_id");

		$stmt->bindParam(":tarea_id", $datos, PDO::PARAM_INT);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt->close();

		$stmt = null;
	}
}
