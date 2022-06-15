/*-------------------------*/
/*BUSCAR COORDINADOR----------*/
/*-------------------------*/

$(".btnBuscarCoordinador").click(function(){
    var nombre=document.getElementsByName("buscaNombre")[0].value;
    var paterno=document.getElementsByName("buscaPaterno")[0].value;
    var materno=document.getElementsByName("buscaMaterno")[0].value;
    var localidad=document.getElementsByName("buscaLocalidad")[0].value;
    var colonia=document.getElementsByName("buscaColonia")[0].value;
    var calle=document.getElementsByName("buscaCalle")[0].value;

    window.location = "index.php?ruta=altacoordinador&nombre="+nombre+"&paterno="+paterno+"&materno="+materno+"&localidad="+localidad+"&colonia="+colonia+"&calle="+calle;
})

/*-------------------------*/
/*DETALLE COORDINADOR----------*/
/*-------------------------*/
$(".tablas").on("click", ".btnAltaCoordinador", function(){

    var idElector = $(this).attr("idElector");
    console.log (idElector);
    var datos = new FormData();
    datos.append("idElector", idElector);

    $.ajax({

        url:"ajax/coordinador.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta){
            $("#ClaveElector").val(respuesta["cvelector"]);
            $("#FechaNacimiento").val(respuesta["fnac"]);
            $("#sexo").val(respuesta["sexo"]);
            var nombre=respuesta["nom"]+" "+respuesta["paterno"]+" "+respuesta["materno"];
            $("#Nombre").val(nombre);
            var direccion=respuesta["calle"]+" No. Int."+respuesta["noint"]+" No. Ext. "+respuesta["noext"];
            $("#Direccion").val(direccion);
            var colonia=respuesta["colonia"]+" C.P. "+respuesta["codpos"];
            $("#Colonia").val(colonia);
            $("#Localidad").val(respuesta["desgeor"]);
            $("#Ocupacion").val(respuesta["ocupacion"]);
            $("#IdElector").val(respuesta["id"]);
            

        }

    });

})

/*=============================================
SUBIENDO LA FOTO DEL USUARIO
=============================================*/
$(".fotoCoordinador").change(function(){

	var imagen = this.files[0];
	
	/*=============================================
  	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
  	=============================================*/

  	if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

  		$(".fotoCoordinador").val("");

  		 Swal.fire({
		      title: "Error al subir la imagen",
		      text: "¡La imagen debe estar en formato JPG o PNG!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

  	}else if(imagen["size"] > 20000000){

  		$(".fotoCoordinador").val("");

  		 Swal.fire({
		      title: "Error al subir la imagen",
		      text: "¡La imagen no debe pesar más de 2MB!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

  	}else{

  		var datosImagen = new FileReader;
  		datosImagen.readAsDataURL(imagen);

  		$(datosImagen).on("load", function(event){

  			var rutaImagen = event.target.result;

  			$(".previsualizarCoordinador").attr("src", rutaImagen);

  		})

  	}
})

$(".ineFrontal").change(function(){

	var imagen = this.files[0];
	
	/*=============================================
  	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
  	=============================================*/

  	if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

  		$(".ineFrontal").val("");

  		 Swal.fire({
		      title: "Error al subir la imagen",
		      text: "¡La imagen debe estar en formato JPG o PNG!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

  	}else if(imagen["size"] > 20000000){

  		$(".ineFrontal").val("");

  		 Swal.fire({
		      title: "Error al subir la imagen",
		      text: "¡La imagen no debe pesar más de 2MB!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

  	}else{

  		var datosImagen = new FileReader;
  		datosImagen.readAsDataURL(imagen);

  		$(datosImagen).on("load", function(event){

  			var rutaImagen = event.target.result;

  			$(".previsualizarFrontal").attr("src", rutaImagen);

  		})

  	}
})

$(".ineReverso").change(function(){

	var imagen = this.files[0];
	
	/*=============================================
  	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
  	=============================================*/

  	if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

  		$(".ineReverso").val("");

  		 Swal.fire({
		      title: "Error al subir la imagen",
		      text: "¡La imagen debe estar en formato JPG o PNG!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

  	}else if(imagen["size"] > 20000000){

  		$(".ineReverso").val("");

  		 Swal.fire({
		      title: "Error al subir la imagen",
		      text: "¡La imagen no debe pesar más de 2MB!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

  	}else{

  		var datosImagen = new FileReader;
  		datosImagen.readAsDataURL(imagen);

  		$(datosImagen).on("load", function(event){

  			var rutaImagen = event.target.result;

  			$(".previsualizarReverso").attr("src", rutaImagen);

  		})

  	}
})
