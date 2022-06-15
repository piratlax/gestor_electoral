<?php

$item = null;
$valor = null;
$orden = "id";

$organizaciones = ControladorOrganizaciones::ctrMostrarOrganizaciones($item, $valor);
$totalOrganizaciones = count($organizaciones);

$coordinadores = ControladorCoordinadores::ctrMostrarCoordinadores($item, $valor);
$totalCoordinadores = count($coordinadores);

$promotores = ControladorPromotores::ctrMostrarPromotores($item, $valor);
$totalPromotores = count($promotores);

$promovidos = ControladorPromovidos::ctrMostrarPromovidos($item, $valor);
$totalPromovidos = count($promovidos);

?>



<div class="col-lg-3 col-xs-6">

  <div class="small-box bg-aqua">
    
  <div class="inner">
    
    <h3><?php echo number_format($totalOrganizaciones); ?></h3>

    <p>Organizaciones</p>
  
    </div>
    
    <div class="icon">
      
      <i class="ion ion-briefcase"></i>
    
    </div>
    
    <a href="organizaciones" class="small-box-footer">
      
      Más info <i class="fa fa-arrow-circle-right"></i>
    
    </a>

  </div>

</div>

<div class="col-lg-3 col-xs-6">

  <div class="small-box bg-green">
    
    <div class="inner">
    
    <div class="inner">
    
    <h3><?php echo number_format($totalCoordinadores); ?></h3>

    <p>Coordinadores</p>
  
  </div>
    
    </div>
    
    <div class="icon">
    
      <i class="ion ion-person-add"></i>
    
    </div>
    
    <a href="coordinadores" class="small-box-footer">
      
      Más info <i class="fa fa-arrow-circle-right"></i>
    
    </a>

  </div>

</div>

<div class="col-lg-3 col-xs-6">

  <div class="small-box bg-yellow">
    
    <div class="inner">
    
    <h3><?php echo number_format($totalPromotores); ?></h3>

    <p>Promotores</p>
  
    </div>
    
    <div class="icon">
    
      <i class="ion ion-person-stalker"></i>
    
    </div>
    
    <a href="promotores" class="small-box-footer">

      Más info <i class="fa fa-arrow-circle-right"></i>

    </a>

  </div>

</div>

<div class="col-lg-3 col-xs-6">

  <div class="small-box bg-red">
  
    <div class="inner">
    
   
    <h3><?php echo number_format($totalPromovidos); ?></h3>

    <p>Promovidos</p>
    
    </div>
    
    <div class="icon">
      
      <i class="ion ion-thumbsup"></i>
    
    </div>
    
    <a href="promovidos" class="small-box-footer">
      
      Más info <i class="fa fa-arrow-circle-right"></i>
    
    </a>

  </div>

</div>