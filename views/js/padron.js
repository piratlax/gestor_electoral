/*-------------------------*/
/*BUSCAR ELECTOR----------*/
/*-------------------------*/

$(".btnBuscarElector").click(function(){
    var nombre=document.getElementsByName("buscaNombre")[0].value;
    var paterno=document.getElementsByName("buscaPaterno")[0].value;
    var materno=document.getElementsByName("buscaMaterno")[0].value;
    var localidad=document.getElementsByName("buscaLocalidad")[0].value;
    var colonia=document.getElementsByName("buscaColonia")[0].value;
    var calle=document.getElementsByName("buscaCalle")[0].value;

    window.location = "index.php?ruta=padron&nombre="+nombre+"&paterno="+paterno+"&materno="+materno+"&localidad="+localidad+"&colonia="+colonia+"&calle="+calle;
})

/*-------------------------*/
/*DETALLE ELECTOR----------*/
/*-------------------------*/
$(".tablas").on("click", ".btnDetalleElector", function(){
    var idElector = $(this).attr("idElector");
    var datos = new FormData();
    datos.append("idElector", idElector);

    $.ajax({

        url:"ajax/padron.ajax.php",
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
            $("#LugarNacimiento").val(respuesta["lnac"]);
            $("#Edo").val(respuesta["edo"]);
            $("#Dfe").val(respuesta["dfe"]);
            $("#Dlo").val(respuesta["dlo"]);
            $("#Mun").val(respuesta["mun"]);
            $("#Secc").val(respuesta["secc"]);
            $("#local").val(respuesta["local"]);
            $("#Mza").val(respuesta["manzana"]);
            $("#LongCam").val(respuesta["longcam"]);

        }

    });

})