<?php

require_once "../controllers/organizacion.controller.php";
require_once "../models/organizacion.model.php";

class AjaxOrganizacion{

	/*=============================================
	EDITAR ORGANIZACION
	=============================================*/	

	public $idOrganizacion;

	public function ajaxEditarOrganizacion(){

		$item = "id";
		$valor = $this->idOrganizacion;

		$respuesta = ControladorOrganizaciones::ctrMostrarOrganizaciones($item, $valor);

		echo json_encode($respuesta);

    }
}
    /*=============================================
EDITAR USUARIO
=============================================*/
if(isset($_POST["idOrganizacion"])){

	$editar = new AjaxOrganizacion();
	$editar -> idOrganizacion = $_POST["idOrganizacion"];
	$editar -> ajaxEditarOrganizacion();

}
