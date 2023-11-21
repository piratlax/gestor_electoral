<?php

require_once "connection.php";

class ModeloPromovidos
{


	//CREAR PROMOVIDO
	static public function mdlCrearPromovido($tabla, $datos)
	{
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(enlace_clave, persona_clave, ine, id_solicitud, detalle_sol, id_problematica, detalle_prob) VALUES (:enlace_clave, :persona_clave, :ine, :id_solicitud, :detalle_sol, :id_problematica, :detalle_prob)");

		$stmt->bindParam(":enlace_clave", $datos["enlace_clave"], PDO::PARAM_STR);
		$stmt->bindParam(":persona_clave", $datos["persona_clave"], PDO::PARAM_STR);
		$stmt->bindParam(":ine", $datos["ine"], PDO::PARAM_STR);
		$stmt->bindParam(":id_solicitud", $datos["id_solicitud"], PDO::PARAM_INT);
		$stmt->bindParam(":detalle_sol", $datos["detalle_sol"], PDO::PARAM_STR);
		$stmt->bindParam(":id_problematica", $datos["id_problematica"], PDO::PARAM_INT);
		$stmt->bindParam(":detalle_prob", $datos["detalle_prob"], PDO::PARAM_STR);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt = null;
	}

	//Mostrar Promovidos
	static public function mdlMostrarPromovidos($tabla, $item, $valor)
	{
		if ($item != null) {
		} else {
			$enlace = $_SESSION["personaClave"];
			if ($_SESSION["perfil"] == 'Administrador') {
				$stmt = Conexion::conectar()->prepare("SELECT p.id as id, concat(persona.nombre,' ',persona.paterno,' ',persona.materno) as nombre, persona.direccion as direccion, persona.colonia as colonia, secciones.numero as seccion, persona.celular as celular, persona.foto as foto, concat (e.nombre, ' ',e.paterno,' ',e.materno) as enlace  FROM promovidos as p inner join personas as persona on p.persona_clave = persona.persona_clave inner join personas as e on e.persona_clave=p.enlace_clave INNER JOIN usuarios as u ON e.persona_clave=u.persona_clave  INNER JOIN secciones ON persona.idseccion=secciones.id");
			} else {
				$stmt = Conexion::conectar()->prepare("SELECT p.id as id, concat(persona.nombre,' ',persona.paterno,' ',persona.materno) as nombre, persona.direccion as direccion, persona.colonia as colonia, secciones.numero as seccion, persona.celular as celular, persona.foto as foto, concat (e.nombre, ' ',e.paterno,' ',e.materno) as enlace, o.organizacion as organizacion FROM promovidos as p inner join personas as persona on p.persona_clave = persona.persona_clave inner join personas as e on e.persona_clave=p.enlace_clave INNER JOIN usuarios as u ON e.persona_clave=u.persona_clave  INNER JOIN secciones ON persona.idseccion=secciones.id INNER JOIN organizaciones as o ON u.organizaciones_id=o.id WHERE e.persona_clave=:enlace");
				$stmt->bindParam(":enlace", $enlace, PDO::PARAM_STR);
			}
			$stmt->execute();
			return $stmt->fetchAll();
		}
	}
}
