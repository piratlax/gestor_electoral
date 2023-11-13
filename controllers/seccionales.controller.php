<?php

class ControladorSeccionales
{

	//mostrar Seccionales
	public static function ctrMostrarSeccionales($item, $valor)
	{
		$tabla = "secciones";

		$respuesta = ModeloSeccionales::mdlMostrarSeccionales($tabla, $item, $valor);

		return $respuesta;
	}

	//CrearSeccionales
	public static function ctrCrearSeccionales()
	{
		if (isset($_POST["nuevoNumero"])) {
			if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNumero"])) {
				$nuevoNumero = strtoupper($_POST["nuevoNumero"]);
				$nuevoTipoCasilla = strtoupper($_POST["nuevoTipoCasilla"]);
				$nuevaUbicacion = strtoupper($_POST["nuevaUbicacion"]);
				$nuevaZona = strtoupper($_POST["nuevaZona"]);
				$tabla = "secciones";
				$datos = array(
					"numero" => $nuevoNumero,
					"tipo_casilla" => $nuevoTipoCasilla,
					"ubicacion" => $nuevaUbicacion,
					"zona" => $nuevaZona,
				);
				$respuesta = ModeloSeccionales::mdlCrearSeccional($tabla, $datos);

				if ($respuesta == "ok") {

					echo '<script> 
                    Swal.fire({
					title: "¡la sección ha sido guardado correctamente!",
					showConfirmButton: true,
					icon: "success",
					confirmButtonText: "Cerrar"
                    }).then((result) =>{

						if(result.value){
							window.location = "seccionales";
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
							window.location = "seccionales";
                    }
                   })
	                </script>';
				}
			} else {

				echo '<script> 
                    Swal.fire({
					title: "Error, el numero no puede con caracteres especiales",
					showConfirmButton: true,
					icon: "error",
					confirmButtonText: "Cerrar"
                    }).then((result) =>{

						if(result.value){
							window.location = "seccionales";
                    }
                   })
			</script>';
			}
		}
	}

	/*=============================================
	EDITAR SECCION
	=============================================*/

	static public function ctrEditarSeccionales()
	{

		if (isset($_POST["editarNumero"])) {

			if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNumero"])) {


				$tabla = "secciones";



				$datos = array(
					"numero" => $_POST["editarNumero"],
					"tipo_casilla" => $_POST["editarTipoCasilla"],
					"ubicacion" => $_POST["editarUbicacion"],
					"zona" => $_POST["editarZona"],
					"id" => $_POST["editarIdSeccional"]
				);

				$respuesta = ModeloSeccionales::mdlEditarSeccional($tabla, $datos);

				if ($respuesta == "ok") {


					echo '<script> 
                    Swal.fire({
					title: "¡La seccion ha sido editada correctamente!",
					showConfirmButton: true,
					icon: "success",
					confirmButtonText: "Cerrar"
                    }).then((result) =>{

						if(result.value){
							window.location = "seccionales";
                    }
                   })
	                </script>';
				}
			} else {
				echo '<script> 
                    Swal.fire({
					title: "¡El nombre de la sección no debe de llevar caracteres especiales!",
					showConfirmButton: true,
					icon: "error",
					confirmButtonText: "Cerrar"
                    }).then((result) =>{

						if(result.value){
							window.location = "seccionales";
                    }
                   })
	                </script>';
			}
		}
	}
	/*=============================================
	BORRAR SECCION
	=============================================*/

	static public function ctrBorrarSeccional()
	{

		if (isset($_GET["idSeccional"])) {

			$tabla = "secciones";
			$datos = $_GET["idSeccional"];

			$respuesta = ModeloSeccionales::mdlBorrarSeccionales($tabla, $datos);

			if ($respuesta == "ok") {

				echo '<script>

				Swal.fire({
		      	title: "La Sección ha sido eliminada",
		      	type: "success",
		      	confirmButtonText: "¡Cerrar!"
		    	}).then(function(result) {
		        if (result.value) {

		        	window.location = "seccionales";

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
