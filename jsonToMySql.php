<?php
// if($_POST){
//   $json=file_get_contents("db\\db.json");
//   $obj=json_decode($json);
//   var_dump($obj);//Aca va la funcion de la base de datos a la cual le pasamos el objeto de json
// }
 require_once "autoload.php";
// ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>jsonToMySql</title>
  </head>
  <body>
    <h1>Transferencia de Json a MySql</h1>
    <h6><?php var_dump($_SESSION); ?></h6>
    <h6><?php var_dump($_COOKIE); ?></h6>
    <h4><?php dbug($userModel->getAllUsers()); ?></h4>
    <?php foreach ($userModel->getAllUsers() as $user): ?>
      <?php dbug($user->user_email); ?>
    <?php endforeach; ?>
    <form action="jsonToMySql.php" method="post">
      <button type="submit" name="transferir">Transferir db!</button>
    </form>
  </body>
</html>
