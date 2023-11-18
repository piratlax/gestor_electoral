<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Administrar Usuarios</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="home">Principal</a></li>
            <li class="breadcrumb-item active">Usuarios</li>
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

        <a href="altausuarios">
          <button class="btn btn-primary">

            Agregar usuario

          </button>
        </a>

      </div>

      <div class="box-body">

        <table class="table table-bordered table-striped dt-responsive tablas" width="100%">

          <thead>

            <tr>

              <th style="width:10px">#</th>
              <th>Nombre</th>
              <th>Usuario</th>
              <th>Foto</th>
              <th>Perfil</th>
              <th>Estado</th>
              <th>Último login</th>
              <th>Acciones</th>

            </tr>

          </thead>

          <tbody>

            <?php

            $item = null;
            $valor = null;

            $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

            foreach ($usuarios as $key => $value) {

              echo ' <tr>
              <td>' . ($key + 1) . '</td>
              <td>' . $value["nombre"] . '</td>
              <td>' . $value["usuario"] . '</td>';

              if ($value["foto"] != "") {

                echo '<td><img src="' . $value["foto"] . '" class="img-thumbnail" width="40px"></td>';
              } else {

                echo '<td><img src="views/img/users/default/anonymous.png" class="img-thumbnail" width="30px"></td>';
              }

              echo '<td>' . $value["perfil"] . '</td>';

              if ($value["estado"] != 0) {

                echo '<td><button class="btn btn-success btn-xs btnActivar" idUsuario="' . $value["id"] . '" estadoUsuario="0">Activado</button></td>';
              } else {

                echo '<td><button class="btn btn-danger btn-xs btnActivar" idUsuario="' . $value["id"] . '" estadoUsuario="1">Desactivado</button></td>';
              }

              echo '<td>' . $value["login"] . '</td>
              <td>

                <div class="btn-group">
                    
                  <button class="btn btn-info btnDetalleUsuario" idUsuario="' . $value["id"] . '" data-toggle="modal" data-target="#modalDetalleUsuario"><i class="fa fa-info-circle"></i></button>

                  <button class="btn btn-danger btnEliminarUsuario" idUsuario="' . $value["id"] . '" fotoUsuario="' . $value["foto"] . '" usuario="' . $value["usuario"] . '"><i class="fa fa-times"></i></button>

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
MODAL DETALLE USUARIO
======================================-->

<div id="modalDetalleUsuario" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <h4 class="modal-title">Detalle usuario</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
            <div class="form-group row">
              <label for="nuevoNombre" class="col-sm-2 col-form-label">Nombre</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="detalleNombre" readonly>
              </div>
            </div>

            <!-- ENTRADA PARA LA DIRECCION -->
            <div class="form-group row">
              <label for="nuevaDireccion" class="col-sm-2 col-form-label">Dirección</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="detalleDireccion" readonly>
              </div>
            </div>

            <!-- ENTRADA PARA LA LOCALIDAD -->
            <div class="form-group row">
              <label for="nuevaLocalidad" class="col-sm-2 col-form-label">Localidad</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="detalleLocalidad" readonly>
              </div>
            </div>

            <!-- ENTRADA PARA EL USUARIO -->
            <div class="form-group row">
              <label for="detalleUsuario" class="col-sm-2 col-form-label">Usuario</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="detalleUsuario" readonly>
              </div>
            </div>

            <!-- ENTRADA PARA EL PERFIL -->
            <div class="form-group row">
              <label for="detallePerfil" class="col-sm-2 col-form-label">Perfil</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" id="detallePerfil" readonly>
              </div>
              <label for="detalleOcupacion" class="col-sm-2 col-form-label">Ocupacion</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" id="detalleOcupacion" readonly>
              </div>
            </div>

            <!-- ENTRADA PARA FOTO PERFIL -->

            <div class="form-group">

              <div class="panel">
                <h4>Foto Perfil</h4>
              </div>
              <div class="col-sm-12">
                <img src="views/img/users/default/anonymous.png" class="img-thumbnail previsualizarPerfilUser" width="200px">
              </div>
            </div>
            <!-- ENTRADA PARA FOTO INE -->

            <div class="form-group">

              <div class="panel">
                <h4>INE FRONTAL</h4>
              </div>
              <div class="col-sm-12">
                <img src="views/img/users/default/inefrontal.jpg" class="img-thumbnail previsualizarIneFrontalUser" width="200px">
              </div>
            </div>

          </div>

          <!-- ENTRADA PARA FOTO INE -->

          <div class="form-group">

            <div class="panel">
              <h4>INE REVERSO</h4>
            </div>
            <div class="col-sm-12">
              <img src="views/img/users/default/reverso.jpg" class="img-thumbnail previsualizarIneReversoUser" width="200px">
            </div>
          </div>

        </div>



    </div>

    <!--=====================================
        PIE DEL MODAL
        ======================================-->

    <div class="modal-footer">

      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

    </div>


    </form>

  </div>

</div>

</div>

<!--=====================================
MODAL EDITAR USUARIO
======================================-->

<div id="modalEditarUsuario" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar usuario</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="text" class="form-control input-lg" id="editarNombre" name="editarNombre" value="" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL USUARIO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-key"></i></span>

                <input type="text" class="form-control input-lg" id="editarUsuario" name="editarUsuario" value="" readonly>

              </div>

            </div>

            <!-- ENTRADA PARA LA CONTRASEÑA -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                <input type="password" class="form-control input-lg" name="editarPassword" placeholder="Escriba la nueva contraseña">

                <input type="hidden" id="passwordActual" name="passwordActual">

              </div>

            </div>

            <!-- ENTRADA PARA SELECCIONAR SU PERFIL -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-users"></i></span>

                <select class="form-control input-lg" name="editarPerfil">

                  <option value="" id="editarPerfil"></option>

                  <option value="">Selecionar perfil</option>

                  <option value="Administrador">Administrador</option>

                  <option value="Capturista">Capturista</option>

                </select>

              </div>

            </div>

            <!-- ENTRADA PARA SUBIR FOTO -->

            <div class="form-group">

              <div class="panel">SUBIR FOTO</div>

              <input type="file" class="nuevaFoto" name="editarFoto">

              <p class="help-block">Peso máximo de la foto 2MB</p>

              <img src="views/img/users/default/anonymous.png" class="img-thumbnail previsualizarEditar" width="100px">

              <input type="hidden" name="fotoActual" id="fotoActual">

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Modificar usuario</button>

        </div>

        <?php

        $editarUsuario = new ControladorUsuarios();
        $editarUsuario->ctrEditarUsuario();

        ?>

      </form>

    </div>

  </div>

</div>

<?php

$borrarUsuario = new ControladorUsuarios();
$borrarUsuario->ctrBorrarUsuario();

?>