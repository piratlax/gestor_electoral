/*=============================================
EDITAR SECCIONAL
=============================================*/
$(".tablas").on("click", ".btnEditarNominal", function(){

    var idNominal = $(this).attr("idNominal");
    	
	var datos = new FormData();
	datos.append("idNominal", idNominal);

	$.ajax({

		url:"ajax/nominal.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			
			$("#editarNombre").val(respuesta["nombre"]);
			$("#editarPaterno").val(respuesta["paterno"]);
			$("#editarMaterno").val(respuesta["materno"]);
			$("#editarCurp").val(respuesta["curp"]);
			$("#editarSeccion").html(respuesta["numero"]);
			$("#editarSeccion").val(respuesta["idseccion"]);
			$("#editarIdNominal").val(respuesta["id"]);
			
		}

	});



})

/*=============================================
ELIMINAR NOMINAL
=============================================*/
$(".tablas").on("click", ".btnEliminarNominal", function(){

	var idNominal = $(this).attr("idNominal");
	var nominal = $(this).attr("nominal");
  
	swal.fire({
	  title: '¿Está seguro de borrar el integrante ?',
	  text: "¡Si no lo está puede cancelar la accíón!",
	  type: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Si, borrar Nominal!'
	}).then(function(result){
  
	  if(result.value){
  
		window.location = "index.php?ruta=nominal&idNominal="+idNominal+"&nominal="+nominal;
  
	  }
  
	})
  
  })