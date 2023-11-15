<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Administrar Seccionales</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="home">Principal</a></li>
            <li class="breadcrumb-item active">Seccionales</li>
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

        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarSeccional">

          Agregar Sección

        </button>

      </div>

      <div class="box-body">

        <table class="table table-bordered table-striped dt-responsive tablas" width="100%">

          <thead>

            <tr>

              <th style="width:10px">#</th>
              <th>Numero</th>
              <th>Casillas</th>
              <th>Ubicación</th>
              <th>Zona</th>
              <th>Acciones</th>

            </tr>

          </thead>

          <tbody>

            <?php

            $item = null;
            $valor = null;

            $seccionales = ControladorSeccionales::ctrMostrarSeccionales($item, $valor);

            foreach ($seccionales as $key => $value) {

              echo ' <tr>
              <td>' . ($key + 1) . '</td>
              <td>' . $value["numero"] . '</td>
              <td>' . $value["tipo_casilla"] . '</td>
              <td>' . $value["ubicacion"] . '</td>
              <td>' . $value["zona"] . '</td>
              
              <td>

                <div class="btn-group">
                    
                  <button class="btn btn-warning btnEditarSeccional" idSeccional="' . $value["id"] . '" data-toggle="modal" data-target="#modalEditarSeccional"><i class="fa fa-edit"></i></button>

                  <button class="btn btn-danger btnEliminarSeccional" idSeccional="' . $value["id"] . '"  numero="' . $value["numero"] . '"><i class="fa fa-times"></i></button>

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
MODAL AGREGAR SECCIONAL
======================================-->

<div id="modalAgregarSeccional" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <h4 class="modal-title">Agregar Seccional</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA NUMERO DE SECCIONAL -->
            <div class="form-group row">
              <label for="nuevoNumero" class="col-sm-4 col-form-label">Numero</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="nuevoNumero" autofocus autocomplete="off" required style="text-transform:uppercase;">
              </div>
            </div>

            <!-- ENTRADA PARA TIPO DE CASILLA -->
            <div class="form-group row">
              <label for="nuevoTipoCasilla" class="col-sm-4 col-form-label">Tipo de Casilla</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="nuevoTipoCasilla" autofocus autocomplete="off" required style="text-transform:uppercase;">
              </div>
            </div>

            <!-- ENTRADA PARA LA UBICACION -->
            <div class="form-group row">
              <label for="nuevaUbicacion" class="col-sm-4 col-form-label">Ubicación</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="nuevaUbicacion" autofocus autocomplete="off" required style="text-transform:uppercase;">
              </div>
            </div>

            <div>
              <label for="nuevaZona">Tipo de Zona:</label>
              <div class="input-group">

                <select class="form-control input-lg" id="nuevZona" name="nuevaZona" required>

                  <option value="">Seleccionar</option>
                  <option value="Alta">Alta</option>';
                  <option value="Baja">Baja</option>';
                  <option value="Urbana">Urbana</option>';

                </select>

              </div>
            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar Sección</button>

        </div>
        <?php

        $crearSeccion = new ControladorSeccionales();
        $crearSeccion->ctrCrearSeccionales();

        ?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR SECCIONAL
======================================-->

<div id="modalEditarSeccional" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Sección</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">


            <input type="hidden" class="form-control input-lg" id="editarIdSeccional" name="editarIdSeccional" value="" required>

            <div class="form-group row">

              <!-- ENTRADA PARA EL NUMERO -->
              <label for="editarNumero" class="col-sm-4 col-form-label">Numero</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="editarNumero" name="editarNumero" autofocus autocomplete="off" required style="text-transform:uppercase;">
              </div>
            </div>

            <!-- ENTRADA PARA TIPO DE CASILLA -->
            <div class="form-group row">
              <label for="editarTipoCasilla" class="col-sm-4 col-form-label">Tipo de Casilla</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="editarTipoCasilla" name="editarTipoCasilla" autofocus autocomplete="off" required style="text-transform:uppercase;">
              </div>
            </div>

            <!-- ENTRADA PARA LA UBICACION -->
            <div class="form-group row">
              <label for="editarUbicacion" class="col-sm-4 col-form-label">Ubicación</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="editarUbicacion" name="editarUbicacion" autofocus autocomplete="off" required style="text-transform:uppercase;">
              </div>
            </div>

            <!-- ENTRADA PARA LA ZONA -->
            <div>
              <label for="editarZona">Tipo de Zona:</label>
              <div class="input-group">

                <select class="form-control input-lg" name="editarZona" required>
                  <option value="" id="editarZona"></option>
                  <option value="">Seleccionar</option>
                  <option value="Alta">Alta</option>';
                  <option value="Baja">Baja</option>';
                  <option value="Urbana">Urbana</option>';

                </select>

              </div>
            </div>

          </div>


        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Modificar Sección</button>

        </div>

        <?php

        $editarSeccionales = new ControladorSeccionales();
        $editarSeccionales->ctrEditarSeccionales();

        ?>

      </form>
    </div>
  </div>

</div>

<?php

$borrarSeccionales = new ControladorSeccionales();
$borrarSeccionales->ctrBorrarSeccional();

?>