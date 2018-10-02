<<?php
  require_once 'register-controller.php';

  if ( isLogged() ) {
    header('location: profile.php');
    exit;
  }
  require_once 'header.php';
?>
  <section class="container omar-cont-Register">
    <div class="row omar-register">
      <div class="col-xs-12 col-sm-12 col-md-12 col-sm-offset-2 col-md-offset-3">
        <form method="post" role="form" class="omar-formulario">
          <h1>Registrate</h1>
          <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6">
              <div class="form-group">
                <input
                  type="text"
                  name="userFirstName"
                  placeholder="Nombre"
                  tabindex="1"
                  class="form-control input-lg <?= isset($errors['firstName']) ? 'is-invalid' : ''; ?>"
                  value="<?= $userFirstName; ?>"
                >
              </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
              <div class="form-group">
                <input type="text" name="userLastName" placeholder="Apellido" tabindex="2" class="form-control input-lg
                  <?= isset($errors['lastName']) ? 'is-invalid' : ''; ?>"value="<?= $userLastName; ?>"
                >
              </div>
            </div>
          </div>
          <div class="form-group">
            <input type="text" name="userName" class="form-control input-lg" placeholder="Nombre de usuario" tabindex="3">
          </div>
          <div class="form-group">
            <input type="email" name="userEmail" class="form-control input-lg" placeholder="E-mail" tabindex="4">
          </div>
          <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6">
              <div class="form-group">
                <input type="password" name="userPassword" class="form-control input-lg" placeholder="Contraseña" tabindex="5">
              </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
              <div class="form-group">
                <input type="password" name="userRePassword" class="form-control input-lg" placeholder="Confirmar Contraseña" tabindex="6">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12 col-md-12 omar-register omar-btnRRegister">
              <input type="submit" value="Register" class="btn btn-primary btn-block btn-lg btnRegister" tabindex="7">
            </div>
            <div class="col-xs-12 col-md-12 omar-login omar-btnRLogin">
              <p>Ya tenes cuenta? inicia sesion</p>
              <a href="login.php" class="btn btn-success btn-block btn-lg">Login</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
  <?php require_once 'footer.php'; ?>
