<?php
 require_once "autoload.php";

 if($userModel->isEmpty()){
   if($_POST){
     $allDataJson = file_get_contents('db/db.json');//abrimos el archivo y obtenemos el contenido, pero en forma un string gigante
     $eachUser = explode(PHP_EOL, $allDataJson);//Separamos el string en un array de sntrings separados por el EOL que es el fin de linea
     array_pop($eachUser);//eliminamos el ultimo usuario por el tema de la configuracion al hacer el explode del array(hay 1 posicion de mas)
     $objDeCadaUsuario= []; //Defino el arrya vacio, esto lo hago por que si el archivo esta vacio nunca entra al foreach y retornaria una variable inexistente. de esta manera no romperia con archivos vacios
     foreach ($eachUser as $user) {
       $objDeCadaUsuario[] = json_decode($user);/* esto significa que por aca usuario json_decode nos devuelve un array
       este array tiene como keyvalue el elemento que esta en el json y como contenido el definido por nosotros. en sintesis $arrayDeCadaUsuario es un array de arrays*/
     }
    foreach ($objDeCadaUsuario as $usuarioJson) {
      $firstName = $usuarioJson->firstName;
      $lastName = $usuarioJson->lastName;
      $userName = $usuarioJson->userName;
      $email = $usuarioJson->email;
      $password = $usuarioJson->password;
      $country = $usuarioJson->country;
      $avatar = $usuarioJson->imagen;
      $userModel->jsonToMySql ($firstName, $lastName, $userName, $email, $password, $country, $avatar);
    }
       header('location: index.php');
   }
 }else{
   header('location: index.php');
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
