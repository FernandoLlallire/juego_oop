<?php
/*this file containg all the funtions that we implemento to sanitizate all the data that came from login and register.
we dont considere the sql inyection because we work with a json file.
for all the chars that we dont allow we base in the indformation in this pages:
https://openwebinars.net/blog/sanitizar-datos-en-php/
https://stackoverflow.com/questions/5863508/php-sanitize-data
http://php.net/manual/en/book.filter.php*/
defined ( "EMPTY_NAME", "ingrese el nombre completo" );
defined ( "EMPTY_USERNAME", "ingrese el nombre de usuario completo" );
defined ( "INVALID_NAME", "Caracter invalido en el nombre, ingrese solo letras" );
defined ( "INVALID_USERNAME", "Caracter invalido en UserName" );
defined ( "EMPTY_MAIL", "Ingrese un mail");
defined ("INVALID_MAIL","Formato de mail invalido");
defined ("EXISTING_MAIL", "Mail ya registrado en la pagina");
defined ("EMPTY_COUNTRY", "Seleccione un Pais");
defined ("EMPTY_FILE", "Seleccione un Avatar");
defined ("EXTENSION_FILE_ERROR", "Formato de imagen no valido");
define("EMPTY_PASSWORD", "Complete las contraseñas");
define("DIFERENT_PASSWORD", "Las contraseñas tienen que coincidir");
define("MIN_PASSWORD_LENGTH", "Las contraseñas tienen que tener como minimo 6 caracteres")
define('VALID_EXTENSION', ['jpg', 'png', 'jpeg', 'gif', 'svg']);
define("EXISTING_USERNAME", "El usuario ya esta registrado")
$forbidden_chars= [ "?",
                    "[",
                    "]",
                    "/",
                    "\\",
                    "=",
                    "<",
                    ">",
                    ":",
                    ";",
                    ",",
                    "'",
                    "\"",
                    "&",
                    "$",
                    "#",
                    "*",
                    "(",
                    ")" ,
                    "|",
                    "~",
                    "`",
                    "!",
                    "{",
                    "}",
                    "%",
                    "+" ];
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
  $archivo = $file["file"];
  empty($post["name"]) ? $errors["name"] = EMPTY_NAME : ( invalidChar(trim($post["name"])) ? $errors["name"] = INVALID_NAME : "" );
  //empty($post["userName"]) ? $errors["userName"] = EMPTY_USERNAME : ( invalidChar(trim($post["userName"])) ? $errors["userName"] = INVALID_USERNAME : (IsRegister($post["userName"], "userName") ? $errors["userName"]= EXISTING_USERNAME : "") ); es demasiado villa se saca

  if (empty($post["userName"])){
    $errors["userName"] = EMPTY_USERNAME;
  }elseif (invalidChar(trim($post["userName"]))) {
    $errors["userName"] = INVALID_USERNAME;
  }elseif (IsRegister($post["userName"], "userName")) {
    $errors["userName"]= EXISTING_USERNAME;
  }

  empty($post["country"]) ? $errors["country"] = EMPTY_COUNTRY : "";
  if($archivo["error"] !== UPLOAD_ERR_OK){
    $errors["file"] = EMPTY_FILE;
  } elseif ( !in_array ( pathinfo($archivo['name'], PATHINFO_EXTENSION), VALID_EXTENSION ) ) {
    $errors["file"] = EXTENSION_FILE_ERROR;
  }

  if(empty($post["email"])){
    $errors["email"] = EMPTY_MAIL;
  } elseif (!filter_var($post["email"], FILTER_VALIDATE_EMAIL)) {
    $errors["email"] = INVALID_MAIL;
  } elseif (IsRegister($post["email"],"mail")) {
    $errors["email"] = EXISTING_MAIL;
  }

  if ( empty($post["password"]) || empty($post["confirmPassword"]) ) {
    $errors['password'] = EMPTY_PASSWORD;
  } elseif ( $post["password"] !== empty($post["confirmPassword"]) { //stackoverflow aconseja que usemos el tipo de comparacion sin el tipo. y no el strcmp por ese tiene mas tiempo de ejecucion
    $errors['password'] = DIFERENT_PASSWORD;
  } elseif ( strlen($post["password") < 6 || strlen($post["confirmPassword"]) < 6 ) {
    $errors['password'] = 'La contraseña debe tener más de 4 caracteres';
  }
  return $errors;
}

function IsRegister ($mail, $field) {
  $allUsers = getAllUsers();//aca allUsers es una matriz en la que tenemos todo separado por los
  $return = FALSE;
  foreach ($allUsers[$field] as $registerMail) {
    if ($registerMail === $mail){
      $return = TRUE;
    }
  }
  return $return;
}

 ?>
