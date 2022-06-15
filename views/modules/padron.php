<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Buscar en el Padron Electoral</h1>
          </div>
          <div class="col-sm-6">
              <ol class="breadcrumb float-right">

                  <li><a href="inicio"><i class="fa fa-home"></i> Inicio/</a></li>

                  <li class="active">Buscar Persona</li>

              </ol>
              <br>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="container">

        <div class="panel panel-default">
            <div class="panel-body">
                <div class="box-header with-border">

                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalBuscarElector">

                        Buscar Persona

                    </button>

                </div>
                <div class="box-body">
                    <!--activamos los valores de la tabla en caso de haber valores get-->

                    <?php
                    if (isset($_GET["nombre"])){
                        $electores = ControladorElectores::ctrMostrarElectores();
                        echo '
                    <table class="table table-bordered table-striped dt-responsive tablas" width="100%">

                        <thead>

                        <tr>

                            <th style="width:10px">#</th>
                            <th>Nombre</th>
                            <th>Paterno</th>
                            <th>Materno</th>
                            <th>Localidad</th>
                            <th>Colonia</th>
                            <th></th>
                         </tr>
                         </thead>
                        <tbody>';

                          foreach ($electores as $key => $value){
                              echo ' <tr>
                                    <td>'.$value["id"].'</td>
                                    <td>'.$value["nom"].'</td>
                                    <td>'.$value["paterno"].'</td>
                                    <td>'.$value["materno"].'</td>
                                    <td>'.$value["xloca"].'</td>
                                    <td>'.$value["colonia"].'</td>
                                    <td>
                                    <button class="btn btn-primary btnDetalleElector" idElector="'.$value["id"].'" data-toggle="modal" data-target="#modalDetalleElector"><i class="fa fa-info-circle"></i></button>
</td>
                                    </tr>
                                    ';
                            }
                          echo '
                          </tbody>
                           </table>
                          ';

                    }
                        ?>

                </div>
            </div>
        </div>


    </section>
    <!-- /.content -->
</div>

<!--=====================================
MODAL DETALLES DEL ELECTOR
======================================-->
<div id="modalDetalleElector" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

               <!--=====================================
                CABEZA DEL MODAL
                ======================================-->

                <div class="modal-header" style="background:#3c8dbc; color:white">
                    <h4 class="modal-title">Detalle del Elector</h4>
                    <button type="button" class="float-right btn btn-default btn-sm" data-dismiss="modal">Salir</button>
                </div>

                <!--=====================================
                CUERPO DEL MODAL
                ======================================-->

                <div class="modal-body">

                    <div class="box-body">

                        <!-- ENTRADA PARA EL NOMBRE -->
                        <form>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="ClaveElector">Clave de Elector</label>
                                    <input type="text" class="form-control" id="ClaveElector" name="ClaveElector" disabled>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="FechaNacimiento">Nacimiento</label>
                                    <input type="text" class="form-control" id="FechaNacimiento" disabled>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="sexo">Sexo</label>
                                    <input type="text" class="form-control" id="sexo" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="Nombre">Nombre</label>
                                <input type="text" class="form-control" id="Nombre" disabled>
                            </div>
                            <div class="form-group">
                                <label for="Direccion">Direccion</label>
                                <input type="text" class="form-control" id="Direccion" disabled>
                            </div>
                            <div class="form-group">
                                <label for="Colonia">Colonia, Cp</label>
                                <input type="text" class="form-control" id="Colonia" disabled>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="Localidad">Localidad</label>
                                    <input type="text" class="form-control" id="Localidad" disabled>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="Ocupacion">Ocupacion</label>
                                    <input type="text" class="form-control" id="Ocupacion" disabled>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="LugarNacimiento">Lugar Nac.</label>
                                    <input type="text" class="form-control" id="LugarNacimiento" disabled>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="Edo">edo</label>
                                    <input type="text" class="form-control" id="Edo" disabled>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="Dfe">dfe</label>
                                    <input type="text" class="form-control" id="Dfe" disabled>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="Dlo">dlo</label>
                                    <input type="text" class="form-control" id="Dlo" disabled>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <label for="Mun">mun</label>
                                    <input type="text" class="form-control" id="Mun" disabled>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="Secc">secc</label>
                                    <input type="text" class="form-control" id="Secc" disabled>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="Local">local</label>
                                    <input type="text" class="form-control" id="local" disabled>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="Mza">Mnza</label>
                                    <input type="text" class="form-control" id="Mza" disabled>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="LongCam">longcam</label>
                                    <input type="text" class="form-control" id="LongCam" disabled>
                                </div>
                            </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!--=====================================
