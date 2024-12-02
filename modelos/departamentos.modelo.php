<?php

require_once "conexion.php";

class ModeloDepartamentos{

	/*=============================================
	CREAR departamento
	=============================================*/

	static public function mdlIngresarDepartamento($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(descripcion) VALUES (:descripcion)");
        $sql = "INSERT INTO $tabla (descripcion) VALUES ('$datos')";
		$stmt->bindParam(":descripcion", $datos, PDO::PARAM_STR);
		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;
	}

	/*=============================================
	MOSTRAR Departamento
	=============================================*/

	static public function mdlMostrarDepartamento($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	EDITAR departamento
	=============================================*/

	static public function mdlEditarDepartamento($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET descripcion = :descripcion WHERE departamento_id = :departamento_id");

		$stmt -> bindParam(":descripcion", $datos["departamento"], PDO::PARAM_STR);
		$stmt -> bindParam(":departamento_id", $datos["id"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	BORRAR departamento
	=============================================*/

	static public function mdlBorrarDepartamento($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE departamento_id = :departamento_id");

		$stmt -> bindParam(":departamento_id", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

}

