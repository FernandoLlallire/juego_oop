<?php
/*this file containg all the funtions that we implemento to sanitizate all the data that came from login and register.
we dont considere the sql inyection because we work with a json file.
for all the chars that we dont allow we base in the indformation in this pages:
https://openwebinars.net/blog/sanitizar-datos-en-php/
https://stackoverflow.com/questions/5863508/php-sanitize-data
http://php.net/manual/en/book.filter.php*/
define ( 'EMPTY_NAME', "ingrese el nombre completo" );
define ( "EMPTY_USERNAME", "ingrese el nombre de usuario" );
define ( "EMPTY_SURNAME", "ingrese el apellido" );
define ( "INVALID_NAME", "Caracter invalido en el nombre, ingrese solo letras" );
define ( "INVALID_USERNAME", "Caracter invalido en UserName" );
define ( "EMPTY_MAIL", "Ingrese un mail");
define ("INVALID_MAIL","Formato de mail invalido");
define ("EXISTING_MAIL", "Mail ya registrado en la pagina");
define ("EMPTY_COUNTRY", "Seleccione un Pais");
define ("EMPTY_FILE", "Seleccione un Avatar");
define ("EXTENSION_FILE_ERROR", "Formato de imagen no valido");
define("EMPTY_PASSWORD", "Complete las contraseñas");
define("DIFERENT_PASSWORD", "Las contraseñas tienen que coincidir");
define("MIN_PASSWORD_LENGTH", "Las contraseñas tienen que tener como minimo 6 caracteres");
define('VALID_EXTENSION', ['jpg', 'png', 'jpeg', 'gif', 'svg']);
define("EXISTING_USERNAME", "El usuario ya esta registrado");
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
function sanitizateAndValidateData($post,$file){
  $errors = [];
  $archivo = $file["imagen"];
  empty($post["userName"]) ? $errors["userName"] = EMPTY_NAME : ( invalidChar(trim($post["userName"])) ? $errors["userName"] = INVALID_NAME : "" );
  //empty($post["userName"]) ? $errors["userName"] = EMPTY_USERNAME : ( invalidChar(trim($post["userName"])) ? $errors["userName"] = INVALID_USERNAME : (IsRegister($post["userName"], "userName") ? $errors["userName"]= EXISTING_USERNAME : "") ); es demasiado complejo de leer se cambia
empty($post["userSurname"]) ? $errors["userSurname"] = EMPTY_SURNAME : ( invalidChar(trim($post["userSurname"])) ? $errors["userSurname"] = INVALID_NAME : "" );
  if (empty($post["userNickname"])){
    $errors["userNickname"] = EMPTY_USERNAME;
  }elseif (invalidChar(trim($post["userNickname"]))) {
    $errors["userNickname"] = INVALID_USERNAME;
  }elseif (IsRegister($post["userNickname"], "userNickname")) {
    $errors["userNickname"]= EXISTING_USERNAME;
  }
  empty($post["UserCountry"]) ? $errors["userCountry"] = EMPTY_COUNTRY : "";

  if($archivo["error"] !== UPLOAD_ERR_OK){
    $errors["imagen"] = EMPTY_FILE;
  } elseif ( !in_array ( pathinfo($archivo['name'], PATHINFO_EXTENSION), VALID_EXTENSION ) ) {/*pathinfo junto con PATHINFO_EXTENSION nos devuelve la extension de la imagen q es apuntado en $_FILES[name] y por ultimo con el in_array nos fijamos si esta dentro del array de formatos permitidos.*/
    $errors["imagen"] = EXTENSION_FILE_ERROR;
  }
  if(empty($post["userEmail"])){
    $errors["userEmail"] = EMPTY_MAIL;
  } elseif (!filter_var($post["userEmail"], FILTER_VALIDATE_EMAIL)) {
    $errors["userEmail"] = INVALID_MAIL;
  } elseif (IsRegister($post["userEmail"],"userEmail")) {
    $errors["userEmail"] = EXISTING_MAIL;
  }
  if ( empty($post["userPassword"]) || empty($post["userRePassword"]) ) {
    $errors['userPassword'] = EMPTY_PASSWORD;
  } elseif ( $post["userPassword"] !== empty($post["userRePassword"])) { //stackoverflow aconseja que usemos el tipo de comparacion sin el tipo. y no el strcmp por ese tiene mas tiempo de ejecucion
    $errors['userPassword'] = DIFERENT_PASSWORD;
  } elseif ( strlen($post["userPassword"]) < 6 || strlen($post["userRePassword"]) < 6 ) {
    $errors['userPassword'] = 'La contraseña debe tener más de 4 caracteres';
  } return $errors;
}
/*IsRegister es una funcion generica que nos permite recorrer el array en busca de cualquier key asociativa de esta manera evitamos repetirla*/
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
 ?>