MODAL BUSCAR ELECTOR
======================================-->
<div id="modalBuscarElector" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content">

            <form role="form" method="post" enctype="multipart/form-data">

                <!--=====================================
                CABEZA DEL MODAL
                ======================================-->

                <div class="modal-header" style="background:#3c8dbc; color:white">
                    <h4 class="modal-title">Ingresar datos a buscar</h4>
                    <button type="button" class="float-right btn btn-default btn-sm" data-dismiss="modal">Salir</button>
                </div>

                <!--=====================================
                CUERPO DEL MODAL
                ======================================-->

                <div class="modal-body">

                    <div class="box-body">

                        <!-- ENTRADA PARA EL NOMBRE -->

                        <div class="form-group">

                            <div class="input-group">

                                <div class="input-group-prepend">
                      <span class="input-group-text" id="inputGroupPrepend">
                          <i class="fa fa-user"></i>
                      </span>
                                </div>

                                <input type="text" class="form-control input-lg" name="buscaNombre" placeholder="Ingresar nombre">

                            </div>

                        </div>

                        <!-- ENTRADA PARA EL APELLIDO PATERNO -->
                        <div class="form-group">

                            <div class="input-group">

                                <div class="input-group-prepend">
                                  <span class="input-group-text" id="inputGroupPrepend">
                                      <i class="fa fa-user"></i>
                                  </span>
                                </div>

                                <input type="text" class="form-control input-lg" name="buscaPaterno" placeholder="Ingresar Apellido Paterno">

                            </div>

                        </div>

                        <!-- ENTRADA PARA EL APELLIDO MATERNO -->
                        <div class="form-group">

                            <div class="input-group">

                                <div class="input-group-prepend">
                                  <span class="input-group-text" id="inputGroupPrepend">
                                      <i class="fa fa-user"></i>
                                  </span>
                                </div>

                                <input type="text" class="form-control input-lg" name="buscaMaterno" placeholder="Ingresar Apellido Materno">

                            </div>
                        </div>

                        <!-- ENTRADA PARA LA LOCALIDAD -->
                        <div class="form-group">

                            <div class="input-group">

                                <div class="input-group-prepend">
                                  <span class="input-group-text" id="inputGroupPrepend">
                                      <i class="fa fa-home"></i>
                                  </span>
                                </div>

                                <input type="text" class="form-control input-lg" name="buscaLocalidad" placeholder="Ingresar Localidad">

                            </div>

                        </div>

                        <!-- ENTRADA PARA la colonia -->
                        <div class="form-group">

                            <div class="input-group">

                                <div class="input-group-prepend">
                                  <span class="input-group-text" id="inputGroupPrepend">
                                      <i class="fa fa-home"></i>
                                  </span>
                                </div>

                                <input type="text" class="form-control input-lg" name="buscaColonia" placeholder="Ingresar Colonia">

                            </div>

                        </div>

                        <!-- ENTRADA PARA LA CALLE -->
                        <div class="form-group">

                            <div class="input-group">

                                <div class="input-group-prepend">
                                  <span class="input-group-text" id="inputGroupPrepend">
                                      <i class="fa fa-home"></i>
                                  </span>
                                </div>

                                <input type="text" class="form-control input-lg" name="buscaCalle" placeholder="Ingresar Calle">

                            </div>

                        </div>

                    </div>

                </div>


                <!--=====================================
                PIE DEL MODAL
                ======================================-->

                <div class="modal-footer">

                    <button type="button" class="float-right btn btn-primary btnBuscarElector">Buscar Elector</button>

                </div>



            </form>
        </div>
    </div>
</div>


