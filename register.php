<?php
  require_once 'header.php';
  /*require_once 'DataSanitization.php';
  require_once 'DataUpload.php';*/
  require_once "clases/RegisterFormValidator.php";
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
  $form = new RegisterFormValidator($_POST,$_FILES);

if ($_POST) {
  sanitizateAndValidateDataRegister($_POST, $_FILES);
  if (!getAllErrors()){
    $_POST["avatar"] = $_FILES["imagen"];//$_FILES es un array donde estan todos los archivos que subamos, en este caso mandamos todos los datos de nuestra imagen (nombre puesto en el label del input)
    saveUser($_POST);
    if ($rememberMe == true){
      saveCookie($_POST);
      logIn($_POST);
    }else {
      logIn($_POST);
    }
  }
}



  $countries = [
    ''   => 'Seleccioná tu país*',
		'ar' => 'Argentina',
		'uy' => 'Uruguay',
	];

 ?>


  <section class="container cont-Register">
    <div class="row register">
      <div class="col-xs-12 col-sm-12 col-md-12 col-sm-offset-2 col-md-offset-3">
        <form role="form" action="register.php" class="formulario" method="post" enctype="multipart/form-data">
          <h1>Registrate</h1>
          <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6">
              <div class="form-group">
                <input typze="text" name="firstName" class="form-control input-lg <?= $form->fieldHasError("firstName") ? 'is-invalid' : ''; ?>" placeholder="Nombre*" value="<?= $form->getfirstName() ?>" tabindex="1">
                  <?php if ($form->fieldHasError("firstName")): ?>
                    <div class="invalid-feedback">
                        <?= $form->getFieldError("firstName"); ?>
                    </div>
                  <?php endif; ?>
              </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
              <div class="form-group">
                <input type="text" name="lastName" class="form-control input-lg <?= $form->fieldHasError("lastName") ? 'is-invalid' : ''; ?>" placeholder="Apellido*" value="<?= $form->getlastName() ?>" tabindex="2">
                <?php if ($form->fieldHasError("lastName")): ?>
                  <div class="invalid-feedback">
                    <?= $form->getFieldError("lastName");?>
                  </div>
                <?php endif; ?>
              </div>
            </div>
          </div>
          <div class="form-group">
            <input type="text" name="userName" class="form-control input-lg <?= $form->fieldHasError("userName") ? 'is-invalid' : ''; ?>" placeholder="Nombre de usuario*" value="<?= $form->getUserName() ?>" tabindex="3">
            <?php if ($form->fieldHasError("userName")): ?>
              <div class="invalid-feedback">
                <?= $form->getFieldError("userName"); ?>
              </div>
            <?php endif; ?>
          </div>
          <div class="form-group">
            <input type="email" name="email" class="form-control input-lg <?= $form->fieldHasError("email") ? 'is-invalid' : ''; ?>" placeholder="Email*" value="<?= $form->getEmail(); ?>" tabindex="4">
            <?php if ($form->fieldHasError("email")): ?>
              <div class="invalid-feedback">
                <?= $form->getFieldError("email"); ?>
              </div>
            <?php endif; ?>
          </div>
          <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6">
              <div class="form-group">
                <input type="password" name="password" class="form-control input-lg <?= $form->fieldHasError("password") ? 'is-invalid' : ''; ?>" placeholder="Contraseña*" tabindex="5">
                <?php if ($form->fieldHasError("password")): ?>
                  <div class="invalid-feedback">
                    <?= $form->getFieldError("password");?>
                  </div>
                <?php endif; ?>
              </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
              <div class="form-group">
                <input type="password" name="rePassword" class="form-control input-lg <?= $form->fieldHasError("password") ? 'is-invalid' : ''; ?>" placeholder="Confirmar contraseña*" tabindex="6">
                <?php if ($form->fieldHasError("password")): ?>
                  <div class="invalid-feedback">
                    <?= $form->getFieldError("password"); ?>
                  </div>
                <?php endif; ?>
              </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
              <div class="form-group">
                <select class="form-control <?= $form->fieldHasError("country") ? 'is-invalid' : ''; ?>" name="country">
                    <?php foreach ($countries as $code => $country): ?>
                                <option <?= $code == $form->getCountry() ? 'selected' : '' ?>
                                value="<?= $code ?>"><?= $country ?></option>
                    <?php endforeach; ?>

                </select>
              </div>
            </div>
          </div>
          <div class="">
            <label for="file">Archivo</label>
            <input type="file" name="imagen" ><br>
          </div>
          <div class="">
            <label>Guardar Sesion<input type="checkbox" name="session" ></label>
          </div>
          <div class="row">
            <div class="col-xs-12 col-md-12 register btnRRegister">
              <input type="submit" value="Register" class="btn btn-primary btn-block btn-lg btnRegister" tabindex="7">
            </div>
            <div class="col-xs-12 col-md-12 login btnRLogin">
              <p>¿Ya tenés cuenta? iniciá sesion</p>
              <a href="login.php" class="btn btn-success btn-block btn-lg">Login</a>
            </div>
          </div>
        </form>
      </div>
    </div>

  </section>
  <?php require_once 'footer.php'; ?>
