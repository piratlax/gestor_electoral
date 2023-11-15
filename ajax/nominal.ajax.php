<?php

require_once "../controllers/nominal.controller.php";
require_once "../models/nominal.model.php";

class AjaxNominal
{

	/*=============================================
	EDITAR NOMINAL
	=============================================*/

	public $idNominal;

	public function ajaxEditarNominal()
	{

		$item = "id";
		$valor = $this->idNominal;

		$respuesta = ControladorNominal::ctrMostrarNominal($item, $valor);

		echo json_encode($respuesta);
	}
}
/*=============================================
EDITAR NOMINAL
=============================================*/
if (isset($_POST["idNominal"])) {

	$editar = new AjaxNominal();
	$editar->idNominal = $_POST["idNominal"];
	$editar->ajaxEditarNominal();
}
