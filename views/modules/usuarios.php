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
              <th>Organizacion</th>
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

              echo '<td>' . $value["organizacion"] . '</td>
              <td>

                <div class="btn-group">
                  
                <button class="btn btn-warning btnEditarUsuario" idUsuario="' . $value["id"] . '" data-toggle="modal" data-target="#modalEditarUsuario"><i class="fa fa-edit"></i></button>
                
                
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

            <input type="text" class="form-control input-lg" id="editarIdUsuario" name="editarIdUsuario" value="" required>

            <!-- ENTRADA PARA EL NOMBRE -->

            <div class="form-group">
              <div class="input-group">
                <label for="editarNombre" class="col-sm-4 col-form-label">Nombre</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="editarNombre" name="editarNombre" autofocus autocomplete="off" readOnly style="text-transform:uppercase;">
                </div>
              </div>
            </div>

            <!-- ENTRADA PARA EL USUARIO -->

            <div class="form-group">
              <div class="input-group">
                <label for="editarUsuario" class="col-sm-4 col-form-label">Usuario</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="editarUsuario" name="editarUsuario" autofocus autocomplete="off" readOnly style="text-transform:uppercase;">
                </div>
              </div>
            </div>

            <!-- ENTRADA PARA LA CONTRASEÑA -->

            <div class="form-group">


              <div class="input-group">

                <label for="editarPassword" class="col-sm-4 col-form-label">Nueva contraseña</label>
                <div class="col-sm-8">
                  <input type="password" class="form-control input-lg" name="editarPassword" placeholder="Escriba la nueva contraseña">

                  <input type="hidden" id="passwordActual" name="passwordActual">
                </div>
              </div>

            </div>

            <!-- ENTRADA PARA SELECCIONAR SU PERFIL -->

            <div class="form-group">

              <div class="input-group">

                <label for="editarPerfil" class="col-sm-4 col-form-label">Editar Perfil</label>
                <div class="col-sm-8">

                  <select class="form-control input-lg" name="editarPerfil">

                    <option value="" id="editarPerfil"></option>

                    <option value="">Selecionar perfil</option>

                    <option value="Administrador">Administrador</option>

                    <option value="Capturista">Capturista</option>

                  </select>

                </div>
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