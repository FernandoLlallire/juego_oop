<?php
  require_once 'header.php';
  require_once 'DataSanitization.php';
  require_once 'DataUpload.php';

//Pendiente la comunicación de la DB con la función isLogged
  // if ( isLogged() ) {
  // header('location: profile.php');
  // exit;
  // }

  $userName = isset ($_POST['userName']) ? trim ($_POST['userName']) : '';
  $userSurname = isset ($_POST['userSurname']) ? trim ($_POST['userSurname']) : '';
  $userNickname = isset ($_POST['userNickname']) ? trim ($_POST['userNickname']) : '';
  $userEmail = isset ($_POST['userEmail']) ? trim ($_POST['userEmail']) : '';
  $userCountry = isset ($_POST['userCountry']) ? $_POST ['userCountry'] : '';

if ($_POST) {
  $errors = sanitizateAndValidateData($_POST, $_FILES);
}



  $countries = [
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
                <input type="text" name="userName" class="form-control input-lg <?= isset($errors['userName']) ? 'is-invalid' : ''; ?>" placeholder="Nombre*" value="<?= $userName ?>" tabindex="1">
                  <?php if (isset($errors['userName'])): ?>
                    <div class="invalid-feedback">
                        <?= $errors['userName'] ?>
                    </div>
                  <?php endif; ?>
              </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
              <div class="form-group">
                <input type="text" name="userSurname" class="form-control input-lg <?= isset($errors['userSurname']) ? 'is-invalid' : ''; ?>" placeholder="Apellido*" value="<?= $userSurname ?>" tabindex="2">
                <?php if (isset($errors['userSurname'])): ?>
                  <div class="invalid-feedback">
                    <?= $errors['userSurname'] ?>
                  </div>
                <?php endif; ?>
              </div>
            </div>
          </div>
          <div class="form-group">
            <input type="text" name="userNickname" class="form-control input-lg <?= isset($errors['userNickname']) ? 'is-invalid' : ''; ?>" placeholder="Nombre de usuario*" value="<?= $userNickname ?>" tabindex="3">
            <?php if (isset($errors['userNickname'])): ?>
              <div class="invalid-feedback">
                <?= $errors['userNickname'] ?>
              </div>
            <?php endif; ?>
          </div>
          <div class="form-group">
            <input type="email" name="userEmail" class="form-control input-lg <?= isset($errors['userEmail']) ? 'is-invalid' : ''; ?>" placeholder="Email*" value="<?= $userEmail ?>" tabindex="4">
            <?php if (isset($errors['userEmail'])): ?>
              <div class="invalid-feedback">
                <?= $errors['userEmail'] ?>
              </div>
            <?php endif; ?>
          </div>
          <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6">
              <div class="form-group">
                <input type="password" name="password" class="form-control input-lg <?= isset($errors['userPassword']) ? 'is-invalid' : ''; ?>" placeholder="Contraseña*" tabindex="5">
                <?php if (isset($errors['userPassword'])): ?>
                  <div class="invalid-feedback">
                    <?= $errors['userPassword'] ?>
                  </div>
                <?php endif; ?>
              </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
              <div class="form-group">
                <input type="password" name="Repassword" class="form-control input-lg <?= isset($errors['userRePassword']) ? 'is-invalid' : ''; ?>" placeholder="Confirmar contraseña*" tabindex="6">
                <?php if (isset($errors['userRePassword'])): ?>
                  <div class="invalid-feedback">
                    <?= $errors['userRePassword'] ?>
                  </div>
                <?php endif; ?>
              </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
              <div class="form-group">
                <select class="form-control" name="userCountry">
                    <option class="hidden <?= isset($errors['userCountry']) ? 'is-invalid' : ''; ?>"  selected disabled>Seleccioná tu país*</option>
                    <?php foreach ($countries as $code => $country): ?>
                                <option <?= $code == $userCountry ? 'selected' : '' ?>
                                value="<?= $code ?>"><?= $country ?></option>
                    <?php endforeach; ?>

                </select>
              </div>
            </div>
          </div>
          <div class="">
            <label for="file">Archivo</label>
            <input type="file" name="file" ><br>
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
