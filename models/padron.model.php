<?php

require_once "connection.php";

class ModeloElectores{

    /*=============================================
    MOSTRAR ELECTORES
    =============================================*/

    static public function MdlMostrarElectores($tabla, $datos)
    {
        $stmt = Conexion::padron()->prepare("SELECT * FROM $tabla WHERE nom like :nom and paterno like :paterno and materno like :materno and colonia like :colonia
        and desgeor like :localidad and calle like :calle limit 100");
        $nombre='%'.$datos["nombre"].'%';
        $paterno='%'.$datos["paterno"].'%';
        $materno='%'.$datos["materno"].'%';
        $localidad='%'.$datos["localidad"].'%';
        $colonia='%'.$datos["colonia"].'%';
        $calle='%'.$datos["calle"].'%';
        $stmt->bindParam(":nom", $nombre, PDO::PARAM_STR);
        $stmt->bindParam(":paterno", $paterno, PDO::PARAM_STR);
        $stmt->bindParam(":materno", $materno, PDO::PARAM_STR);
        $stmt->bindParam(":localidad", $localidad, PDO::PARAM_STR);
        $stmt->bindParam(":colonia", $colonia, PDO::PARAM_STR);
        $stmt->bindParam(":calle", $calle, PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->fetchall();

        $stmt->close();

        $stmt = null;
    }
    /*=============================================
    MOSTRAR ELECTOR
    =============================================*/

    static public function MdlMostrarElector($campo, $datos)
    {

        $stmt = Conexion::padron()->prepare("SELECT * FROM pad2018 WHERE id= :id");

        $stmt -> bindParam(":id", $datos, PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->fetch();

        $stmt->close();

        $stmt = null;
    }
}