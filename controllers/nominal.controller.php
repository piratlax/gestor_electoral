<?php

class ControladorNominal
{

	//mostrar Seccionales
	public static function ctrMostrarNominal($item, $valor)
	{
		$tabla = "nominal";

		$respuesta = ModeloNominal::mdlMostrarNominal($tabla, $item, $valor);

		return $respuesta;
	}

	//Crear integrante al listado nominal
	public static function ctrCrearNominal()
	{
		if (isset($_POST["nuevoNombre"])) {
			if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"])) {
				$nuevoNombre = strtoupper($_POST["nuevoNombre"]);
				$nuevoPaterno = strtoupper($_POST["nuevoPaterno"]);
				$nuevoMaterno = strtoupper($_POST["nuevoMaterno"]);
				$nuevoCurp = strtoupper($_POST["nuevoCurp"]);
				$nuevoIdseccion = $_POST["nuevoIdseccion"];

				$tabla = "nominal";
				$datos = array(
					"nombre" => $nuevoNombre,
					"paterno" => $nuevoPaterno,
					"materno" => $nuevoMaterno,
					"curp" => $nuevoCurp,
					"idseccion" => $nuevoIdseccion,
				);
				$respuesta = ModeloNominal::mdlCrearNominal($tabla, $datos);

				if ($respuesta == "ok") {

					echo '<script> 
                    Swal.fire({
					title: "¡El integrante ha sido guardado correctamente!",
					showConfirmButton: true,
					icon: "success",
					confirmButtonText: "Cerrar"
                    }).then((result) =>{

						if(result.value){
							window.location = "nominal";
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
							window.location = "nominal";
                    }
                   })
	                </script>';
				}
			} else {

				echo '<script> 
                    Swal.fire({
					title: "Error, el nombre no puede con caracteres especiales",
					showConfirmButton: true,
					icon: "error",
					confirmButtonText: "Cerrar"
                    }).then((result) =>{

						if(result.value){
							window.location = "nominal";
                    }
                   })
			</script>';
			}
		}
	}

	/*=============================================
	EDITAR NOMINAL
	=============================================*/

	static public function ctrEditarNominal()
	{

		if (isset($_POST["editarNombre"])) {

			if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"])) {


				$tabla = "nominal";



				$datos = array(
					"nombre" => strtoupper($_POST["editarNombre"]),
					"paterno" => strtoupper($_POST["editarPaterno"]),
					"materno" => strtoupper($_POST["editarMaterno"]),
					"curp" => strtoupper($_POST["editarCurp"]),
					"idseccion" => $_POST["editarIdSeccion"],
					"id" => $_POST["editarIdNominal"]
				);

				$respuesta = ModeloNominal::mdlEditarNominal($tabla, $datos);

				if ($respuesta == "ok") {


					echo '<script> 
                    Swal.fire({
					title: "¡Integrante nominal ha sido editado correctamente!",
					showConfirmButton: true,
					icon: "success",
					confirmButtonText: "Cerrar"
                    }).then((result) =>{

						if(result.value){
							window.location = "nominal";
                    }
                   })
	                </script>';
				}
			} else {
				echo '<script> 
                    Swal.fire({
					title: "¡El nombre no debe de llevar caracteres especiales!",
					showConfirmButton: true,
					icon: "error",
					confirmButtonText: "Cerrar"
                    }).then((result) =>{

						if(result.value){
							window.location = "nominal";
                    }
                   })
	                </script>';
			}
		}
	}
	/*=============================================
	BORRAR NOMINAL
	=============================================*/

	static public function ctrBorrarNominal()
	{

		if (isset($_GET["idNominal"])) {

			$tabla = "nominal";
			$datos = $_GET["idNominal"];

			$respuesta = ModeloNominal::mdlBorrarNominal($tabla, $datos);

			if ($respuesta == "ok") {

				echo '<script>

				Swal.fire({
		      	title: "El integrante nominal ha sido eliminado",
		      	type: "success",
		      	confirmButtonText: "¡Cerrar!"
		    	}).then(function(result) {
		        if (result.value) {

		        	window.location = "nominal";

		        }


			});

				</script>';
			} else {
				echo '<script>

				Swal.fire({
		      	title: "La Sección no se puede eliminar",
		      	type: "alert",
		      	confirmButtonText: "¡Cerrar!"
		    	}).then(function(result) {
		        if (result.value) {

		        	window.location = "seccionales";

		        }


			});

				</script>';
			}
		}
	}
}
