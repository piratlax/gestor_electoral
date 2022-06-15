<?php

class ControladorProblematicas{

    //mostrar solicitudes
    public static function ctrMostrarProblematicas($item, $valor){
        $tabla="problematicas";
        
        $respuesta = ModeloProblematicas::mdlMostrarProblematicas($tabla, $item, $valor);

        return $respuesta;
    }

    //Crear Problematica
    public static function ctrCrearProblematica(){
        if(isset($_POST["nuevaProblematica"])){
            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaProblematica"])){
                $problematica=strtoupper($_POST["nuevaProblematica"]);
                $descripcion=strtoupper($_POST["nuevaDescripcion"]);
				$tabla = "problematicas";
				$datos = array("problematica"=>$problematica, "descripcion" => $descripcion
				);
				$respuesta = ModeloProblematicas::mdlCrearProblematica($tabla, $datos);
			
				if($respuesta == "ok"){

                    echo '<script> 
                    Swal.fire({
					title: "¡la problematica ha sido guardado correctamente!",
					showConfirmButton: true,
					icon: "success",
					confirmButtonText: "Cerrar"
                    }).then((result) =>{

						if(result.value){
							window.location = "problematicas";
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