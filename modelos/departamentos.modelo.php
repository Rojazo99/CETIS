<?php

require_once "conexion.php";

class ModeloDepartamentos{

	/*=============================================
	MOSTRAR USUARIOS
	=============================================*/

	static public function mdlMostrarDepartamentos($tabla, $item, $valor){

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
	REGISTRO DE USUARIO
	=============================================*/

	static public function mdlIngresarDepartamentos($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(departamento) VALUES (:departamento)");
		$stmt->bindParam(":departamento", $datos["departamento"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;

	}

	

	

	/*=============================================
	BORRAR USUARIO
	=============================================*/

	static public function mdlBorrarDepartamentos($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;


	}

}