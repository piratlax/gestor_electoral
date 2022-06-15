<?php

class ControladorCoordinadores{

    //mostrar coordinadores
    public static function ctrMostrarCoordinadores($item, $valor){
        $tabla="usuarios";
        
        $respuesta = ModeloCoordinadores::mdlMostrarCoordinadores($tabla, $item, $valor);

        return $respuesta;
        $stmt->close();
		
		$stmt = null;
    }
    //mostrar enlaces
    public static function ctrMostrarEnlaces(){
        $tabla="coordinadores";
        
        $respuesta = ModeloCoordinadores::mdlMostrarEnlaces($tabla);

        return $respuesta;
        $stmt->close();
		
		$stmt = null;
    }
    //mostrar organizaciones
    public static function ctrMostrarOrganizacion(){
        $tabla="organizaciones";
        
        $respuesta = ModeloCoordinadores::mdlMostrarOrganizacion($tabla);

        return $respuesta;
    }

    //Crear Coordinador
    public static function ctrCrearCoordinador(){

        if(isset($_POST["nombre"])){
            //creamos clave unica
            $azar = mt_rand(1000,99999);
            $persona_clave=$azar.$_POST["nombre"];

            /*=============================================
            CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LAS IMAGENES
            =============================================*/

            $directorio = "views/img/users/".$persona_clave;

            mkdir($directorio, 0755);
                /*=============================================
				VALIDAR foto
				=============================================*/

				$ruta = "";
                // imagen de perfil
				if(is_uploaded_file($_FILES['fotoCoordinador']['tmp_name'])){

					list($ancho, $alto) = getimagesize($_FILES["fotoCoordinador"]["tmp_name"]);

					$nuevoAncho = 500;
					$nuevoAlto = 500;

				

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/
					if($_FILES["fotoCoordinador"]["type"] == "image/jpeg"){


						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "views/img/users/".$persona_clave."/".$aleatorio.".jpg";

						$origen = imagecreatefromjpeg($_FILES["fotoCoordinador"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $ruta);

					}

					if($_FILES["fotoCoordinador"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "views/img/users/".$persona_clave."/".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["fotoCoordinador"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $ruta);

					}

				}

                //imagen INE Frontal
                $fotoIne = "";
                if(is_uploaded_file($_FILES['ineFrontal']['tmp_name'])){

					list($ancho, $alto) = getimagesize($_FILES["ineFrontal"]["tmp_name"]);

					$nuevoAncho = 840;
					$nuevoAlto = 530;

				

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/
					if($_FILES["ineFrontal"]["type"] == "image/jpeg"){


						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$fotoIne = "views/img/users/".$persona_clave."/".$aleatorio.".jpg";

						$origen = imagecreatefromjpeg($_FILES["ineFrontal"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $fotoIne);

					}
                    
					if($_FILES["ineFrontal"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$fotoIne = "views/img/users/".$persona_clave."/".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["ineFrontal"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $fotoIne);

					}
                }
                    //imagen INE Frontal
                $fotoIneR = "";
                if(is_uploaded_file($_FILES['ineReverso']['tmp_name'])){

					list($ancho, $alto) = getimagesize($_FILES["ineReverso"]["tmp_name"]);

					$nuevoAncho = 840;
					$nuevoAlto = 530;

				

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/
					if($_FILES["ineReverso"]["type"] == "image/jpeg"){


						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$fotoIneR = "views/img/users/".$persona_clave."/".$aleatorio.".jpg";

						$origen = imagecreatefromjpeg($_FILES["ineReverso"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $fotoIneR);

					}

					if($_FILES["ineReverso"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$fotoIneR = "views/img/users/".$persona_clave."/".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["ineReverso"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $fotoIneR);

					}
                }
			
            // integramos a la BD
            $encrypt = crypt($_POST["password"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
            
            $tabla = "usuarios";
            $datos = array ( "persona_clave"=>$persona_clave,
                             "organizacion" => $_POST["organizacion"],
                             "tipo" => $_POST["tipo"],
                             "perfil" => "coordinador",
                             "estado" => "1",
                             "colonia" => $_POST["colonia"],
                             "usuario" => $_POST ["usuario"],
                             "password" => $encrypt);
            $tablaPersona = "personas";
            $nombre=strtoupper($_POST["nombre"]);
            $paterno=strtoupper($_POST["paterno"]);
            $materno=strtoupper($_POST["materno"]);
            $direccion=strtoupper($_POST["direccion"]);
            $localidad=strtoupper($_POST["localidad"]);
            $ocupacion=strtoupper($_POST["ocupacion"]);
            $colonia=strtoupper($_POST["colonia"]);

            $datosPersona = array ("persona_clave"=>$persona_clave,
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
                                   "celular" => $_POST ["celular"],
                                   "email" => $_POST ["email"],
                                   "telefono" => $_POST ["telefono"]);
            $respuesta = ModeloCoordinadores::mdlCrearCoordinador($tabla, $datos);
            $persona = ModeloPersonas::mdlCrearPersona($tablaPersona, $datosPersona);
            if($respuesta == "ok" && $persona=="ok"){

                echo '<script> 
                Swal.fire({
                title: "¡El coordinador ha sido integrado correctamente!",
                showConfirmButton: true,
                icon: "success",
                confirmButtonText: "Cerrar"
                }).then((result) =>{

                    if(result.value){
                        window.location = "coordinadores";
                }
               })
                </script>';
            }else {
                echo '<script> 
                Swal.fire({
                title: "¡error!",
                showConfirmButton: true,
                icon: "error",
                confirmButtonText: "Cerrar"
                }).then((result) =>{

                    if(result.value){
                        window.location = "coordinadores";
                }
               })
                </script>';
            }	

        }
    }
}