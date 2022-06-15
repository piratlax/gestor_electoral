<?php

/* solo en ajax se vuelve a requerir las clases */
require_once "../controllers/padron.controller.php";
require_once "../models/padron.model.php";

class AjaxElector{
    public $idElector;

    public function ajaxMostrarElector(){

        $campo = "id";
        $valor = $this->idElector;

        $respuesta = ControladorElectores::ctrMostrarElector($campo, $valor);

        echo json_encode($respuesta);

    }
}

/* instanciamos, asignamos valor a la variable IdElector y ejecutamos siempre y cuando haya un valor $_POST */
if (isset($_POST["idElector"])){
    $editar = new AjaxElector();
    $editar -> idElector = $_POST["idElector"];
    $editar -> ajaxMostrarElector();

}