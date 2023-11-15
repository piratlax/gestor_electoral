<?php session_start();
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>Gestión Electoral</title>
  <!-- Icono de la pagina -->
  <link rel="icon" href="views/img/template/AdminLTELogo.png">
  <!-- Tell the browser to be responsive to screen width -->
  <!-- Daterange picker -->
  <link rel="stylesheet" href="views/plugins/daterangepicker/daterangepicker.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="views/plugins/fontawesome-free/css/all.min.css">
  <!-- OpenStreetMap -->
  <!-- <link rel="stylesheet" href="https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v5.3.0/css/ol.css"> -->

  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />

  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="views/css/adminlte.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Data Tables -->
  <link rel="views/plugins/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="views/plugins/datatables.net-bs/css/responsive.bootstrap.min.css">
  <!-- jQuery -->
  <script src="views/plugins/jquery/jquery.min.js"></script>
  <!-- Sweet Alert2 -->
  <script src="views/plugins/sweetalert2/sweetalert2.all.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="views/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- jQuery UI -->
  <script src="views/plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- AdminLTE App -->
  <script src="views/js/adminlte.min.js"></script>
  <!-- ChartJS -->
  <script src="views/plugins/chart.js/Chart.min.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="views/plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="views/plugins/moment/moment.min.js"></script>
  <script src="views/plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="views/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Graficador -->
  <script src="views/js/graficos.js"></script>
  <!-- Datatables -->
  <script src="views/plugins/datatables/jquery.dataTables.min.js"></script>
  <!-- Datatables responsives-->
  <script src="views/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
  <script src="views/plugins/datatables-bs4/js/dataTables.responsive.min.js"></script>
  <script src="views/plugins/datatables-bs4/js/responsive.bootstrap4.min.js"></script>
  <!-- OpenStreetMaps-->
  <!-- <script src="https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v5.3.0/build/ol.js"></script> -->

  <!-- Make sure you put this AFTER Leaflet's CSS -->
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>

</head>

<body class="hold-transition sidebar-collapse sidebar-mini layout-fixed ">

  <!-- Site wrapper -->

  <?php

  //validamos si ya inicio sesion
  if (isset($_SESSION["session_start"]) && $_SESSION["session_start"] == "c195b44182f3da8e9b3797915ad450aa") {
    echo '<div class="wrapper">';
    include "modules/header.php";
    include "modules/sidebar.php";

    if (isset($_GET["ruta"])) {
      if (
        $_GET["ruta"] == "exit" ||
        $_GET["ruta"] == "usuarios" ||
        $_GET["ruta"] == "altausuarios" ||
        $_GET["ruta"] == "inicio" ||
        $_GET["ruta"] == "configuracion" ||
        $_GET["ruta"] == "solicitudes" ||
        $_GET["ruta"] == "problematicas" ||
        $_GET["ruta"] == "organizacion" ||
        $_GET["ruta"] == "coordinadores" ||
        $_GET["ruta"] == "agregarcoordinador" ||
        $_GET["ruta"] == "altapromotor" ||
        $_GET["ruta"] == "promotores" ||
        $_GET["ruta"] == "promovidos" ||
        $_GET["ruta"] == "altapromovidos" ||
        $_GET["ruta"] == "altacoordinador" ||
        $_GET["ruta"] == "seccionales" ||
        $_GET["ruta"] == "nominal"
      ) {
        include "modules/" . $_GET["ruta"] . ".php";
      } else {
        include "modules/404.php";
      }
    }

    include "modules/footer.php";
    echo '</div>';
  } else {
    include "modules/login.php";
  }
  ?>
  <!-- ./wrapper -->

  <!-- Codigos JS -->
  <script src="views/js/template.js"></script>
  <script src="views/js/usuarios.js"></script>
  <script src="views/js/padron.js"></script>
  <script src="views/js/organizacion.js"></script>
  <script src="views/js/seccional.js"></script>
  <script src="views/js/nominal.js"></script>
  <script src="views/js/altacoordinador.js"></script>
  <script src="views/js/altapromotor.js"></script>
  <script src="views/js/altapromovido.js"></script>
</body>

</html>