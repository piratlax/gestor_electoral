<?php

class ControladorSolicitudes{

    //mostrar solicitudes
    public static function ctrMostrarSolicitudes($item, $valor){
        $tabla="solicitudes";
        
        $respuesta = ModeloSolicitudes::mdlMostrarSolicitudes($tabla, $item, $valor);

        return $respuesta;
    }

    //Crear Solicitudes
    public static function ctrCrearSolicitud(){
        if(isset($_POST["nuevaSolicitud"])){
            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaSolicitud"])){
                $solicitud=strtoupper($_POST["nuevaSolicitud"]);
                $descripcion=strtoupper($_POST["nuevaDescripcion"]);
				$tabla = "solicitudes";
				$datos = array("solicitud"=>$solicitud, "descripcion" => $descripcion
				);
				$respuesta = ModeloSolicitudes::mdlCrearSolicitud($tabla, $datos);
			
				if($respuesta == "ok"){

                    echo '<script> 
                    Swal.fire({
					title: "¡la solicitud ha sido guardado correctamente!",
					showConfirmButton: true,
					icon: "success",
					confirmButtonText: "Cerrar"
                    }).then((result) =>{

						if(result.value){
							window.location = "solicitudes";
                    }
                   })
	                </script>';
				}else if($respuesta=='error'){
					echo '<script> 
                    Swal.fire({
					title: "¡error en la base de datos!",
					showConfirmButton: true,
					icon: "success",
					confirmButtonText: "Cerrar"
                    }).then((result) =>{

						if(result.value){
							window.location = "organizacion";
                    }
                   })
	                </script>';
				}	


			}else{

                echo '<script> 
                    Swal.fire({
					title: "Error, la organizacion no puede con caracteres especiales",
					showConfirmButton: true,
					icon: "error",
					confirmButtonText: "Cerrar"
                    }).then((result) =>{

						if(result.value){
							window.location = "organizacion";
                    }
                   })
			</script>';

			}
        
        }
    }

    /*=============================================
	EDITAR ORGANIZACION
	=============================================*/

	static public function ctrEditarOrganizacion(){

		if(isset($_POST["editarOrganizacion"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarOrganizacion"])){
 

				$tabla = "organizaciones";

				

				$datos = array("organizacion" => $_POST["editarOrganizacion"],
							   "id" => $_POST["editarIdOrganizacion"]);

				$respuesta = ModeloOrganizaciones::mdlEditarOrganizacion($tabla, $datos);

				if($respuesta == "ok"){


                    echo '<script> 
                    Swal.fire({
					title: "¡La organizacion ha sido editada correctamente!",
					showConfirmButton: true,
					icon: "success",
					confirmButtonText: "Cerrar"
                    }).then((result) =>{

						if(result.value){
							window.location = "organizacion";
                    }
                   })
	                </script>';

				}


			}else{
					echo '<script> 
                    Swal.fire({
					title: "¡El nombre de la organizacion no debe de llevar caracteres especiales!",
					showConfirmButton: true,
					icon: "error",
					confirmButtonText: "Cerrar"
                    }).then((result) =>{

						if(result.value){
							window.location = "organizacion";
                    }
                   })
	                </script>';

			}

		}

    }
    /*=============================================
	BORRAR ORGANIZACION
	=============================================*/

	static public function ctrBorrarOrganizacion(){

		if(isset($_GET["idOrganizacion"])){

			$tabla ="organizaciones";
			$datos = $_GET["idOrganizacion"];

			$respuesta = ModeloOrganizaciones::mdlBorrarOrganizacion($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				 		 Swal.fire({
		      title: "La organizacion ha sido eliminada",
		      type: "success",
		      confirmButtonText: "¡Cerrar!"
		    }).then(function(result) {
		        if (result.value) {

		        	window.location = "organizacion";

		        }


			});

				</script>';

			}		

		}

	}
}