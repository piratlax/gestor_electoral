<?php

require_once "connection.php";

class ModeloSeccionales
{

	// mostrar solicitudes
	static public function mdlMostrarSeccionales($tabla, $item, $valor)
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

	//crear solicitud
	static public function mdlCrearSeccional($tabla, $valor)
	{

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (numero, tipo_casilla,ubicacion,zona) VALUES (:numero, :tipo_casilla,:ubicacion,:zona)");

		$stmt->bindParam(":numero", $valor["numero"], PDO::PARAM_STR);
		$stmt->bindParam(":tipo_casilla", $valor["tipo_casilla"], PDO::PARAM_STR);
		$stmt->bindParam(":ubicacion", $valor["ubicacion"], PDO::PARAM_STR);
		$stmt->bindParam(":zona", $valor["zona"], PDO::PARAM_STR);
		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt = null;
	}

	/*=============================================
	ACTUALIZAR SECCIONAL
	=============================================*/

	static public function mdlEditarSeccional($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET numero = :numero, tipo_casilla = :tipo_casilla, ubicacion = :ubicacion, zona = :zona WHERE id = :id");


		$stmt->bindParam(":numero", $datos["numero"], PDO::PARAM_STR);
		$stmt->bindParam(":tipo_casilla", $datos["tipo_casilla"], PDO::PARAM_STR);
		$stmt->bindParam(":ubicacion", $datos["ubicacion"], PDO::PARAM_STR);
		$stmt->bindParam(":zona", $datos["zona"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
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

	static public function mdlBorrarSeccionales($tabla, $datos)
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
