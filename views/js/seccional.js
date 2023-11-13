/*=============================================
EDITAR SECCIONAL
=============================================*/
$(".tablas").on("click", ".btnEditarSeccional", function(){

    var idSeccional = $(this).attr("idSeccional");
    	
	var datos = new FormData();
	datos.append("idSeccional", idSeccional);

	$.ajax({

		url:"ajax/seccional.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			
			$("#editarNumero").val(respuesta["numero"]);
			$("#editarTipoCasilla").val(respuesta["tipo_casilla"]);
			$("#editarUbicacion").val(respuesta["ubicacion"]);
			$("#editarZona").html(respuesta["zona"]);
			$("#editarZona").val(respuesta["zona"]);
			$("#editarIdSeccional").val(respuesta["id"]);
			
		}

	});



})

/*=============================================
ELIMINAR SECCIONAL
=============================================*/
$(".tablas").on("click", ".btnEliminarSeccional", function(){

	var idSeccional = $(this).attr("idSeccional");
	var seccional = $(this).attr("seccional");
  
	swal.fire({
	  title: '¿Está seguro de borrar la sección?',
	  text: "¡Si no lo está puede cancelar la accíón!",
	  type: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Si, borrar seccional!'
	}).then(function(result){
  
	  if(result.value){
  
		window.location = "index.php?ruta=seccionales&idSeccional="+idSeccional+"&seccional="+seccional;
  
	  }
  
	})
  
  })