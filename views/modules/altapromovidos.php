<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Agregar Promovido</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-right">

            <li><a href="inicio"><i class="fa fa-home"></i> Inicio/</a></li>
            <li class="active">Alta de Promotores</li>
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
          <div class="col-xs-12 col-sm-8">
            <div class="form-group">
              <label for="direccion">Dirección:</label>
              <input type="text" class="form-control" id="direccion" placeholder="Introduce la dirección de promovido" name="direccion" required style="text-transform:uppercase;">


            </div>
          </div>


          <div class="col-xs-12 col-sm-4">
            <label for="Seccion">Sección:</label>
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
                <input type="text" class="form-control" id="localidad" placeholder="Introduce localidad" name="localidad" required required style="text-transform:uppercase;">
              </div>
            </div>

            <div class="col-xs-12 col-sm-4">
              <label for="ocupacion">Ocupación:</label>
              <div class="input-group">
                <input type="text" class="form-control" id="ocupacion" placeholder="Introduce su trabajo" name="ocupacion" style="text-transform:uppercase;">
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

        <!-- Geolocalizacion -->
        <div class="form-group">
          <div class="row">
            <div class="col-xs-8 col-sm-2">
              <label for="nombre">Geolocalizacion:</label>
            </div>

            <div class="col-xs-4 col-sm-2">
              <button class="btn btn-primary geolocalizar" data-toggle="modal" data-target="#modalGeolocalizacion">

                Integrar

              </button>
            </div>

            <div class="col-xs-12 col-sm-4">
              <label for="latitud">Latitud: </label>
              <input type="text" class="form-control" id="latitud" name="latitud" readonly>
            </div>

            <div class="col-xs-12 col-sm-4">
              <label for="materno">Longitud: </label>
              <input type="text" class="form-control" id="longitud" name="longitud" readonly>

            </div>
          </div>

          <!-- Solicitudes y problematicas -->
          <div class="form-group">

            <div class="row">
              <div class="col-xs-12 col-sm-6">
                <div class="form-group">
                  <div>
                    <label for="solicitud">Tipo de Solicitud:</label>
                    <div class="input-group">

                      <select class="form-control input-lg" id="solicitud" name="solicitud" required>

                        <option value="">Seleccionar</option>

                        <?php

                        $item = null;
                        $valor = null;

                        $solicitud = ControladorSolicitudes::ctrMostrarSolicitudes($item, $valor);

                        foreach ($solicitud as $key => $value) {

                          echo '<option value="' . $value["id"] . '">' . $value["solicitud"] . '</option>';
                        }

                        ?>

                      </select>

                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="detalleSolicitud">Detalle de solicitud</label>
                  <textarea class="form-control rounded-0" id="detalleSolicitud" name="detalleSolicitud" rows="3" style="text-transform:uppercase;"></textarea>
                </div>
              </div>

              <div class="col-xs-12 col-sm-6">
                <div class="form-group">
                  <label for="problematica">Tipo de Problematica:</label>
                  <div class="input-group">

                    <select class="form-control input-lg" id="problematica" name="problematica" required>

                      <option value="">Seleccionar</option>
                      <?php

                      $item = null;
                      $valor = null;

                      $problematica = ControladorProblematicas::ctrMostrarProblematicas($item, $valor);

                      foreach ($problematica as $key => $value) {

                        echo '<option value="' . $value["id"] . '">' . $value["problematica"] . '</option>';
                      }

                      ?>
                    </select>

                  </div>

                </div>
                <div class="form-group">
                  <label for="detalleProblematica">Detalle de problematica</label>
                  <textarea class="form-control rounded-0" id="detalleProblematica" name="detalleProblematica" rows="3" style="text-transform:uppercase;"></textarea>
                </div>
              </div>
            </div>
          </div>



          <div class="form-group">
            <div class="row">
              <div class="col-xs-12 col-sm-4">
                <div class="panel"><strong>Subir Foto del promovido</strong></div>

                <input type="file" class="fotoPromovido" name="fotoPromovido">

                <p class="help-block">Peso máximo de la foto 2MB</p>

                <img src="views/img/users/default/anonymous.png" class="img-thumbnail previsualizarPromovido" width="100px">
              </div>


              <div class="col-xs-12 col-sm-4">
                <div class="panel"><strong>Subir Foto de INE frontal</strong></div>

                <input type="file" class="inePromoFrontal" name="inePromoFrontal">

                <p class="help-block">Peso máximo de la foto 2MB</p>

                <img src="views/img/users/default/inefrontal.jpg" class="img-thumbnail previsualizarPromoFrontal" width="150px">
              </div>
              <div class="col-xs-12 col-sm-4">
                <div class="panel"><strong>Subir Foto de INE Reverso</strong></div>

                <input type="file" class="inePromoReverso" name="inePromoReverso">

                <p class="help-block">Peso máximo de la foto 2MB</p>

                <img src="views/img/users/default/reverso.png" class="img-thumbnail previsualizarPromoReverso" width="150px">
              </div>
            </div>

          </div>

        </div>

        <div class="d-flex flex-row-reverse bg-secondary">
          <div class="p-2 bg-danger"><button class="btn btn-danger"><a href="promovidos">Cancelar</a></button></div>
          <div class="p-2 bg-warning"></div>
          <div class="p-2 bg-success"><button type="submit" class="btn btn-success">Integrar</button></div>
        </div>
        <?php

        $crearPromovido = new ControladorPromovidos();
        $crearPromovido->ctrCrearPromovido();

        ?>
      </form>
    </div>

  </section>
  <!-- /.content -->
</div>

<!--=====================================
MODAL INTEGRAR GEOLOCALIZACION
======================================-->
<div id="modalGeolocalizacion" class="modal fade" role="dialog">

  <div class="modal-dialog modal-lg">

    <div class="modal-content">

      <!--=====================================
                CABEZA DEL MODAL
                ======================================-->

      <div class="modal-header" style="background:#3c8dbc; color:white">
        <h4 class="modal-title">Integrar Geolocalizacion</h4>
      </div>

      <!--=====================================
                CUERPO DEL MODAL
                ======================================-->

      <div class="modal-body">

        <div class="box-body">

          <p id="status"></p>
          <a id="map-link" target="_blank"></a>

          <div id="mapid"></div>

        </div>
      </div>
      <!--=====================================
                PIE DEL MODAL
                ======================================-->

      <div class="modal-footer">

        <button type="button" class="float-right btn btn-primary" data-dismiss="modal">Integrar geolocalizacion</button>

      </div>
    </div>
  </div>
</div>