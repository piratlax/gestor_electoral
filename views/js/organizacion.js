/*=============================================
EDITAR ORGANIZACION
=============================================*/
$(".tablas").on("click", ".btnEditarOrganizacion", function(){

    var idOrganizacion = $(this).attr("idOrganizacion");
    	
	var datos = new FormData();
	datos.append("idOrganizacion", idOrganizacion);

	$.ajax({

		url:"ajax/organizacion.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			
			$("#editarOrganizacion").val(respuesta["organizacion"]);
			$("#editarIdOrganizacion").val(respuesta["id"]);
			
		}

	});



})

/*=============================================
ELIMINAR ORGANIZACION
=============================================*/
$(".tablas").on("click", ".btnEliminarOrganizacion", function(){

	var idOrganizacion = $(this).attr("idOrganizacion");
	var organizacion = $(this).attr("organizacion");
  
	swal.fire({
	  title: '¿Está seguro de borrar la organizacion?',
	  text: "¡Si no lo está puede cancelar la accíón!",
	  type: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Si, borrar organizacion!'
	}).then(function(result){
  
	  if(result.value){
  
		window.location = "index.php?ruta=organizacion&idOrganizacion="+idOrganizacion+"&organizacion="+organizacion;
  
	  }
  
	})
  
  })