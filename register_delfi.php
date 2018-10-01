<?php


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
    <title>Formulario</title>
  </head>
  <body>
    <form class="" action="register.php" method="post">
      <label for="">Nombre:</label>
      <input type="text" name="userName" value="<?= $userName ?>">
      <br>
      <label for="">Email:</label>
      <input type="text" name="userEmail" value="<?= $userEmail ?>">
      <br>
      <select class="" name="userCountry">
        <?php foreach ($countries as $code => $country): ?>
										<option <?= $code == $userCountry ? 'selected' : '' ?>
										value="<?= $code ?>"><?= $country ?></option>
				<?php endforeach; ?>
      </select>
      <br>
      <label for="">Contraseña:</label>
      <input type="text" name="userPassword" value="">
      <br>
      <label for="">Repetir contraseña:</label>
      <input type="text" name="userRePassword" value="">
      <button type="submit" name="button">Enviar</button>


    </form>

  </body>
</html>
