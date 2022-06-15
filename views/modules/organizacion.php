<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Administrar Organizaciones</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home">Principal</a></li>
              <li class="breadcrumb-item active">Organizaciones</li>
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

    <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarOrganizacion">
      
      Agregar organización

    </button>

  </div>

  <div class="box-body">
    
   <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
     
    <thead>
     
     <tr>
       
       <th style="width:10px">#</th>
       <th>Nombre</th>
       <th>Acciones</th>

     </tr> 

    </thead>

    <tbody>

    <?php

    $item = null;
    $valor = null;

    $organizacion = ControladorOrganizaciones::ctrMostrarOrganizaciones($item, $valor);

   foreach ($organizacion as $key => $value){
     
      echo ' <tr>
              <td>'.($key+1).'</td>
              <td>'.$value["organizacion"].'</td>
              
              <td>

                <div class="btn-group">
                    
                  <button class="btn btn-warning btnEditarOrganizacion" idOrganizacion="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarOrganizacion"><i class="fa fa-edit"></i></button>

                  <button class="btn btn-danger btnEliminarOrganizacion" idOrganizacion="'.$value["id"].'"  organizacion="'.$value["organizacion"].'"><i class="fa fa-times"></i></button>

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

  
<!--=====================================
MODAL AGREGAR ORGANIZACION
======================================-->

<div id="modalAgregarOrganizacion" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <h4 class="modal-title">Agregar organización</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
            <div class="form-group row">
              <label for="nuevaOrganizacion" class="col-sm-4 col-form-label">Organizacion</label>
              <div class="col-sm-8">
                <input type="text"  class="form-control" name="nuevaOrganizacion" autofocus autocomplete="off" required style="text-transform:uppercase;">
              </div>
            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Organización</button>

        </div>
          <?php

          $crearOrganizacion = new ControladorOrganizaciones();
          $crearOrganizacion -> ctrCrearOrganizacion();

          ?>
        
      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR USUARIO
======================================-->

<div id="modalEditarOrganizacion" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Organización</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group row">
              
            <label for="nuevaOrganizacion" class="col-sm-4 col-form-label">Organizacion</label>
            <div class="col-sm-8">
                <input type="text" class="form-control input-lg" id="editarOrganizacion" name="editarOrganizacion" value="" required>
                <input type="hidden" class="form-control input-lg" id="editarIdOrganizacion" name="editarIdOrganizacion" value="" required>

              </div>

            </div>

          </div>
        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Modificar Organización</button>

        </div>

     <?php

          $editarOrganizacion = new ControladorOrganizaciones();
          $editarOrganizacion -> ctrEditarOrganizacion();

        ?> 

      </form>

    </div>

  </div>

</div>

<?php

  $borrarOrganizacion = new ControladorOrganizaciones();
  $borrarOrganizacion -> ctrBorrarOrganizacion();

?> 
