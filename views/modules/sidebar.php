  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="inicio" class="brand-link">
      <img src="views/img/template/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Gestión Electoral</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        <?php

            if($_SESSION["foto"] != ""){

              echo '<img src="'.$_SESSION["foto"].'" class="user-image">';

            }else{


              echo '<img src="views/img/users/default/anonymous.png" class="user-image">';

            }


            ?>
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo ($_SESSION["nombre"])?></a>
          <a href="#" class="d-block"><?php echo ($_SESSION["perfil"])?></a>
          <a href="exit" class="d-block">Cerrar Sesión</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <?php
          
          if ($_SESSION["perfil"]=="Administrador"){
          echo '
            <li class="nav-item">
              <a href="usuarios" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>Usuarios</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="configuracion" class="nav-link">
                <i class="nav-icon fas fa-columns"></i>
                <p>Configuración</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="padron" class="nav-link">
                <i class="nav-icon far fa-address-card"></i>
                <p>Padron</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="organizacion" class="nav-link">
                <i class="nav-icon far fa-address-book"></i>
                <p>Organizaciones</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="coordinadores" class="nav-link">
                <i class="nav-icon fas fa-chalkboard-teacher"></i>
                <p>Coordinadores</p>
              </a>
            </li>';
          }
          ?>

          <?php

        if ($_SESSION["perfil"]=="coordinador" || $_SESSION["perfil"]=="Administrador"){
          echo '
          <li class="nav-item">
            <a href="promotores" class="nav-link">
              <i class="nav-icon fas fa-bullhorn"></i>
              <p>Promotores</p>
            </a>
          </li>';
        }
        ?>

          <li class="nav-item">
            <a href="promovidos" class="nav-link">
              <i class="nav-icon fas fa-id-card"></i>
              <p>Promovidos</p>
            </a>
          </li>
         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
