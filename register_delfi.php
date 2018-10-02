<?php
  require_once 'header.php';

  $userName = isset ($_POST['userName']) ? trim ($_POST['userName']) : '';
  $userEmail = isset ($_POST['userEmail']) ? trim ($_POST['userEmail']) : '';
  $userCountry = isset ($_POST['userCountry']) ? $_POST ['userCountry'] : '';

  $errors = [];

  $countries = [
		'ar' => 'Argentina',
		'uy' => 'Uruguay',
	];

 ?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Formulario de registro al juego</title>
  </head>
  <body>
    <form class="" action="register_delfi.php" method="post">
      <div class="container register">
                <div class="row">
                    <div class="col-md-3 register-left">
                        <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
                        <h3>¡Bienvenido!</h3>
                        <p>Estás a un paso de empezar a jugar</p>
                        <input type="submit" name="" value="Login"/><br/>
                    </div>
                    <div class="col-md-9 register-right">

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading">Registrate</h3>
                                <div class="row register-form">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input name="userName" type="text" class="form-control" placeholder="Nombre *" value="<?= $userName ?>" />
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" placeholder="Contraseña *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control"  placeholder="Repetir contraseña *" value="" />
                                        </div>
                                       </div>
                                       <div class="form-group">
                                            <select class="form-control" name="userCountry">
                                                <option class="hidden"  selected disabled>Seleccioná tu país</option>
                                                <?php foreach ($countries as $code => $country): ?>
                                        										<option <?= $code == $userCountry ? 'selected' : '' ?>
                                        										value="<?= $code ?>"><?= $country ?></option>
                                        				<?php endforeach; ?>
                                            </select>
                                      </div>
                                      <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="email" name="userEmail" class="form-control" placeholder="Email *" value="<?= $userEmail ?>" />
                                        </div>
                                        <input type="submit" class="btnRegister"  value="Registrate"/>
                                    </div>
                                </div>
                            </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>



    </form>

  </body>
</html>
<?php require_once 'footer.php';?>
