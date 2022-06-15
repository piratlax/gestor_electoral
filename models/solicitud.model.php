<?php

require_once "connection.php";

class ModeloSolicitudes{

	// mostrar solicitudes
    static public function mdlMostrarSolicitudes($tabla, $item, $valor){
        if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();
      
		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();
			return $stmt -> fetchAll();

		}
	}

	//crear solicitud
	static public function mdlCrearSolicitud($tabla, $valor){
		
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (solicitud, descripcion) VALUES (:solicitud, :descripcion)");

		$stmt->bindParam(":solicitud", $valor["solicitud"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion", $valor["descripcion"], PDO::PARAM_STR);
		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;
	}

	/*=============================================
	ACTUALIZAR ORGANIZACION
	=============================================*/

	static public function mdlEditarOrganizacion($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET organizacion = :organizacion WHERE id = :id");

		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt->bindParam(":organizacion", $datos["organizacion"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}
	/*=============================================
	BORRAR ORGANIZACION
	=============================================*/

	static public function mdlBorrarOrganizacion($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;


	}
}