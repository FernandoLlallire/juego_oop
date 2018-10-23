<?php
  require_once 'DataSanitization.php';
  require_once 'DataUpload.php';

  $email = isset ($_POST['email']) ? trim ($_POST['email']) : '';
  $rememberMe = isset ($_POST["session"]) ? $_POST["session"] : "";
  if ($_POST) {
    $errors = sanitizateAndValidateDataLogin($_POST);
    if(!$errors){
      if ($rememberMe == true){
        saveCookie($_POST);
        logIn($_POST);
      }else {
        logIn($_POST);
      }
    }
  }
require_once 'header.php';


 ?>
  <section class="container cont-Login">
    <div class="row login">
      <div class="col-xs-12 col-sm-12 col-md-12">
        <form role="form" action="login.php" class="formulario" method="post">
          <fieldset>
            <h1>Logueate</h1>
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                  <input type="email" name="email" class="form-control input-lg <?= isset($errors['email']) ? 'is-invalid' : ''; ?>" placeholder="Email" value="<?= $email ?>">
                  <?php if (isset($errors['email'])): ?>
                    <div class="invalid-feedback">
                      <?= $errors['email'] ?>
                    </div>
                  <?php endif; ?>
                </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                  <input type="password" name="password" class="form-control input-lg <?= isset($errors['password']) ? 'is-invalid' : ''; ?>" placeholder="Contraseña">
                  <?php if (isset($errors['password'])): ?>
                    <div class="invalid-feedback">
                      <?= $errors['password'] ?>
                    </div>
                  <?php endif; ?>
                </div>
              </div>
              <div class="">
                <label>Guardar Sesion<input type="checkbox" name="session" ></label>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 btnLLogin login">
                <input type="submit" class="btn btn-lg btn-success btn-block" value="Login">
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 btnLRegister register">
                <p>¿No tenés cuenta? Registrate gratis</p>
                <a href="register.php" class="btn btn-lg btn-primary btn-block">Registrate</a>
              </div>
            </div>
          </fieldset>
        </form>
      </div>
    </div>
  </section>
  <?php require_once 'footer.php'; ?>
