<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link href="https://fonts.googleapis.com/css?family=Baloo+Tammudu" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
  <title>Login</title>
</head>
<body>
  <?php require_once 'header.php'; ?>


  <div class="container">
    <div class="row login">
      <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
        <form role="form">
          <fieldset class="formulario">
            <h1>Logueate</h1>
            <hr class="colorgraph">
            <div class="form-group laCajaDeAnto">
              <input type="email" name="email" class="form-control input-lg" placeholder="E-mail">
            </div>
            <div class="form-group laCajaDeAnto">
              <input type="password" name="password" class="form-control input-lg" placeholder="Contraseña">
            </div>
            <hr class="colorgraph"> <!-- agregar colorgraph luego -->
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 btnLLogin login">
                <input type="submit" class="btn btn-lg btn-success btn-block" value="Login">
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 btnLRegister register">
                <p>No tienes cuenta? Registrate gratis</p>
                <a href="register.php" class="btn btn-lg btn-primary btn-block">Register</a>
              </div>
            </div>
          </fieldset>
        </form>
      </div>
    </div>
  </div>
  <?php require_once 'footer.php'; ?>
</body>
</html>
