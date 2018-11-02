<?php
  require_once "autoload.php";

  $auth->isUserAlreadyLogged($userModel);

  //OJO esta no sé si va y quizás está mal. 1- ¿existe usuario? 2- ¿usuario existe, pero pass es incorrecta?
  //3- ¿usuario y pass son correctos?
  //if($auth-> isLogged()){
    //header('location: profile.php');
    //else
    //if (isset($_POST['rememberUser'])){
    //  setcookie('rememberUser', $_POST['userEmail'], time() + 3600);
    //}
    //$auth-> logIn($user->getEmail());
  //}

  $form = new LoginFormValidator($_POST,$userModel);
  if ($_POST) {
    $form->sanitizateAndValidateData();
    if(!$form->getAllErrors()){
      if ($form->getRemenberMe()){
        // dbug("tiene remember");exit;
        $auth->saveCookie($_POST);
        $auth->logIn($_POST);
      }else {
        // dbug("no tiene remember");exit;
        $auth->logIn($_POST);
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
                <label>Guardar Sesion<input type="checkbox" name="rememberUser" ></label>
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
  <?php require_once 'includes/footer.php'; ?>
