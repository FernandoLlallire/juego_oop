  <?php require_once 'header.php'; ?>
  <br>
  <br>
  <section class="container">
    <div class="row register">
      <div class="col-xs-12 col-sm-12 col-md-12 col-sm-offset-2 col-md-offset-3">
        <form role="form" class="formulario">
          <h1>Registrate</h1>
          <hr class="colorgraph">
          <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6">
              <div class="form-group">
                <input type="text" name="firstName" class="form-control input-lg" placeholder="Nombre" tabindex="1">
              </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
              <div class="form-group">
                <input type="text" name="lastName" class="form-control input-lg" placeholder="Apellido" tabindex="2">
              </div>
            </div>
          </div>
          <div class="form-group">
            <input type="text" name="userName" class="form-control input-lg" placeholder="Nombre de usuario" tabindex="3">
          </div>
          <div class="form-group">
            <input type="email" name="email" class="form-control input-lg" placeholder="E-mail" tabindex="4">
          </div>
          <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6">
              <div class="form-group">
                <input type="password" name="password" class="form-control input-lg" placeholder="Contraseña" tabindex="5">
              </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
              <div class="form-group">
                <input type="password" name="Repassword" class="form-control input-lg" placeholder="Confirmar Contraseña" tabindex="6">
              </div>
            </div>
          </div>
          <hr class="colorgraph">
          <div class="row">
            <div class="col-xs-12 col-md-12 register btnRRegister">
              <input type="submit" value="Register" class="btn btn-primary btn-block btn-lg btnRegister" tabindex="7">
            </div>
            <div class="col-xs-12 col-md-12 login btnRLogin">
              <p>Ya tenes cuenta? inicia sesion</p>
              <a href="login.php" class="btn btn-success btn-block btn-lg">Login</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
  <?php require_once 'footer.php'; ?>
