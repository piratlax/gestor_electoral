<?php

require_once "connection.php";

class ModeloCoordinadores
{

	//Mostrar Coordinadores
	static public function mdlMostrarCoordinadores($tabla, $item, $valor)
	{
		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

			$stmt->execute();

			return $stmt->fetch();
		} else {

			$stmt = Conexion::conectar()->prepare("SELECT * from usuarios as u INNER JOIN personas as p ON u.persona_clave = p.persona_clave WHERE perfil='Coordinador';");

			$stmt->execute();
			return $stmt->fetchAll();
		}
	}
	//MOSTRAR ENLACES
	static public function mdlMostrarEnlaces($tabla)
	{


		$stmt = Conexion::conectar()->prepare("SELECT c.idelector, p.nom, p.paterno, p.materno FROM $tabla as c INNER JOIN pad2018 as p on c.idelector=p.id;");

		$stmt->execute();
		return $stmt->fetchAll();
	}
	//MOSTRAR ORGANIZACIONES
	static public function mdlMostrarOrganizacion($tabla)
	{


		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

		$stmt->execute();
		return $stmt->fetchAll();
	}
	//CREAR COORDINADOR
	static public function mdlCrearCoordinador($tabla, $datos)
	{
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(tipo, organizaciones_id, usuario, password, perfil, estado, persona_clave) VALUES (:tipo, :idorganizacion, :usuario, :password, :perfil, :estado, :persona_clave)");

		$stmt->bindParam(":tipo", $datos["tipo"], PDO::PARAM_STR);
		//$stmt->bindParam(":idorganizacion", $datos["organizacion"], PDO::PARAM_INT);
		$stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
		$stmt->bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
		$stmt->bindParam(":persona_clave", $datos["persona_clave"], PDO::PARAM_STR);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt->close();
		$stmt = null;
	}
}
