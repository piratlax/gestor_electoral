<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Administrar Promovidos</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home">Principal</a></li>
              <li class="breadcrumb-item active">Promovidos</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">

<div class="box">

  <div class="box-header with-border">

    <a href="altapromovidos" class="btn btn-primary">
    Agregar Promovido
    </a>

  </div>

  <div class="box-body">
    
   <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
     
    <thead>
     
    <tr>
       
       <th style="width:10px">#</th>
       <th>Nombre</th>
       <th>direccion</th>
       <th>colonia</th>
       <th>seccion</th>
       <th>celular</th>
       <th>Foto</th>
       <th>Enlace</th>
       <th>Organización</th>
       <th>Acciones</th>

     </tr> 
    </thead>

    <tbody>
    <?php

$item = null;
$valor = null;

$promovidos = ControladorPromovidos::ctrMostrarPromovidos($item, $valor);

foreach ($promovidos as $key => $value){
  echo ' <tr>
          <td>'.($key+1).'</td>
          <td>'.$value["nombre"].'</td>
          <td>'.$value["direccion"].'</td>
          <td>'.$value["colonia"].'</td>
          <td>'.$value["seccion"].'</td>
          <td>'.$value["celular"].'</td>';
          if($value["foto"] != ""){

            echo '<td><img src="'.$value["foto"].'" class="img-thumbnail" width="40px"></td>';

          }else{

            echo '<td><img src="views/img/users/default/anonymous.png" class="img-thumbnail" width="30px"></td>';

          }
         
          echo '<td>'.$value["enlace"].'</td>
                <td>'.$value["organizacion"].'</td>
            <td>

            <div class="btn-group">
                
            <button class="btn btn-success btnDetalleCoordinador" id="'.$value["id"].'" data-toggle="modal" data-target="#modalDetalleCoordinador"><i class="fa fa-address-card"></i></button>

              
            </div>  

          </td>

        </tr>';
}


?> 
    

    </tbody>

   </table>

  </div>

</div>

</section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
