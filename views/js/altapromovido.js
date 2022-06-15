/*=============================================
SUBIENDO LA FOTO DEL PROMOVIDO
=============================================*/
$(".fotoPromovido").change(function(){

	var imagen = this.files[0];
	
	/*=============================================
  	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
  	=============================================*/

  	if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

  		$(".fotoPromovido").val("");

  		 Swal.fire({
		      title: "Error al subir la imagen",
		      text: "¡La imagen debe estar en formato JPG o PNG!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

  	}else if(imagen["size"] > 20000000){

  		$(".fotoPromovido").val("");

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

  			$(".previsualizarPromovido").attr("src", rutaImagen);

  		})

  	}
})

$(".inePromoFrontal").change(function(){

	var imagen = this.files[0];
	
	/*=============================================
  	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
  	=============================================*/

  	if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

  		$(".inePromoFrontal").val("");

  		 Swal.fire({
		      title: "Error al subir la imagen",
		      text: "¡La imagen debe estar en formato JPG o PNG!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

  	}else if(imagen["size"] > 20000000){

  		$(".inePromoFrontal").val("");

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

  			$(".previsualizarPromoFrontal").attr("src", rutaImagen);

  		})

  	}
})

$(".inePromoReverso").change(function(){

	var imagen = this.files[0];
	
	/*=============================================
  	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
  	=============================================*/

  	if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

  		$(".inePromoReverso").val("");

  		 Swal.fire({
		      title: "Error al subir la imagen",
		      text: "¡La imagen debe estar en formato JPG o PNG!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

  	}else if(imagen["size"] > 20000000){

  		$(".inePromoReverso").val("");

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

  			$(".previsualizarPromoReverso").attr("src", rutaImagen);

  		})

  	}
})

function geoLocalizar() {

	const status = document.querySelector('#status');
  
  
	function success(position) {
	  var latitude  = position.coords.latitude;
	  var longitude = position.coords.longitude;
	  status.textContent = '';

	  var mymap = L.map('mapid').setView([latitude, longitude], 17);
	  console.log (mymap);
	  L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1,
    accessToken: 'pk.eyJ1IjoibWFvcml2ZXJhIiwiYSI6ImNrbWhseWhkYzA4a3MycXF1cDRxemcyNWgifQ.j--mUPJdgW27_pAJFSMZaw'
	}).addTo(mymap);
	  
	L.marker([latitude, longitude]).addTo(mymap);
	
	// mymap.on('click', onMapClick);
	// var popup = L.popup();

	// function onMapClick(e) {
	// latitude = setLatitude(e.latitude);
	// longitude = e.longitude;
	// console.log (latitude)
    // popup
    //     .setLatLng(e.latlng)
    //     .setContent("estableciendo domicilio " + e.latlng.toString())
    //     .openOn(mymap);
	// }

	$("#latitud").val(latitude);
	$("#longitud").val(longitude);
		
	}
  
	function error() {
	  status.textContent = 'Sin poder encontrar la localizacion';
	}
  
	if(!navigator.geolocation) {
	  status.textContent = 'La geolocalizacion no esta soportada por el dispositivo';
	} else {
	  status.textContent = 'Localizando…';
	  navigator.geolocation.getCurrentPosition(success, error);
	}
  
  }
  
  document.querySelector('.geolocalizar').addEventListener('click', geoLocalizar);

  


