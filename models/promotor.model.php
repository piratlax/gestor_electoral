<?php

require_once "connection.php";

class ModeloPromotores
{


	//CREAR PROMOTOR
	static public function mdlCrearPromotor($tabla, $datos)
	{
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(usuario, password, perfil, estado, persona_clave, enlace, organizaciones_id) VALUES (:usuario, :password, :perfil, :estado, :persona_clave, :enlace, :organizacion)");

		$stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
		$stmt->bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
		$stmt->bindParam(":persona_clave", $datos["persona_clave"], PDO::PARAM_STR);
		$stmt->bindParam(":enlace", $datos["enlace"], PDO::PARAM_STR);
		$stmt->bindParam(":organizacion", $datos["organizacion"], PDO::PARAM_INT);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt = null;
	}

	//Mostrar Promotores
	static public function mdlMostrarPromotores($tabla, $item, $valor)
	{
		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

			$stmt->execute();

			return $stmt->fetch();
		} else {
			$enlace = $_SESSION["personaClave"];
			if ($_SESSION["perfil"] == 'Administrador') {
				$stmt = Conexion::conectar()->prepare("SELECT * from usuarios as u INNER JOIN personas as p ON u.persona_clave = p.persona_clave INNER JOIN organizaciones ON u.organizaciones_id = organizaciones.id INNER JOIN secciones as s ON p.idseccion=s.id WHERE (u.perfil='promotor');");
			} else {
				$stmt = Conexion::conectar()->prepare("SELECT * from usuarios as u INNER JOIN personas as p ON u.persona_clave = p.persona_clave INNER JOIN organizaciones ON u.organizaciones_id = organizaciones.id INNER JOIN secciones as s ON p.idseccion=s.id WHERE (u.perfil='promotor' AND u.enlace = :enlace);");
				$stmt->bindParam(":enlace", $enlace, PDO::PARAM_STR);
			}
			$stmt->execute();
			return $stmt->fetchAll();
		}
	}
}
