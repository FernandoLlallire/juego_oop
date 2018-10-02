<!-- Estge es un ejemplo de formulario que solo se va a usar para -->
<?php require_once "Country.php"?>
<?php require_once "DataSanitization.php"?>
<?php require_once "GeneralFunctions.php"?>
<?php require_once "DataUpload.php"?>
<?php

if ($_POST) {
  $errors = sanitizateAndValidateData($_POST,$_FILES);
  if ( count($errors) == 0 ) {
    $imageName = saveImage($_FILES['imagen']);/*$imageName es el nombre del archivo con extension y la modificacion para q no se repitan nombres*/
    $_POST['imagen'] = $imageName;
    $arrayUser = saveUser($_POST);
    logIn($arrayUser);
    if (isset($_POST["saveLogin"])){/*Aca se revisa si existe la posicion por que el checkbox solo envia el parametro si esta seleccionado. en caso contrario no se agrega el campo en el array $_POST*/
      SaveCookie($user);//por que user ya viene con el id
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>registro</title>
  </head>
  <body>
    <form  method="post" enctype="multipart/form-data">
      <label for="name">Name</label>
      <input type="text" name="user" ><br>
      <label for="userName">userName</label>
      <input type="text" name="userName" ><br>
      <label for="email">email</label>
      <input type="email" name="email" ><br>
      <select name="country">
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
