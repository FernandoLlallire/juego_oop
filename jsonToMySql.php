<?php
 require_once "autoload.php";
  $field="";
  $value='fer2';
  $stmt = $userModel->getConnection()->prepare("SELECT * FROM users where userName=:value");
  $stmt -> bindValue(":value",$value,PDO::PARAM_STR);
  $stmt->execute();
  dbug($stmt);
dbug($stmt->fetchall(PDO::FETCH_OBJ));
 ?>
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
    <form action="jsonToMySql.php" method="post">
      <button type="submit" name="transferir">Transferir db!</button>
    </form>
  </body>
</html>
