<?php

require_once "connection.php";

class ModeloUsuarios
{

	static public function mdlCrearUsuario($tabla, $datos)
	{
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(usuario, password, perfil, estado, persona_clave) VALUES (:usuario, :password, :perfil, :estado, :persona_clave)");

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

		$stmt = null;
	}
	static public function mdlMostrarUsuarios($tabla, $campo, $valor)
	{
		if ($campo != null) {

			$stmt = Conexion::conectar()->prepare("SELECT p.id, p.persona_clave as persona_clave, concat(p.nombre, ' ',p.paterno,' ',p.materno) as nombre, concat(p.direccion,' ',p.colonia) as direccion, p.localidad as localidad, u.usuario as usuario, p.foto as foto, u.perfil as perfil, u.estado as estado, u.ultimo_login as login,  p.inef as inef, p.inet as inet, p.ocupacion as ocupacion, u.password as password, u.organizaciones_id as organizaciones_id FROM usuarios as u INNER JOIN personas as p ON u.persona_clave=p.persona_clave WHERE u.$campo = :$campo; ");

			$stmt->bindParam(":" . $campo, $valor, PDO::PARAM_STR);

			$stmt->execute();

			return $stmt->fetch();
		} else {

			$stmt = Conexion::conectar()->prepare("SELECT p.id, p.persona_clave as persona_clave, concat(p.nombre, ' ',p.paterno,' ',p.materno) as nombre, u.usuario as usuario, p.foto as foto, u.perfil as perfil, u.estado as estado, u.ultimo_login as login FROM usuarios as u INNER JOIN personas as p ON u.persona_clave=p.persona_clave WHERE (perfil='capturista' OR perfil='Administrador'); ");

			$stmt->execute();
			return $stmt->fetchAll();
		}
	}

	static public function mdlIngresarUsuario($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, usuario, password, perfil, foto) VALUES (:nombre, :usuario, :password, :perfil, :foto)");

		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
		$stmt->bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);
		$stmt->bindParam(":foto", $datos["foto"], PDO::PARAM_STR);
		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}


		$stmt = null;
	}
	/*=============================================
	EDITAR USUARIO
	=============================================*/

	static public function mdlEditarUsuario($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, password = :password, perfil = :perfil, foto = :foto WHERE usuario = :usuario");

		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
		$stmt->bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);
		$stmt->bindParam(":foto", $datos["foto"], PDO::PARAM_STR);
		$stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}


		$stmt = null;
	}
	/*=============================================
	ACTUALIZAR USUARIO
	=============================================*/

	static public function mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2)
	{

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

		$stmt->bindParam(":" . $item1, $valor1, PDO::PARAM_STR);
		$stmt->bindParam(":" . $item2, $valor2, PDO::PARAM_STR);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}


		$stmt = null;
	}
	/*=============================================
	BORRAR USUARIO
	=============================================*/

	static public function mdlBorrarUsuario($tabla, $datos)
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
