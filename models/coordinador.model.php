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

			if ($_SESSION["perfil"] == "Administrador") {
				$stmt = Conexion::conectar()->prepare("SELECT p.id, concat(p.nombre,' ', p.paterno, ' ',p.materno) as nombre, o.organizacion, p.celular, p.colonia, p.email, p.foto, s.numero  from personas as p INNER JOIN usuarios as u ON u.persona_clave = p.persona_clave INNER JOIN organizaciones as o ON o.id=u.organizaciones_id  INNER JOIN secciones as s ON p.idseccion=s.id WHERE perfil='coordinador';");
			} else {
				$stmt = Conexion::conectar()->prepare("SELECT p.id, concat(p.nombre,' ', p.paterno, ' ',p.materno) as nombre, o.organizacion, p.celular, p.colonia, p.email, p.foto, s.numero  from personas as p INNER JOIN usuarios as u ON u.persona_clave = p.persona_clave INNER JOIN organizaciones as o ON o.id=u.organizaciones_id  INNER JOIN secciones as s ON p.idseccion=s.id WHERE perfil='coordinador' AND u.enlace=" . $_SESSION('persona_clave') . ";");
			}
			$stmt->execute();
			return $stmt->fetchAll();
		}
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
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(tipo, organizaciones_id, usuario, password, perfil, estado, persona_clave, enlace) VALUES (:tipo, :idorganizacion, :usuario, :password, :perfil, :estado, :persona_clave, :enlace)");

		$stmt->bindParam(":tipo", $datos["tipo"], PDO::PARAM_STR);
		$stmt->bindParam(":idorganizacion", $datos["organizacion"], PDO::PARAM_INT);
		$stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
		$stmt->bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
		$stmt->bindParam(":persona_clave", $datos["persona_clave"], PDO::PARAM_STR);
		$stmt->bindParam(":enlace", $datos["enlace"], PDO::PARAM_STR);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt = null;
	}
}
