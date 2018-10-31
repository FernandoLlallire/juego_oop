<?php
require_once 'header.php';
require_once 'DataSanitization.php';
require_once 'DataUpload.php';
require_once "classes/LoginFormValidator.php";
  if(isset($_COOKIE["user"])){
    $user=getUserFromCookie();
    if($user){
      logIn($user["email"]);
    }
  }
  if(isset($_SESSION["user"])){
    header('location: profile.php');
    exit;
  }
  $form = new LoginFormValidator($_POST);
  if ($_POST) {
    $form->sanitizateAndValidateData($_POST);
    if(!$form->getAllErrors()){
      if ($form->getRemenberMe()){
        saveCookie($_POST);
        logIn($_POST);
      }else {
        logIn($_POST);
      }
    }
  }



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
                  <input type="email" name="email" class="form-control input-lg <?= $form->fieldHasError("email") ? 'is-invalid' : ''; ?>" placeholder="Email" value="<?= $form->getEmail() ?>">
                  <?php if ($form->fieldHasError("email")): ?>
                    <div class="invalid-feedback">
                      <?= $form->getFieldError("email"); ?>
                    </div>
                  <?php endif; ?>
                </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                  <input type="password" name="password" class="form-control input-lg <?= $form->fieldHasError("password") ? 'is-invalid' : ''; ?>" placeholder="Contraseña">
                  <?php if ($form->fieldHasError("email")): ?>
                    <div class="invalid-feedback">
                      <?= $form->getFieldError("password"); ?>
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
