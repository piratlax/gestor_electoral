<?php

//controllers
require_once "controllers/template.controller.php";
require_once "controllers/users.controller.php";
require_once "controllers/organizacion.controller.php";
require_once "controllers/coordinador.controller.php";
require_once "controllers/promotor.controller.php";
require_once "controllers/promovido.controller.php";
require_once "controllers/solicitud.controller.php";
require_once "controllers/problematica.controller.php";

//models
require_once "models/users.model.php";
require_once "models/organizacion.model.php";
require_once "models/coordinador.model.php";
require_once "models/personas.model.php";
require_once "models/promotor.model.php";
require_once "models/promovido.model.php";
require_once "models/solicitud.model.php";
require_once "models/problematica.model.php";
$template = new ControllerTemplate();
$template -> ctrTemplate();
