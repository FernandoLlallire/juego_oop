<?php
if($_POST){
  $json=file_get_contents("db\\db.json");
  $obj=json_decode($json);
  var_dump($obj);//Aca va la funcion de la base de datos a la cual le pasamos el objeto de json
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>jsonToMySql</title>
  </head>
  <body>
    <h1>Transferencia de Json a MySql</h1>
    <form action="jsonToMySql.php" method="post">
      <button type="submit" name="transferir">Transferir db!</button>
    </form>
  </body>
</html>
