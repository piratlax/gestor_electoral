<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Agregar Coordinador</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-right">

            <li><a href="inicio"><i class="fa fa-home"></i> Inicio/</a></li>
            <li class="active">Alta de Coordinadores</li>
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
              <label for="organizacion">Organización:</label>
              <div class="input-group">

                <select class="form-control input-lg" id="organizacion" name="organizacion" required>

                  <option value="">Seleccionar organizacion</option>

                  <?php

                  $item = null;
                  $valor = null;

                  $organizacion = ControladorOrganizaciones::ctrMostrarOrganizaciones($item, $valor);

                  foreach ($organizacion as $key => $value) {

                    echo '<option value="' . $value["id"] . '">' . $value["organizacion"] . '</option>';
                  }

                  ?>

                </select>

              </div>

            </div>
          </div>

          <div class="col-xs-12 col-sm-4">
            <div class="form-group">
              <label for="tipo">Tipo de Coordinador:</label>
              <div class="input-group">

                <select class="form-control input-lg" id="tipo" name="tipo" required>

                  <option value="">Seleccionar tipo</option>

                  <option value="federal">Federal</option>'>
                  <option value="distrital">Distrital</option>'>
                  <option value="municipal">Municipal</option>'>
                  <option value="Zona">Zona</option>'>
                  <option value="seccional">Seccional</option>'>
                  <option value="lider">Lider</option>'>

                </select>

              </div>

            </div>
          </div>

          <div class="col-xs-12 col-sm-4">
            <label for="colonia">Sección:</label>
            <div class="input-group">
              <select class="form-control input-lg" id="seccion" name="seccion" required>

                <option value="">Seleccionar Seccional</option>

                <?php

                $item = null;
                $valor = null;

                $seccional = ControladorSeccionales::ctrMostrarSeccionales($item, $valor);

                foreach ($seccional as $key => $value) {

                  echo '<option value="' . $value["id"] . '">' . $value["numero"] . '</option>';
                }

                ?>

              </select>
            </div>
          </div>
        </div>

        <div class="form-group">

          <label for="nombre">Dirección:</label>
          <input type="text" class="form-control" id="direccion" placeholder="Introduce la dirección del coordinador" name="direccion" required style="text-transform:uppercase;">

        </div>

        <div class="form-group">
          <div class="row">
            <div class="col-xs-12 col-sm-4">
              <label for="colonia">Colonia:</label>
              <div class="input-group">
                <input type="text" class="form-control" id="colonia" placeholder="Introduce colonia" name="colonia" required required style="text-transform:uppercase;">
              </div>
            </div>

            <div class="col-xs-12 col-sm-4">
              <label for="localidad">Localidad:</label>
              <div class="input-group">
                <input type="text" class="form-control" id="localidad" placeholder="Introduce localidad" name="localidad" required>
              </div>
            </div>

            <div class="col-xs-12 col-sm-4">
              <label for="ocupacion">Ocupación:</label>
              <div class="input-group">
                <input type="text" class="form-control" id="ocupacion" placeholder="Introduce su trabajo" name="ocupacion">
              </div>
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="row">
            <div class="col-xs-12 col-sm-4">
              <label for="Celular">Celular:</label>
              <div class="input-group">
                <input type="phone" class="form-control" id="telefono" placeholder="Numero de celular" name="celular">
              </div>
            </div>

            <div class="col-xs-12 col-sm-4">
              <label for="telefono">Telefono:</label>
              <div class="input-group">
                <input type="phone" class="form-control" id="telefono" placeholder="Numero fijo" name="telefono">
              </div>
            </div>

            <div class="col-xs-12 col-sm-4">
              <label for="email">Correo Electronico:</label>
              <div class="input-group">
                <input type="email" class="form-control" id="email" placeholder="Introduce su email" name="email">
              </div>
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="row">
            <div class="col-xs-12 col-sm-6">
              <label for="usuario">Usuario:</label>
              <div class="input-group">
                <input type="text" class="form-control" id="usuario" placeholder="Usuario para acceder al sistema" name="usuario" required>
              </div>
            </div>

            <div class="col-xs-12 col-sm-6">
              <label for="password">Password:</label>
              <div class="input-group">
                <input type="text" class="form-control" id="password" placeholder="Clave de acceso" name="password" required>
              </div>
            </div>

          </div>
        </div>


        <div class="form-group">
          <div class="row">
            <div class="col-xs-12 col-sm-4">
              <div class="panel"><strong>Subir Foto de coordinador</strong></div>

              <input type="file" class="fotoCoordinador" name="fotoCoordinador">

              <p class="help-block">Peso máximo de la foto 2MB</p>

              <img src="views/img/users/default/anonymous.png" class="img-thumbnail previsualizarCoordinador" width="100px">
            </div>


            <div class="col-xs-12 col-sm-4">
              <div class="panel"><strong>Subir Foto de INE frontal</strong></div>

              <input type="file" class="ineFrontal" name="ineFrontal">

              <p class="help-block">Peso máximo de la foto 2MB</p>

              <img src="views/img/users/default/inefrontal.jpg" class="img-thumbnail previsualizarFrontal" width="150px">
            </div>
            <div class="col-xs-12 col-sm-4">
              <div class="panel"><strong>Subir Foto de INE Reverso</strong></div>

              <input type="file" class="ineReverso" name="ineReverso">

              <p class="help-block">Peso máximo de la foto 2MB</p>

              <img src="views/img/users/default/reverso.png" class="img-thumbnail previsualizarReverso" width="150px">
            </div>
          </div>

        </div>

    </div>

    <div class="d-flex flex-row-reverse bg-secondary">
      <div class="p-2 bg-danger"><button class="btn btn-danger"><a href="coordinadores">Cancelar</a></button></div>
      <div class="p-2 bg-warning"></div>
      <div class="p-2 bg-success"><button type="submit" class="btn btn-success">Integrar</button></div>
    </div>
    <?php

    $crearCoordinador = new ControladorCoordinadores();
    $crearCoordinador->ctrCrearCoordinador();

    ?>
    </form>
</div>




</section>
<!-- /.content -->
</div>