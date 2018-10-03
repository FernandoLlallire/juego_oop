<!-- Estge es un ejemplo de formulario que solo se va a usar para -->
<?php require_once "DataSanitization.php"?>
<?php require_once "DataUpload.php"?>
<?php if (!empty($_POST)){
  saveUser($_POST);
} ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>registro</title>
  </head>
  <body>
    <form  method="post" action="register_fer.php" enctype="multipart/form-data">
      <label for="name">Name</label>
      <input type="text" name="userName" ><br>
      <label for="userName">userName</label>
      <input type="text" name="userNickname" ><br>
      <label for="email">email</label>
      <input type="email" name="userEmail" ><br>
      <select name="userCountry">
      <!-- <?php foreach ($countries as $key => $value): ?>
      <option value=<?= $key ?>><?= $value ?></option>
      <?php endforeach; ?> -->
      </select><br>
      <label for="file">archivo</label>
      <input type="file" name="imagen" ><br>
      <label for="password">password</label>
      <input type="password" name="password" ><br>
      <label for="confirmPassword">confirm password</label>
      <input type="password" name="confirmPassword" ><br>
      <input type="checkbox" name="saveLogin"> <label>Guardar sesion</label>
      <input type="submit"  value="Enviar">
    </form>
  </body>
</html>
