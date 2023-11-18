<?php

class ControladorPromovidos
{

    //CREAR PROMOVIDO
    public static function ctrCrearPromovido()
    {

        if (isset($_POST["nombre"]) && isset($_POST["problematica"])) {
            //creamos clave unica
            $azar = mt_rand(1000, 99999);
            $persona_clave = $azar . $_POST["nombre"];

            /*=============================================
        CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LAS IMAGENES
        =============================================*/

            $directorio = "views/img/users/" . $persona_clave;

            mkdir($directorio, 0755);
            /*=============================================
            VALIDAR foto
            =============================================*/

            $ruta = "";
            // imagen de perfil
            if (is_uploaded_file($_FILES['fotoPromovido']['tmp_name'])) {

                list($ancho, $alto) = getimagesize($_FILES["fotoPromovido"]["tmp_name"]);

                $nuevoAncho = 500;
                $nuevoAlto = 500;



                /*=============================================
                DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
                =============================================*/
                if ($_FILES["fotoPromovido"]["type"] == "image/jpeg") {


                    /*=============================================
                    GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                    =============================================*/

                    $aleatorio = mt_rand(100, 999);

                    $ruta = "views/img/users/" . $persona_clave . "/" . $aleatorio . ".jpg";

                    $origen = imagecreatefromjpeg($_FILES["fotoPromovido"]["tmp_name"]);

                    $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                    imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                    imagejpeg($destino, $ruta);
                }

                if ($_FILES["fotoPromovido"]["type"] == "image/png") {

                    /*=============================================
                    GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                    =============================================*/

                    $aleatorio = mt_rand(100, 999);

                    $ruta = "views/img/users/" . $persona_clave . "/" . $aleatorio . ".png";

                    $origen = imagecreatefrompng($_FILES["fotoPromovido"]["tmp_name"]);

                    $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                    imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                    imagepng($destino, $ruta);
                }
            }

            //imagen INE Frontal
            $fotoIne = "";
            if (is_uploaded_file($_FILES['inePromoFrontal']['tmp_name'])) {

                list($ancho, $alto) = getimagesize($_FILES["inePromoFrontal"]["tmp_name"]);

                $nuevoAncho = 840;
                $nuevoAlto = 530;



                /*=============================================
                DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
                =============================================*/
                if ($_FILES["inePromoFrontal"]["type"] == "image/jpeg") {


                    /*=============================================
                    GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                    =============================================*/

                    $aleatorio = mt_rand(100, 999);

                    $fotoIne = "views/img/users/" . $persona_clave . "/" . $aleatorio . ".jpg";

                    $origen = imagecreatefromjpeg($_FILES["inePromoFrontal"]["tmp_name"]);

                    $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                    imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                    imagejpeg($destino, $fotoIne);
                }

                if ($_FILES["inePromoFrontal"]["type"] == "image/png") {

                    /*=============================================
                    GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                    =============================================*/

                    $aleatorio = mt_rand(100, 999);

                    $fotoIne = "views/img/users/" . $persona_clave . "/" . $aleatorio . ".png";

                    $origen = imagecreatefrompng($_FILES["inePromoFrontal"]["tmp_name"]);

                    $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                    imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                    imagepng($destino, $fotoIne);
                }
            }
            //imagen INE Frontal
            $fotoIneR = "";
            if (is_uploaded_file($_FILES['inePromoReverso']['tmp_name'])) {

                list($ancho, $alto) = getimagesize($_FILES["inePromoReverso"]["tmp_name"]);

                $nuevoAncho = 840;
                $nuevoAlto = 530;



                /*=============================================
                DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
                =============================================*/
                if ($_FILES["inePromoReverso"]["type"] == "image/jpeg") {


                    /*=============================================
                    GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                    =============================================*/

                    $aleatorio = mt_rand(100, 999);

                    $fotoIneR = "views/img/users/" . $persona_clave . "/" . $aleatorio . ".jpg";

                    $origen = imagecreatefromjpeg($_FILES["inePromoReverso"]["tmp_name"]);

                    $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                    imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                    imagejpeg($destino, $fotoIneR);
                }

                if ($_FILES["inePromoReverso"]["type"] == "image/png") {

                    /*=============================================
                    GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                    =============================================*/

                    $aleatorio = mt_rand(100, 999);

                    $fotoIneR = "views/img/users/" . $persona_clave . "/" . $aleatorio . ".png";

                    $origen = imagecreatefrompng($_FILES["inePromoReverso"]["tmp_name"]);

                    $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                    imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                    imagepng($destino, $fotoIneR);
                }
            }

            // integramos a la BD

            $tabla = "promovidos";
            $datos = array(
                "persona_clave" => $persona_clave,
                "enlace_clave" => $_SESSION["personaClave"],
                "id_solicitud" => $_POST["solicitud"],
                "detalle_sol" => $_POST["detalleSolicitud"],
                "id_problematica" => $_POST["problematica"],
                "detalle_prob" => $_POST["detalleProblematica"],
                "ine" => "no"
            );
            $tablaPersona = "personas";
            $nombre = strtoupper($_POST["nombre"]);
            $paterno = strtoupper($_POST["paterno"]);
            $materno = strtoupper($_POST["materno"]);
            $direccion = strtoupper($_POST["direccion"]);
            $localidad = strtoupper($_POST["localidad"]);
            $ocupacion = strtoupper($_POST["ocupacion"]);
            $colonia = strtoupper($_POST["colonia"]);

            $datosPersona = array(
                "persona_clave" => $persona_clave,
                "nombre" => $nombre,
                "paterno" => $paterno,
                "materno" => $materno,
                "direccion" => $direccion,
                "colonia" => $colonia,
                "localidad" => $localidad,
                "foto" => $ruta,
                "inef" => $fotoIne,
                "inet" => $fotoIneR,
                "seccion" => $_POST["seccion"],
                "ocupacion" => $ocupacion,
                "celular" => $_POST["celular"],
                "email" => $_POST["email"],
                "latitud" => $_POST["latitud"],
                "longitud" => $_POST["longitud"],
                "telefono" => $_POST["telefono"]
            );
            $respuesta = ModeloPromovidos::mdlCrearPromovido($tabla, $datos);
            $persona = ModeloPersonas::mdlCrearPersona($tablaPersona, $datosPersona);
            if ($respuesta == "ok" && $persona == "ok") {

                echo '<script> 
            Swal.fire({
            title: "¡Promovido ha sido integrado correctamente!",
            showConfirmButton: true,
            icon: "success",
            confirmButtonText: "Cerrar"
            }).then((result) =>{

                if(result.value){
                    window.location = "promovidos";
            }
           })
            </script>';
            } else {
                echo '<script> 
            Swal.fire({
            title: "¡error!",
            showConfirmButton: true,
            icon: "error",
            confirmButtonText: "Cerrar"
            }).then((result) =>{

                if(result.value){
                    window.location = "promovidos";
            }
           })
            </script>';
            }
        }
    }

    //mostrar promotores
    public static function ctrMostrarPromovidos($item, $valor)
    {
        $tabla = "promovidos";

        $respuesta = ModeloPromovidos::mdlMostrarPromovidos($tabla, $item, $valor);

        return $respuesta;

        $stmt = null;
    }
}
