<?php

require_once "conexion.php";

class ModeloTareas
{

	/*=============================================
	CREAR tarea
	=============================================*/

	static public function mdlIngresarTareas($tabla, $datos)
	{
		$conn = Conexion::conectar();
		$stmt = $conn->prepare("INSERT INTO $tabla(tipo_caso,descripcion, inicio, fecha_listo, prioridad, tarea_departamento_id, estatus, nota) VALUES (:tipo_caso, :descripcion, :inicio, :fecha_listo, :prioridad, :tarea_departamento_id, :estatus, :nota)");

		$stmt->bindParam(":tipo_caso", $datos["tipo_caso"], PDO::PARAM_INT);
		$stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":inicio", $datos["inicio"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_listo", $datos["fin"], PDO::PARAM_STR);
		$stmt->bindParam(":prioridad", $datos["prioridad"], PDO::PARAM_INT);
		$stmt->bindParam(":tarea_departamento_id", $datos["tarea_departamento_id"], PDO::PARAM_INT);
		$stmt->bindParam(":estatus", $datos["estatus"], PDO::PARAM_STR);
		$stmt->bindParam(":nota", $datos["nota"], PDO::PARAM_STR);

		if ($stmt->execute()) {
			// Obtener el último ID insertado
			$lastId = $conn->lastInsertId();
			echo "Inserción exitosa", $lastId;
			// Retornar el último ID
			return $lastId;
		} else {

			return "error";
		}

		$stmt->close();
		$stmt = null;
	}
	/*=============================================
	INGRESO DEL TECNICO ASIGNADO
	=============================================*/
	static public function mdlIngresarTecnicoAsignado($datos)
	{

		$stmt = Conexion::conectar()->prepare("INSERT INTO tarea_tecnico_asignado(id_tecnico, id_tarea) VALUES (:id_tecnico, :id_tarea)");


		$stmt->bindParam(":id_tecnico", $datos["id_tecnico"], PDO::PARAM_INT);
		$stmt->bindParam(":id_tarea", $datos["id_tarea"], PDO::PARAM_INT);

		if ($stmt->execute()) {

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

	static public function mdlMostrarTarea($tabla, $item, $valor)
	{

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

			$stmt->execute();

			return $stmt->fetch();
		} else {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY tarea_id DESC");

			$stmt->execute();

			return $stmt->fetchAll();
		}

		$stmt->close();

		$stmt = null;
	}
	/*=============================================
	MOSTRAR CANTIDAD DE TAREAS POR TECNICO
	=============================================*/
	static public  function mdlMostrarCantidadTareasTecnico()
	{
		$stmt = Conexion::conectar()->prepare("SELECT tec.nombre, COUNT(*) AS total_tareas FROM tarea_tecnico_asignado tt JOIN task t ON tt.id_tarea = t.tarea_id JOIN usuarios tec ON tt.id_tecnico = tec.id GROUP BY tec.nombre;");
		$stmt->execute();
		return $stmt->fetchAll(); // Retorna los resultados como un array
	}

	/*=============================================
	MOSTRAR LOS DEPARTAMENTOS QUE MAS SE VISITAN
	=============================================*/

	static public function mdlObtenerDatosParaDonut()
	{
		$stmt = Conexion::conectar()->prepare("SELECT d.descripcion, COUNT(t.tarea_id) AS total_tareas FROM task t JOIN departamento d ON t.tarea_departamento_id = d.departamento_id WHERE MONTH(t.inicio) = MONTH(CURRENT_DATE()) AND YEAR(t.inicio) = YEAR(CURRENT_DATE()) GROUP BY d.descripcion ORDER BY total_tareas DESC LIMIT 5;");
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC); // Devolvemos los resultados como un array asociativo
	}
	/*=============================================
	MOSTRAR TODAS LAS TAREAS
	=============================================*/

	static public function mdlMostrarTareaTecnico($tabla, $item, $valor)
	{
		if ($valor != null) {
			$item = "id_tarea";
			$stmt = Conexion::conectar()->prepare("SELECT * FROM tarea_tecnico_asignado WHERE $item = :$item");

			$stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

			$stmt->execute();

			return $stmt->fetchAll();
		} else {

			$stmt = Conexion::conectar()->prepare("SELECT t.tarea_id AS tarea_id, t.tipo_caso AS tipo_caso, t.tarea_departamento_id AS tarea_departamento_id, t.descripcion AS descripcion, t.inicio AS inicio, t.prioridad AS prioridad, t.estatus AS estado, GROUP_CONCAT(tec.nombre SEPARATOR '-') AS tecnicos_asignados FROM task t JOIN tarea_tecnico_asignado tt ON t.tarea_id = tt.id_tarea JOIN usuarios tec ON tt.id_tecnico = tec.id GROUP BY t.tarea_id  ORDER BY 
    t.tarea_id DESC;");

			$stmt->execute();

			return $stmt->fetchAll();
		}




		$stmt->close();

		$stmt = null;
	}

	/*=============================================
	MOSTRAR TODAS LAS TAREAS DEL MES ACTUAL
	=============================================*/

	static public function mdlMostrarTareaTecnicoMes($tabla, $item, $valor)
	{

		$stmt = Conexion::conectar()->prepare("SELECT 
    t.tarea_id AS tarea_id, 
    t.tipo_caso AS tipo_caso, 
    t.tarea_departamento_id AS tarea_departamento_id, 
    t.descripcion AS descripcion, 
    t.inicio AS inicio, 
    t.prioridad AS prioridad, 
    t.estatus AS estado, 
    GROUP_CONCAT(tec.nombre SEPARATOR '-') AS tecnicos_asignados 
FROM 
    task t 
JOIN 
    tarea_tecnico_asignado tt ON t.tarea_id = tt.id_tarea 
JOIN 
    usuarios tec ON tt.id_tecnico = tec.id 
WHERE 
    (MONTH(t.inicio) = MONTH(CURDATE()) AND YEAR(t.inicio) = YEAR(CURDATE())) 
    OR (MONTH(t.inicio) != MONTH(CURDATE()) AND t.estatus != 2)
GROUP BY 
    t.tarea_id  
ORDER BY 
    t.tarea_id DESC;
");

		$stmt->execute();

		return $stmt->fetchAll();
		$stmt->close();

		$stmt = null;
	}
	/*=============================================
	MOSTRAR TAREAS POR TENICO Y ID
	=============================================*/
	static public function mdlMostrarTareaTecnicoID($tabla, $item, $valor)
	{

		$item = "id_tarea";
		$stmt = Conexion::conectar()->prepare("SELECT * FROM tarea_tecnico_asignado WHERE $item = :$item");

		$stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();

		$stmt = null;
	}
	/*=============================================
	MOSTRAR TAREAS POR TENICO Y ID
	=============================================*/
	static public function mdlMostrarTareaPorTecnico($valor)
	{

		$stmt = Conexion::conectar()->prepare("SELECT t.* 
		FROM tarea_tecnico_asignado AS tta 
		JOIN task AS t ON tta.id_tarea = t.tarea_id 
		WHERE tta.id_tecnico = :id_tecnico 
		AND MONTH(t.inicio) = MONTH(CURRENT_DATE())
		AND YEAR(t.inicio) = YEAR(CURRENT_DATE())
		ORDER BY t.tarea_id DESC;");

		
		$stmt->bindParam(":id_tecnico", $valor, PDO::PARAM_INT);

		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();

		$stmt = null;
	}
	/*=============================================
	CONTAR TAREAS POR ESTADO
	=============================================*/
	static public function mdlContarTareasPorEstado()
	{
		// Preparar la consulta SQL
		$stmt = Conexion::conectar()->prepare("SELECT estatus, COUNT(*) AS total_tareas FROM task GROUP BY estatus;");

		// Ejecutar la consulta
		$stmt->execute();

		// Retornar los resultados como un array asociativo
		return $stmt->fetchAll(PDO::FETCH_ASSOC);

		// Cerrar la conexión
		$stmt->close();
		$stmt = null;
	}



	/*=============================================
	EDITAR TAREAS
	=============================================*/
	static public function mdlEditarTarea($datos)
	{

		// Construir la consulta dinámicamente según los datos proporcionados
		$consulta = "UPDATE task SET ";
		$parametros = [];

		if (isset($datos["tipo_caso"])) {
			$consulta .= "tipo_caso = :tipocaso, ";
			$parametros[":tipocaso"] = $datos["tipo_caso"];
		}

		if (isset($datos["descripcion"])) {
			$consulta .= "descripcion = :descripcion, ";
			$parametros[":descripcion"] = $datos["descripcion"];
		}

		if (isset($datos["prioridad"])) {
			$consulta .= "prioridad = :prioridad, ";
			$parametros[":prioridad"] = $datos["prioridad"];
		}
		if (isset($datos["nota"])) {
			$consulta .= "nota = :nota, ";
			$parametros[":nota"] = $datos["nota"];
		}
		if (isset($datos["tarea_departamento_id"])) {
			$consulta .= "tarea_departamento_id = :tarea_departamento_id, ";
			$parametros[":tarea_departamento_id"] = $datos["tarea_departamento_id"];
		}

		// Eliminar la última coma y agregar la condición WHERE
		$consulta = rtrim($consulta, ', ') . " WHERE tarea_id = :tarea_id";
		$parametros[":tarea_id"] = $datos["tarea_id"];

		// Preparar la consulta
		$stmt = Conexion::conectar()->prepare($consulta);

		// Asignar los valores de los parámetros
		foreach ($parametros as $clave => $valor) {
			$stmt->bindValue($clave, $valor, is_int($valor) ? PDO::PARAM_INT : PDO::PARAM_STR);
		}

		// Ejecutar la consulta y retornar el resultado
		if ($stmt->execute()) {
			return "ok";
		} else {
			// Mostrar errores si la consulta falla
			print_r($stmt->errorInfo());
			return "error";
		}

		// Cerrar el statement
		$stmt->close();
		$stmt = null;
	}
	/*=============================================
	ELIMINAR TECNICO ASIGNADO
	=============================================*/
	static public function mdlBorrarTecnicosAsignados($id_tarea)
	{
		$stmt = Conexion::conectar()->prepare("DELETE FROM tarea_tecnico_asignado WHERE id_tarea = :id_tarea");
		$stmt->bindParam(":id_tarea", $id_tarea["id_tarea"], PDO::PARAM_INT);

		if ($stmt->execute()) {
			return "ok";
		} else {
			return "error";
		}

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
