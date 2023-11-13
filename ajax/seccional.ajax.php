<?php

require_once "../controllers/seccionales.controller.php";
require_once "../models/seccionales.model.php";

class AjaxSeccional
{

	/*=============================================
	EDITAR SECCIONAL
	=============================================*/

	public $idSeccional;

	public function ajaxEditarSeccional()
	{

		$item = "id";
		$valor = $this->idSeccional;

		$respuesta = ControladorSeccionales::ctrMostrarSeccionales($item, $valor);

		echo json_encode($respuesta);
	}
}
/*=============================================
EDITAR SECCIONAL
=============================================*/
if (isset($_POST["idSeccional"])) {

	$editar = new AjaxSeccional();
	$editar->idSeccional = $_POST["idSeccional"];
	$editar->ajaxEditarSeccional();
}
