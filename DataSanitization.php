<?php

/*this file containg all the funtions that we implemento to sanitizate all the data that came from login and register.
we dont considere the sql inyection because we work with a json file.
for all the chars that we dont allow we base in the indformation in this pages:
https://openwebinars.net/blog/sanitizar-datos-en-php/
https://stackoverflow.com/questions/5863508/php-sanitize-data
http://php.net/manual/en/book.filter.php*/
define ( "ERROR_EMPTY_NAME", "ingrese el nombre completo" );
define ( "ERROR_EMPTY_firstName", "ingrese el nombre de usuario" );
define ( "ERROR_EMPTY_SURNAME", "ingrese el apellido" );
define ( "ERROR_INVALID_NAME", "Caracter invalido en el nombre, ingrese solo letras" );
define ( "ERROR_INVALID_firstName", "Caracter invalido en firstName" );
define ( "ERROR_EMPTY_MAIL", "Ingrese un mail" );
define ( "ERROR_INVALID_MAIL","Formato de mail invalido" );
define ( "ERROR_EXISTING_MAIL", "Mail ya registrado en la pagina" );
define ( "ERROR_EMPTY_COUNTRY", "Seleccione un Pais" );
define ( "ERROR_EMPTY_FILE", "Seleccione un Avatar" );
define ( "ERROR_EXTENSION_FILE", "Formato de imagen no valido" );
define ( "ERROR_EMPTY_PASSWORD", "Complete las contraseñas" );
define ( "ERROR_DIFERENT_PASSWORD", "Las contraseñas tienen que coincidir" );
define ( "ERROR_MIN_PASSWORD_LENGTH", "Las contraseñas tienen que tener como minimo 6 caracteres" );
define ( "VALID_EXTENSION", ["jpg", "png", "jpeg", "gif", "svg"] );
define ( "ERROR_EXISTING_firstName", "El usuario ya esta registrado" );
define ( "ERROR_LENGTH_PASSWORD", "La contraseña debe tener más de 4 caracteres" );
define ("ERROR_NOT_VALID_USER", "Usuario No registrado");
define ("ERROR_INVALID_PASSWORD", "Contraseña incorrecta");
$forbidden_chars= [ "?","[","]","/","\\","=","<",">",":",";",",","'","\"","&","$","#","*","(",")" ,"|","~","`","!","{","}","%","+" ];
/*we allow the following special characters but no the ones in $forbidden_chars.
the value by default is false if everything  is ok.*/
function invalidChar($data){
  global $forbidden_chars;
  $return = FALSE;
  foreach ($forbidden_chars as $value) {
    if(strpos($data,$value)){
      $return = TRUE;
    }
  }
  return $return;
}
function sanitization($data){
//$data = trim($data);
$dataSanitizate = filter_var ($data, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH | FILTER_FLAG_STRIP_BACKTICK | FILTER_FLAG_NO_ENCODE_QUOTES); /* se ponen todos los filtros para caractecres especiales en donde se tiene que son filtros de bits a los cuales podemos hacer un or. http://php.net/manual/en/filter.filters.flags.php*/
return $dataSanitizate;
}
function sanitizateAndValidateDataRegister($post,$file){
  $errors = [];
  /*empty nos devuelve un true si el elemento esta vacio o es false. en este caso */
  empty($post["firstName"]) ? $errors["firstName"] = ERROR_EMPTY_NAME : ( invalidChar(trim($post["firstName"])) ? $errors["firstName"] = ERROR_INVALID_NAME : "" );
  empty($post["lastName"]) ? $errors["lastName"] = ERROR_EMPTY_SURNAME : ( invalidChar(trim($post["lastName"])) ? $errors["lastName"] = ERROR_INVALID_NAME : "" );
  if (empty($post["userName"])){
    $errors["userName"] = ERROR_EMPTY_firstName;
  }elseif (invalidChar(trim($post["userName"]))) {
    $errors["userName"] = ERROR_INVALID_firstName;
  }elseif (IsRegister($post["userName"], "userName")) {
    $errors["userName"]= ERROR_EXISTING_firstName;
  }

  empty($post["country"]) ? $errors["country"] = ERROR_EMPTY_COUNTRY : "";

  $archivo = (isset($file["imagen"]) ? $file["imagen"] : "");
  if (isset($archivo["error"])) {
    if($archivo["error"] !== UPLOAD_ERR_OK){
     $errors["imagen"] = ERROR_EMPTY_FILE;
   } elseif ( !in_array ( pathinfo($archivo['name'], PATHINFO_EXTENSION), VALID_EXTENSION ) ) {/*pathinfo junto con PATHINFO_EXTENSION nos devuelve la extension de la imagen q es apuntado en $_FILES[name] y por ultimo con el in_array nos fijamos si esta dentro del array de formatos permitidos.*/
     $errors["imagen"] = ERROR_EXTENSION_FILE;
   }
  }

  if(empty($post["email"])){
    $errors["email"] = ERROR_EMPTY_MAIL;
  } elseif (!filter_var($post["email"], FILTER_VALIDATE_EMAIL)) {
    $errors["email"] = ERROR_INVALID_MAIL;
  } elseif (IsRegister($post["email"],"email")) {
    $errors["email"] = ERROR_EXISTING_MAIL;
  }

  if ( empty($post["password"]) || empty($post["rePassword"]) ) {
    $errors['password'] = ERROR_EMPTY_PASSWORD;
  } elseif ( $post["password"] !== $post["rePassword"]) { //stackoverflow aconseja que usemos el tipo de comparacion sin el tipo. y no el strcmp por ese tiene mas tiempo de ejecucion
    $errors['password'] = ERROR_DIFERENT_PASSWORD;
  } elseif ( strlen($post["password"]) < 4 || strlen($post["rePassword"]) < 4 ) {
    $errors['password'] = ERROR_LENGTH_PASSWORD;
  } return $errors;
}
function sanitizateAndValidateDataLogin ($post){
  $errors = [];
  if(empty($post["email"])){
    $errors["email"] = ERROR_EMPTY_MAIL;
  } elseif (!filter_var($post["email"], FILTER_VALIDATE_EMAIL)) {
    $errors["email"] = ERROR_INVALID_MAIL;
  } elseif(!IsRegister($post["email"],"email")){
    $errors["email"] = ERROR_NOT_VALID_USER;
  } elseif ( empty($post["password"]) ) {
    $errors['password'] = ERROR_EMPTY_PASSWORD;
  } else {
    if (!IsRegisterPassword($post)){
      $errors["password"] = ERROR_INVALID_PASSWORD;
    }
  }
  return $errors;
}

/*IsRegister es una funcion generica que nos permite recorrer el array en busca de cualquier key asociativa de esta manera evitamos repetirla
$value representa el valor a comprar
$field representa el nombre del campo que vamos a comprar*/
function IsRegister ($value, $field) {
  $allUsers = getAllUsers();//aca allUsers es un array de arrays en la que tenemos todos los usuarios y cada elemento por separado
  $return = FALSE;
  foreach ($allUsers as $user) {
    if ($user[$field] === $value){
      $return = TRUE;
    }
  }
  return $return;
}
function IsRegisterPassword ($post) {
  $allUsers = getAllUsers();//aca allUsers es un array de arrays en la que tenemos todos los usuarios y cada elemento por separado
  $return = FALSE;
  foreach ($allUsers as $user) {
    if ( $user["email"] === $post["email"] && password_verify ( $post["password"] , $user["password"] )) {
      $return = TRUE;
    }
  }
  return $return;
}
?>
