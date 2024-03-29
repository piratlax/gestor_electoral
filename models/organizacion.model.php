<?php

require_once "connection.php";

class ModeloOrganizaciones
{

	// mostrar organizaciones
	static public function mdlMostrarOrganizaciones($tabla, $item, $valor)
	{
		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

			$stmt->execute();

			return $stmt->fetch();
		} else {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt->execute();
			return $stmt->fetchAll();
		}
	}

	//crear organizacion
	static public function mdlCrearOrganizacion($tabla, $valor)
	{

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (organizacion) VALUES (:nombre)");

		$stmt->bindParam(":nombre", $valor, PDO::PARAM_STR);
		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}


		$stmt = null;
	}

	/*=============================================
	ACTUALIZAR ORGANIZACION
	=============================================*/

	static public function mdlEditarOrganizacion($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET organizacion = :organizacion WHERE id = :id");

		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt->bindParam(":organizacion", $datos["organizacion"], PDO::PARAM_STR);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt = null;
	}
	/*=============================================
	BORRAR ORGANIZACION
	=============================================*/

	static public function mdlBorrarOrganizacion($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt->bindParam(":id", $datos, PDO::PARAM_INT);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}



		$stmt = null;
	}
}
