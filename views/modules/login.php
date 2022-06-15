
<!-- hacer un fondo con imagen -->
<div class="login-page">

  <div class="login-box">
    <div class="login-logo">
      <!-- <img src="views/img/template/AdminLTELogo.png" class="rounded mx-auto d-block" alt=""> -->
      <b>Gestor</b> GR</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Accede para iniciar sesión</p>

        <form method="post">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Usuario" name="ingUsuario" required autofocus>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" name="ingPassword" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <div>
                
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Acceder</button>
            </div>
            <!-- /.col -->
          </div>
          <?php
            $login = new ControladorUsuarios();
            $login->ctrAccesoUsuario();
          ?>
        </form>

        
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
<!-- /.login-box -->
</div>