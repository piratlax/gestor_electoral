<?php

class ControladorUsuarios
{

	/*=============================================
	INGRESO DE USUARIO
	=============================================*/

	static public function ctrAccesoUsuario()
	{

		if (isset($_POST["ingUsuario"])) {

			if (
				preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingUsuario"]) &&
				preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])
			) {

				$encrypt = crypt($_POST["ingPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
				$tabla = "usuarios";
				$campo = "usuario";
				$valor = $_POST["ingUsuario"];
				$respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla, $campo, $valor);
				if ($respuesta != null) {
					if ($respuesta["usuario"] == $_POST["ingUsuario"] && $respuesta["password"] == $encrypt) {

						if ($respuesta["estado"] == 1) {
							$personaTabla = "personas";
							$personaCampo = "persona_clave";
							$personaValor = $respuesta["persona_clave"];
							$persona = ModeloPersonas::mdlMostrarPersonas($personaTabla, $personaCampo, $personaValor);
							$_SESSION["session_start"] = "c195b44182f3da8e9b3797915ad450aa";
							$_SESSION["id"] = $respuesta["id"];
							$_SESSION["idPersona"] = $persona["id"];
							$_SESSION["personaClave"] = $persona["persona_clave"];
							$_SESSION["nombre"] = $persona["nombre"] . " " . $persona["paterno"] . " " . $persona["materno"];
							$_SESSION["usuario"] = $respuesta["usuario"];
							$_SESSION["idOrganizacion"] = $respuesta["organizaciones_id"];
							$_SESSION["foto"] = $persona["foto"];
							$_SESSION["perfil"] = $respuesta["perfil"];
							/*=============================================
                        REGISTRAR FECHA PARA SABER EL ÚLTIMO LOGIN
                        =============================================*/

							date_default_timezone_set('America/Mexico_City');

							$fecha = date('Y-m-d');
							$hora = date('H:i:s');

							$fechaActual = $fecha . ' ' . $hora;

							$item1 = "ultimo_login";
							$valor1 = $fechaActual;

							$item2 = "id";
							$valor2 = $respuesta["id"];

							$ultimoLogin = "ok";
							//UserModel::mdlUpdateUser($table, $item1, $value1, $item2, $value2);

							if ($ultimoLogin == "ok") {

								echo '<script> 
								Swal.fire({
								title: "Bienvenido al Sistema",
								showConfirmButton: true,
								icon: "success",
								confirmButtonText: "Entrar"
								}).then((result) =>{

									if(result.value){
										window.location = "inicio";
								}
							})
								</script>';
							}
						} else {

							echo '<br>
							<div class="alert alert-danger">El usuario aún no está activado</div>';
						}
					} else {
						echo '<br>
							<div class="alert alert-danger">La clave no corresponde</div>';
					}
				} else {

					echo '<br><div class="alert alert-danger">usuario no reconocido</div>';
				}
			}
		}
	}

	/*=============================================
	REGISTRO DE USUARIO
	=============================================*/

	static public function ctrCrearUsuario()
	{

		if (isset($_POST["nuevoUsuario"])) {

			if (
				preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoUsuario"]) &&
				preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoPassword"])
			) {

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
				if (is_uploaded_file($_FILES['fotoUsuario']['tmp_name'])) {

					list($ancho, $alto) = getimagesize($_FILES["fotoUsuario"]["tmp_name"]);

					$nuevoAncho = 500;
					$nuevoAlto = 500;



					/*=============================================
						   DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
						   =============================================*/
					if ($_FILES["fotoUsuario"]["type"] == "image/jpeg") {


						/*=============================================
							   GUARDAMOS LA IMAGEN EN EL DIRECTORIO
							   =============================================*/

						$aleatorio = mt_rand(100, 999);

						$ruta = "views/img/users/" . $persona_clave . "/" . $aleatorio . ".jpg";

						$origen = imagecreatefromjpeg($_FILES["fotoUsuario"]["tmp_name"]);

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $ruta);
					}

					if ($_FILES["fotoUsuario"]["type"] == "image/png") {

						/*=============================================
							   GUARDAMOS LA IMAGEN EN EL DIRECTORIO
							   =============================================*/

						$aleatorio = mt_rand(100, 999);

						$ruta = "views/img/users/" . $persona_clave . "/" . $aleatorio . ".png";

						$origen = imagecreatefrompng($_FILES["fotoUsuario"]["tmp_name"]);

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $ruta);
					}
				}

				//imagen INE Frontal
				$fotoIne = "";
				if (is_uploaded_file($_FILES['ineFrontalUser']['tmp_name'])) {

					list($ancho, $alto) = getimagesize($_FILES["ineFrontalUser"]["tmp_name"]);

					$nuevoAncho = 840;
					$nuevoAlto = 530;



					/*=============================================
						   DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
						   =============================================*/
					if ($_FILES["ineFrontalUser"]["type"] == "image/jpeg") {


						/*=============================================
							   GUARDAMOS LA IMAGEN EN EL DIRECTORIO
							   =============================================*/

						$aleatorio = mt_rand(100, 999);

						$fotoIne = "views/img/users/" . $persona_clave . "/" . $aleatorio . ".jpg";

						$origen = imagecreatefromjpeg($_FILES["ineFrontalUser"]["tmp_name"]);

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $fotoIne);
					}

					if ($_FILES["ineFrontalUser"]["type"] == "image/png") {

						/*=============================================
							   GUARDAMOS LA IMAGEN EN EL DIRECTORIO
							   =============================================*/

						$aleatorio = mt_rand(100, 999);

						$fotoIne = "views/img/users/" . $persona_clave . "/" . $aleatorio . ".png";

						$origen = imagecreatefrompng($_FILES["ineFrontalUser"]["tmp_name"]);

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $fotoIne);
					}
				}
				//imagen INE Frontal
				$fotoIneR = "";
				if (is_uploaded_file($_FILES['ineReversoUser']['tmp_name'])) {

					list($ancho, $alto) = getimagesize($_FILES["ineReversoUser"]["tmp_name"]);

					$nuevoAncho = 840;
					$nuevoAlto = 530;



					/*=============================================
						   DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
						   =============================================*/
					if ($_FILES["ineReversoUser"]["type"] == "image/jpeg") {


						/*=============================================
							   GUARDAMOS LA IMAGEN EN EL DIRECTORIO
							   =============================================*/

						$aleatorio = mt_rand(100, 999);

						$fotoIneR = "views/img/users/" . $persona_clave . "/" . $aleatorio . ".jpg";

						$origen = imagecreatefromjpeg($_FILES["ineReversoUser"]["tmp_name"]);

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $fotoIneR);
					}

					if ($_FILES["ineReversoUser"]["type"] == "image/png") {

						/*=============================================
							   GUARDAMOS LA IMAGEN EN EL DIRECTORIO
							   =============================================*/

						$aleatorio = mt_rand(100, 999);

						$fotoIneR = "views/img/users/" . $persona_clave . "/" . $aleatorio . ".png";

						$origen = imagecreatefrompng($_FILES["inePromReverso"]["tmp_name"]);

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $fotoIneR);
					}
				}

				$tabla = "usuarios";

				$encriptar = crypt($_POST["nuevoPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

				$datos = array(
					"persona_clave" => $persona_clave,
					"perfil" => $_POST["perfil"],
					"estado" => "1",
					"enlace" => $_SESSION["personaClave"],
					"usuario" => $_POST["nuevoUsuario"],
					"password" => $encriptar
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
					"ocupacion" => $ocupacion,
					"celular" => $_POST["celular"],
					"email" => $_POST["email"],
					"telefono" => $_POST["telefono"]
				);
				$respuesta = ModeloUsuarios::mdlCrearUsuario($tabla, $datos);
				$persona = ModeloPersonas::mdlCrearPersona($tablaPersona, $datosPersona);

				if ($respuesta == "ok") {

					echo '<script> 
                    Swal.fire({
					title: "¡El usuario ha sido guardado correctamente!",
					showConfirmButton: true,
					icon: "success",
					confirmButtonText: "Cerrar"
                    }).then((result) =>{

						if(result.value){
							window.location = "usuarios";
                    }
                   })
	                </script>';
				} else if ($respuesta == 'error') {
					echo '<script> 
                    Swal.fire({
					title: "¡error en la base de datos!",
					showConfirmButton: true,
					icon: "success",
					confirmButtonText: "Cerrar"
                    }).then((result) =>{

						if(result.value){
							window.location = "usuarios";
                    }
                   })
	                </script>';
				}
			} else {

				echo '<script> 
                    Swal.fire({
					title: "Error, el usuario no puede con caracteres especiales",
					showConfirmButton: true,
					icon: "error",
					confirmButtonText: "Cerrar"
                    }).then((result) =>{

						if(result.value){
							window.location = "usuarios";
                    }
                   })
			</script>';
			}
		}
	}

	/*=============================================
	MOSTRAR USUARIOS
	=============================================*/

	static public function ctrMostrarUsuarios($campo, $valor)
	{

		$tabla = "usuarios";

		$respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla, $campo, $valor);

		return $respuesta;
	}

	/*=============================================
	EDITAR USUARIO
	=============================================*/

	static public function ctrEditarUsuario()
	{

		if (isset($_POST["editarUsuario"])) {

			if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"])) {

				/*=============================================
				VALIDAR IMAGEN
				=============================================*/

				$ruta = $_POST["fotoActual"];

				if (isset($_FILES["editarFoto"]["tmp_name"]) && !empty($_FILES["editarFoto"]["tmp_name"])) {

					list($ancho, $alto) = getimagesize($_FILES["editarFoto"]["tmp_name"]);

					$nuevoAncho = 500;
					$nuevoAlto = 500;

					/*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
					=============================================*/

					$directorio = "views/img/users/" . $_POST["editarUsuario"];

					/*=============================================
					PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
					=============================================*/

					if (!empty($_POST["fotoActual"])) {

						unlink($_POST["fotoActual"]);
					} else {

						mkdir($directorio, 0755);
					}

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if ($_FILES["editarFoto"]["type"] == "image/jpeg") {

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100, 999);

						$ruta = "views/img/users/" . $_POST["editarUsuario"] . "/" . $aleatorio . ".jpg";

						$origen = imagecreatefromjpeg($_FILES["editarFoto"]["tmp_name"]);

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $ruta);
					}

					if ($_FILES["editarFoto"]["type"] == "image/png") {

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100, 999);

						$ruta = "views/img/users/" . $_POST["editarUsuario"] . "/" . $aleatorio . ".png";

						$origen = imagecreatefrompng($_FILES["editarFoto"]["tmp_name"]);

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $ruta);
					}
				}

				$tabla = "usuarios";

				if ($_POST["editarPassword"] != "") {

					if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarPassword"])) {

						$encriptar = crypt($_POST["editarPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
					} else {

						echo '<script>

								swal({
									  type: "error",
									  title: "¡La contraseña no puede ir vacía o llevar caracteres especiales!",
									  showConfirmButton: true,
									  confirmButtonText: "Cerrar"
									  }).then(function(result) {
										if (result.value) {

										window.location = "usuarios";

										}
									})

						  	</script>';
					}
				} else {

					$encriptar = $_POST["passwordActual"];
				}

				$datos = array(
					"nombre" => $_POST["editarNombre"],
					"usuario" => $_POST["editarUsuario"],
					"password" => $encriptar,
					"perfil" => $_POST["editarPerfil"],
					"foto" => $ruta
				);

				$respuesta = ModeloUsuarios::mdlEditarUsuario($tabla, $datos);

				if ($respuesta == "ok") {


					echo '<script> 
                    Swal.fire({
					title: "¡El usuario ha sido editado correctamente!",
					showConfirmButton: true,
					icon: "success",
					confirmButtonText: "Cerrar"
                    }).then((result) =>{

						if(result.value){
							window.location = "usuarios";
                    }
                   })
	                </script>';
				}
			} else {
				echo '<script> 
                    Swal.fire({
					title: "¡El usuario no debe de llevar caracteres especiales!",
					showConfirmButton: true,
					icon: "error",
					confirmButtonText: "Cerrar"
                    }).then((result) =>{

						if(result.value){
							window.location = "usuarios";
                    }
                   })
	                </script>';
			}
		}
	}

	/*=============================================
	BORRAR USUARIO
	=============================================*/

	static public function ctrBorrarUsuario()
	{

		if (isset($_GET["idUsuario"])) {

			$tabla = "usuarios";
			$datos = $_GET["idUsuario"];

			if ($_GET["fotoUsuario"] != "") {

				unlink($_GET["fotoUsuario"]);
				rmdir('views/img/users/' . $_GET["usuario"]);
			}

			$respuesta = ModeloUsuarios::mdlBorrarUsuario($tabla, $datos);

			if ($respuesta == "ok") {

				echo '<script>

				 		 Swal.fire({
		      title: "El usuario ha sido eliminado",
		      type: "success",
		      confirmButtonText: "¡Cerrar!"
		    }).then(function(result) {
		        if (result.value) {

		        	window.location = "usuarios";

		        }


			});

				</script>';
			}
		}
	}
}
