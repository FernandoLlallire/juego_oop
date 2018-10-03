<?php
	define('USER_IMAGE_PATH', dirname(__FILE__) . "/userimg/");
function SaveImage($file){
  $imgName = $file['name'];
  $ext = pathinfo($imgName, PATHINFO_EXTENSION);
  $temp_direction = $file['tmp_name'];
  $fileName = uniqid('img_') .  '.' . $ext;
  $finalDirectory = USER_IMAGE_PATH . $fileName;
  move_uploaded_file($temp_direction, $finalDirectory);
  return $fileName;
}
function saveUser ($post){
	$userArray = userCreator($post);
  $userJason = json_encode($userArray);
	var_dump($userJason);
  file_put_contents('db/db.json', $userJason . PHP_EOL, FILE_APPEND);/*FILE_APPEND es para que agregemos al final del archivo texto sin sobreescribir.  PHP_EOL es el fin de linea definido en php es como el <br> del html*/
  return $userArray;
}
function logIn ($arrayUser){
  unset($userArray['id']);
  unset($userArray['password']);
  $_SESSION['user'] = $arrayUser;
  header('location: profile.php');
  exit;
}
function SaveCookie($user){
  setcookie("UserLog",hash("sha256" , $user["userNickname"]));//Se usa un hasheo con hash por ahora por q en mysql se va a guardar la  hora de creacion para encryotar junto contras cosas
}
function DeleteCokie(){
	setcookie("UserLog",'', time() - 10);
}
/*IsCookieSet es una funcion que nos permite verificar si existe una cookie para nuestra pagina,
en el caso de que no exista una cookie devolvemos FALSE, pero si existe y ademas el id coincide con el de algun usuario devolvemos el usuario por completo*/
function IsCookieSet (){
	$return = FALSE;
	if (isset($_COOKIE["UserLog"])){
		$idCookie = $_COOKIE["UserLog"];
		$allUsers = getAllUsers();
		foreach ($allUsers as $user) {
			$idHasheado = hash("sha256" , $user["userNickname"]);
			if( $idHasheado ==  $idCookie){
				unset($user['id']);
				unset($user['password']);
				$return = $user;
			}
		}
	}
	return $return;
}
/*Con Loguot deslogueamos y borramos todos los datos del cookie*/
function Loguot(){
	session_start();
	session_destroy();
	DeleteCokie();
	header('location: index.php');
	exit;
}
function userCreator($user){
    $arrayUser = [
      //'id' => setId(),
      'name' => $user['userName'],
			'apellido' => $user['userSurname'],
			'nickname' => $user['userNickname'],
      'email' => $user['userEmail'],
      'password' => password_hash($user['password'], PASSWORD_DEFAULT),
      'country' => $user['userCountry'],
      'avatar' => $user['imagen'],
    ];
    return $arrayUser;
}

function getAllUsers() {
	$allDataJson = file_get_contents('db/db.json');
	$eachUser = explode(PHP_EOL, $allDataJson);
	array_pop($eachUser);//eliminamos el ultimo usuario por el tema de la configuracion
	$arrayDeCadaUsuario = [];
	foreach ($eachUser as $user) {
		$arrayDeCadaUsuario[] = json_decode($user, true);/* esto significa que por aca usuario json_decode nos devuelve un array
		este array tiene como keyvalue el elemento que esta en el json y como contenido el definido por nosotros. en sintesis $arrayDeCadaUsuario es un array de arrays*/
	}
	return $arrayDeCadaUsuario;
}
 ?>
