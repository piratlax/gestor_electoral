<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Listado Nominal</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="home">Principal</a></li>
            <li class="breadcrumb-item active">ListadoNominal</li>
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

        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarNominal">

          Agregar

        </button>

      </div>

      <div class="box-body">

        <table class="table table-bordered table-striped dt-responsive tablas" width="100%">

          <thead>

            <tr>

              <th style="width:10px">#</th>
              <th>Nombre</th>
              <th>Paterno</th>
              <th>Materno</th>
              <th>Curp</th>
              <th>Seccion</th>
              <th>Acciones</th>

            </tr>

          </thead>

          <tbody>

            <?php

            $item = null;
            $valor = null;

            $nominal = ControladorNominal::ctrMostrarNominal($item, $valor);

            foreach ($nominal as $key => $value) {

              echo ' <tr>
              <td>' . ($key + 1) . '</td>
              <td>' . $value["nombre"] . '</td>
              <td>' . $value["paterno"] . '</td>
              <td>' . $value["materno"] . '</td>
              <td>' . $value["curp"] . '</td>
              <td>' . $value["numero"] . '</td>
              
              <td>

                <div class="btn-group">
                    
                  <button class="btn btn-warning btnEditarNominal" idNominal="' . $value["id"] . '" data-toggle="modal" data-target="#modalEditarNominal"><i class="fa fa-edit"></i></button>

                  <button class="btn btn-danger btnEliminarNominal" idNominal="' . $value["id"] . '"nominal="' . $value["id"] . '"><i class="fa fa-times"></i></button>

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
MODAL AGREGAR AL LISTADO NOMINAL
======================================-->

<div id="modalAgregarNominal" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <h4 class="modal-title">Agregar</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
            <div class="form-group row">
              <label for="nuevoNombre" class="col-sm-4 col-form-label">Nombre</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="nuevoNombre" autofocus autocomplete="off" required style="text-transform:uppercase;">
              </div>
            </div>

            <!-- ENTRADA PARA EL PATERNO -->
            <div class="form-group row">
              <label for="nuevoPaterno" class="col-sm-4 col-form-label">Paterno</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="nuevoPaterno" autofocus autocomplete="off" required style="text-transform:uppercase;">
              </div>
            </div>

            <!-- ENTRADA PARA EL MATERNO -->
            <div class="form-group row">
              <label for="nuevoMaterno" class="col-sm-4 col-form-label">Materno</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="nuevoMaterno" autofocus autocomplete="off" required style="text-transform:uppercase;">
              </div>
            </div>

            <!-- ENTRADA PARA EL CURP -->
            <div class="form-group row">
              <label for="nuevoCurp" class="col-sm-4 col-form-label">CURP</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="nuevoCurp" autofocus autocomplete="off" required style="text-transform:uppercase;">
              </div>
            </div>

            <div class="form-group row">
              <label for="Seccion" class="col-sm-4 col-form-label">Sección:</label>
              <div class="input-group col-sm-8">
                <select class="form-control input-lg" id="seccion" name="nuevoIdseccion" required>

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

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Agregar al listado</button>

        </div>
        <?php

        $crearNominal = new ControladorNominal();
        $crearNominal->ctrCrearNominal();

        ?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR USUARIO
======================================-->

<div id="modalEditarNominal" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL ID -->
            <input type="hidden" class="form-control input-lg" id="editarIdNominal" name="editarIdNominal" value="" required>

            <!-- ENTRADA PARA EL NOMBRE -->

            <div class="form-group row">
              <label for="nuevoNombre" class="col-sm-4 col-form-label">Nombre</label>
              <div class="col-sm-8">
                <input type="text" class="form-control input-lg" id="editarNombre" name="editarNombre" value="" required>
              </div>
            </div>

            <!-- ENTRADA PARA EL PATERNO -->

            <div class="form-group row">
              <label for="nuevoPaterno" class="col-sm-4 col-form-label">Paterno</label>
              <div class="col-sm-8">
                <input type="text" class="form-control input-lg" id="editarPaterno" name="editarPaterno" value="" required>
              </div>
            </div>

            <!-- ENTRADA PARA EL MATERNO -->

            <div class="form-group row">
              <label for="nuevoMaterno" class="col-sm-4 col-form-label">Materno</label>
              <div class="col-sm-8">
                <input type="text" class="form-control input-lg" id="editarMaterno" name="editarMaterno" value="" required>
              </div>
            </div>

            <!-- ENTRADA PARA EL CURP -->

            <div class="form-group row">
              <label for="nuevoCurp" class="col-sm-4 col-form-label">CURP</label>
              <div class="col-sm-8">
                <input type="text" class="form-control input-lg" id="editarCurp" name="editarCurp" value="" required>
              </div>
            </div>

            <!-- ENTRADA PARA LA SECCION -->
            <div class="form-group row">
              <label for="editarIdSeccion" class="col-sm-4 col-form-label">Sección:</label>
              <div class="input-group col-sm-8">
                <select class="form-control input-lg" name="editarIdSeccion" required>

                  <option value="" id="editarSeccion"></option>

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
        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Modificar Nominal</button>

        </div>

        <?php

        $editarNominal = new ControladorNominal();
        $editarNominal->ctrEditarNominal();

        ?>

      </form>

    </div>

  </div>

</div>

<?php

$borrarNominal = new ControladorNominal();
$borrarNominal->ctrBorrarNominal();

?>