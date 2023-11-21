<?php
require_once "connection.php";

class ModeloPersonas
{
	static public function mdlMostrarPersonas($tabla, $campo, $valor)
	{
		if ($campo != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $campo = :$campo");

			$stmt->bindParam(":" . $campo, $valor, PDO::PARAM_STR);

			$stmt->execute();

			return $stmt->fetch();
		} else {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt->execute();
			return $stmt->fetchAll();
		}
	}
	//CREAR PERSONA
	static public function mdlCrearPersona($tabla, $datos)
	{
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, paterno, materno, direccion, colonia, localidad, ocupacion, celular, email, telefono, persona_clave, foto, inef, inet, latitud, longitud, idseccion) VALUES (:nombre, :paterno, :materno, :direccion, :colonia, :localidad, :ocupacion, :celular, :email, :telefono, :persona_clave, :foto, :inef, :inet, :latitud, :longitud, :idseccion)");

		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":paterno", $datos["paterno"], PDO::PARAM_STR);
		$stmt->bindParam(":materno", $datos["materno"], PDO::PARAM_STR);
		$stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
		$stmt->bindParam(":colonia", $datos["colonia"], PDO::PARAM_STR);
		$stmt->bindParam(":localidad", $datos["localidad"], PDO::PARAM_STR);
		$stmt->bindParam(":ocupacion", $datos["ocupacion"], PDO::PARAM_STR);
		$stmt->bindParam(":celular", $datos["celular"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
		$stmt->bindParam(":persona_clave", $datos["persona_clave"], PDO::PARAM_STR);
		$stmt->bindParam(":foto", $datos["foto"], PDO::PARAM_STR);
		$stmt->bindParam(":inef", $datos["inef"], PDO::PARAM_STR);
		$stmt->bindParam(":inet", $datos["inet"], PDO::PARAM_STR);
		$stmt->bindParam(":latitud", $datos["latitud"], PDO::PARAM_STR);
		$stmt->bindParam(":longitud", $datos["longitud"], PDO::PARAM_STR);
		$stmt->bindParam(":idseccion", $datos["seccion"], PDO::PARAM_INT);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt = null;
	}
}
