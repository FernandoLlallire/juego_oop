<?php
  require_once 'header.php';
  require_once 'DataSanitization.php';
  require_once 'DataUpload.php';
  $userEmail = isset ($_POST['userEmail']) ? trim ($_POST['userEmail']) : '';

  if ($_POST) {
    $errors = sanitizateAndValidateData($_POST, $_FILES);
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
                  <input type="email" name="userEmail" class="form-control input-lg <?= isset($errors['userEmail']) ? 'is-invalid' : ''; ?>" placeholder="Email" value="<?= $userEmail ?>">
                  <?php if (isset($errors['userEmail'])): ?>
                    <div class="invalid-feedback">
                      <?= $errors['userEmail'] ?>
                    </div>
                  <?php endif; ?>
                </div>
              </div>
              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                  <input type="password" name="password" class="form-control input-lg <?= isset($errors['userPassword']) ? 'is-invalid' : ''; ?>" placeholder="Contraseña">
                  <?php if (isset($errors['userPassword'])): ?>
                    <div class="invalid-feedback">
                      <?= $errors['userPassword'] ?>
                    </div>
                  <?php endif; ?>
                </div>
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
