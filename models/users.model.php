<?php

require_once "connection.php";

class ModeloUsuarios
{

	static public function mdlCrearUsuario($tabla, $datos)
	{
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(usuario, password, perfil, estado, persona_clave, enlace, foto, organizaciones_id) VALUES (:usuario, :password, :perfil, :estado, :persona_clave, :enlace, :foto, :organizaciones_id)");

		$stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
		$stmt->bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
		$stmt->bindParam(":persona_clave", $datos["persona_clave"], PDO::PARAM_STR);
		$stmt->bindParam(":enlace", $datos["enlace"], PDO::PARAM_STR);
		$stmt->bindParam(":foto", $datos["foto"], PDO::PARAM_STR);
		$stmt->bindParam(":organizaciones_id", $datos["organizacion_id"], PDO::PARAM_INT);

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

			$stmt = Conexion::conectar()->prepare("SELECT u.id, concat(p.nombre, ' ',p.paterno,' ',p.materno) as nombre, u.usuario as usuario, u.password as password, u.persona_clave, u.foto as foto, u.perfil as perfil, u.estado as estado, o.organizacion as organizacion,u.organizaciones_id,p.idseccion FROM usuarios as u  INNER JOIN personas as p ON u.persona_clave=p.persona_clave INNER JOIN organizaciones as o ON u.organizaciones_id=o.id WHERE u.$campo = :$campo; ");

			$stmt->bindParam(":" . $campo, $valor, PDO::PARAM_STR);

			$stmt->execute();

			return $stmt->fetch();
		} else {

			$stmt = Conexion::conectar()->prepare("SELECT u.id, concat(p.nombre, ' ',p.paterno,' ',p.materno) as nombre, u.usuario as usuario, u.foto as foto, u.perfil as perfil, u.estado as estado, u.ultimo_login, o.organizacion as organizacion FROM usuarios as u INNER JOIN personas as p ON u.persona_clave=p.persona_clave INNER JOIN organizaciones as o ON u.organizaciones_id=o.id ");

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

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET password = :password, perfil = :perfil, foto = :foto WHERE id = :id");


		$stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
		$stmt->bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);
		$stmt->bindParam(":foto", $datos["foto"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);


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
