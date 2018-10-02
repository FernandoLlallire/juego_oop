<<?php
  require_once 'register-controller.php';

  if ( isLogged() ) {
    header('location: profile.php');
    exit;
  }
?>
  <?php require_once 'header.php'; ?>
  <section class="container omar-cont-Login">
    <div class="row omar-login">
      <div class="col-xs-12 col-sm-12 col-md-12">
        <form method="post" role="form" class="omar-formulario">
          <fieldset>
            <h1>Logueate</h1>
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                  <input type="email" name="userEmail" class="form-control input-lg" placeholder="E-mail">
                </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                  <input type="password" name="userPassword" class="form-control input-lg" placeholder="Contraseña">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 btnLLogin login">
                <input type="submit" class="btn btn-lg btn-success btn-block" value="Login">
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 omar-btnLRegister omar-register">
                <p>No tienes cuenta? Registrate gratis</p>
                <a href="register.php" class="btn btn-lg btn-primary btn-block">Register</a>
              </div>
            </div>
          </fieldset>
        </form>
      </div>
    </div>
  </section>
  <?php require_once 'footer.php'; ?>
