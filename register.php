<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link href="https://fonts.googleapis.com/css?family=Baloo+Tammudu" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <title>Registro</title>
</head>
<body>
  <!DOCTYPE html>
  <html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
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
    </div>
  </body>
  </html>
</body>
</html>
