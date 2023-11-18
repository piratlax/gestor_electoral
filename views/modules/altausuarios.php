<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Agregar Usuario</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-right">

            <li><a href="inicio"><i class="fa fa-home"></i> Inicio/</a></li>
            <li class="active">Alta de usuarios</li>
          </ol>
          <br>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section>

    <div class="container">
      <form role="form" method="post" enctype="multipart/form-data" autoComplete="off">

        <div class="form-group">
          <div class="row">
            <div class="col-xs-12 col-sm-4">
              <label for="nombre">Nombre:</label>
              <div class="input-group">
                <input type="text" class="form-control" id="nombre" placeholder="Introduce nombre" name="nombre" autofocus required style="text-transform:uppercase;">
              </div>
            </div>

            <div class="col-xs-12 col-sm-4">
              <label for="paterno">Paterno:</label>
              <div class="input-group">
                <input type="text" class="form-control" id="paterno" placeholder="Introduce apellido paterno" name="paterno" style="text-transform:uppercase;">
              </div>
            </div>

            <div class="col-xs-12 col-sm-4">
              <label for="materno">Materno:</label>
              <div class="input-group">
                <input type="text" class="form-control" id="materno" placeholder="Introduce apellido materno" name="materno" style="text-transform:uppercase;">
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-xs-12 col-sm-4">
            <div class="form-group">
              <label for="Perfil">Perfil:</label>
              <div class="input-group">

                <select class="form-control input-lg" id="perfil" name="perfil" required>

                  <option value="">Seleccionar perfil</option>
                  <option value="Administrador">Administrador</option>
                  <option value="capturista">Capturista</option>

                </select>

              </div>

            </div>
          </div>

          <div class="col-xs-12 col-sm-4">
            <label for="usuario">Usuario:</label>
            <div class="input-group">
              <input type="text" class="form-control" id="nuevoUsuario" placeholder="Usuario para acceder al sistema" name="nuevoUsuario" required>
            </div>
          </div>

          <div class="col-xs-12 col-sm-4">
            <label for="password">Password:</label>
            <div class="input-group">
              <input type="text" class="form-control" id="nuevoPassword" placeholder="Clave de acceso" name="nuevoPassword" required>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-xs-12 col-sm-4">
            <div class="panel"><strong>Subir Foto de usuario</strong></div>

            <input type="file" class="fotoUsuario" name="fotoUsuario">

            <p class="help-block">Peso máximo de la foto 2MB</p>

            <img src="views/img/users/default/anonymous.png" class="img-thumbnail previsualizarUsuario" width="100px">
          </div>


        </div>
    </div>

    <div class="d-flex flex-row-reverse bg-secondary">
      <div class="p-2 bg-danger"><button class="btn btn-danger"><a href="usuarios">Cancelar</a></button></div>
      <div class="p-2 bg-warning"></div>
      <div class="p-2 bg-success"><button type="submit" class="btn btn-success">Integrar</button></div>
    </div>
    <?php

    $crearUsuario = new ControladorUsuarios();
    $crearUsuario->ctrCrearUsuario();

    ?>
    </form>
</div>

</section>
<!-- /.content -->
</div>