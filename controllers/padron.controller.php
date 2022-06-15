<?php
class ControladorElectores
{
    /*=============================================
    MOSTRAR ELECTORES
    =============================================*/
    public static function ctrMostrarElectores()
    {
                $tabla = "pad2018";
                $datos = array("nombre" => $_GET["nombre"],
                               "paterno" => $_GET["paterno"],
                               "materno" => $_GET["materno"],
                                "localidad" => $_GET["localidad"],
                                "colonia" => $_GET["colonia"],
                                "calle" => $_GET["calle"]);

                $respuesta = ModeloElectores::MdlMostrarElectores($tabla, $datos);

                return $respuesta;

    }
    /*=============================================
    MOSTRAR ELECTOR
    =============================================*/
    public static function ctrMostrarElector($campo,$valor)
    {
        $respuesta = ModeloElectores::MdlMostrarElector($campo, $valor);
        return $respuesta;

    }
}