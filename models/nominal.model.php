<?php

require_once "connection.php";

class ModeloNominal
{

	// mostrar listados nominales
	static public function mdlMostrarNominal($tabla, $item, $valor)
	{
		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT n.id, n.nombre, n.paterno, n.materno, n.curp, s.numero FROM $tabla AS n INNER JOIN secciones as s ON n.idseccion=s.id WHERE n.$item = :$item");

			$stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

			$stmt->execute();

			return $stmt->fetch();
		} else {

			$stmt = Conexion::conectar()->prepare("SELECT n.id, n.nombre, n.paterno, n.materno, n.curp, s.numero FROM $tabla AS n INNER JOIN secciones as s ON n.idseccion=s.id");

			$stmt->execute();
			return $stmt->fetchAll();
		}
	}

	//crear integrante al listado nominal
	static public function mdlCrearNominal($tabla, $valor)
	{

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre, paterno, materno, curp, idseccion) VALUES (:nombre, :paterno, :materno, :curp, :idseccion)");

		$stmt->bindParam(":nombre", $valor["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":paterno", $valor["paterno"], PDO::PARAM_STR);
		$stmt->bindParam(":materno", $valor["materno"], PDO::PARAM_STR);
		$stmt->bindParam(":curp", $valor["curp"], PDO::PARAM_STR);
		$stmt->bindParam(":idseccion", $valor["idseccion"], PDO::PARAM_INT);
		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt = null;
	}

	/*=============================================
	ACTUALIZAR NOMINAL
	=============================================*/

	static public function mdlEditarNominal($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, paterno = :paterno, materno = :materno, curp = :curp, idseccion = :idseccion WHERE id = :id");


		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":paterno", $datos["paterno"], PDO::PARAM_STR);
		$stmt->bindParam(":materno", $datos["materno"], PDO::PARAM_STR);
		$stmt->bindParam(":curp", $datos["curp"], PDO::PARAM_STR);
		$stmt->bindParam(":idseccion", $datos["idseccion"], PDO::PARAM_INT);
		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt = null;
	}
	/*=============================================
	BORRAR NOMINAL
	=============================================*/

	static public function mdlBorrarNominal($tabla, $datos)
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
