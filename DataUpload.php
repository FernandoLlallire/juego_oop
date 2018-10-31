<?php
	define('USER_IMAGE_PATH', dirname(__FILE__) . "\\userimg\\");//ojo con la ruta por q es para windows


/*saveUser toda todo el array que viene del post (Recordar que le agregamos los datos del $_FILES en una posicon del array) y lo manda al json*/
function saveUser ($post){
	$userArray = userCreator($post);
  $userJason = json_encode($userArray);
  file_put_contents('db/db.json', $userJason . PHP_EOL, FILE_APPEND);/*FILE_APPEND es para que agregemos al final del archivo texto sin sobreescribir.  PHP_EOL es el fin de linea definido en php es como el <br> del html*/
  return $userArray;
}

/**
 * Funcion de login de usuarios
 *
 * Guarda el usuario en sesión, antes quita el campo de contraseñarray
 *
 * @param array $user
 */
function logIn ($user){
	session_start();

  $_SESSION['user'] = getUserbyEmail($user["email"]);
  header('location: profile.php');
  exit;
}

function saveCookie($user){
  setcookie("user",hash("sha256" , $user["email"]),strtotime( '+30 days' ));//Se usa un hasheo con hash por ahora por q en mysql se va a guardar la  hora de creacion para encryotar junto contras cosas
}
function DeleteCokie(){
	setcookie("user",'', time() - 10);
}
/**
 * Retorna el usuario obtenido desde la cookie
 *
 * esta funcion la vamos a usar para obtener el usuario desde la cookie, si bien todo el usuario esta definido en $_SESSION
 * aca podemos obtenerlo para cuando la cookie esta seteada (le dijimos que nos recuerde) y entramos por primera vez en la pagina
 *
 * @param type sin parametros de entrada
 * @return return false si no encontramos el usuario en la db, o retornamos el usuario si lo encontramos
 */
function getUserFromCookie (){
	$return = false;
	$idCookie = $_COOKIE["user"];
	$allUsers = getAllUsers();
	foreach ($allUsers as $user) {
		$idHasheado = hash("sha256" , $user["email"]);
		if( $idHasheado ==  $idCookie){
			unset($user['password']);
			$return = $user;
			return $return;
		}
	}
	return $return;
}

/*userCreator trabaja para crear el array con el que vamos a desear guardar lo que se envia al json.
viene llamado de saveuser y le enviamos todo los datos del formulario+la como parametros en una sola variable.
la salida es un array asociativo con los parametros a guardar*/
function userCreator($user){
    $arrayUser = [
      'id' => setId(),
      'firstName' => $user['firstName'],
			'lastName' => $user['lastName'],
			'userName' => $user['userName'],
      'email' => $user['email'],
      'password' => password_hash($user['password'], PASSWORD_DEFAULT),//De esta nabera nosotros ofrecemos seguridad a las contraseñas hasheandolas para que no se vea cual es. la unica manera de asber es por comparacion.
      'country' => $user['country'],
      'imagen' => SaveImage($user["avatar"]),//user hace referencia al $_POST y dentro de avatar nosotros guardamos toda la informacion acerca de nuestra imagen
    ];
    return $arrayUser;
}

function getAllUsers() {
	$allDataJson = file_get_contents('db/db.json');//abrimos el archivo y obtenemos el contenido, pero en forma un string gigante
	$eachUser = explode(PHP_EOL, $allDataJson);//Separamos el string en un array de sntrings separados por el EOL que es el fin de linea
	array_pop($eachUser);//eliminamos el ultimo usuario por el tema de la configuracion al hacer el explode del array(hay 1 posicion de mas)
	$arrayDeCadaUsuario= []; //Defino el arrya vacio, esto lo hago por que si el archivo esta vacio nunca entra al foreach y retornaria una variable inexistente. de esta manera no romperia con archivos vacios
	foreach ($eachUser as $user) {
		$arrayDeCadaUsuario[] = json_decode($user, true);/* esto significa que por aca usuario json_decode nos devuelve un array
		este array tiene como keyvalue el elemento que esta en el json y como contenido el definido por nosotros. en sintesis $arrayDeCadaUsuario es un array de arrays*/
	}
	return $arrayDeCadaUsuario;
}
function setId(){
$allusers = getAllUsers();//getallusers nos puede devolver todos los usuarios del json o un vector nulo si no habia nada en el archivo.
$id = end($allusers)["id"];/* Devuelve el ultimo elemento del array   http://php.net/manual/es/function.end.php
															Al hacer end($allusers)["id"] le digo que me tome el ultimo usuario del array y que ademas tome el campo del id*/
	return ( is_null($id) ? 1 : ++$id );
}
function getUserbyEmail($email){
	$allUsers = getAllUsers();
	$return = false;
	foreach ($allUsers as $user) {
		if ( $user["email"] === $email ) {
			unset($user["password"]);
			$return = $user;
		}
	}
	return $return;
}
function isSessionValid(){
	$email=$_SESSION["user"]["email"];
	$return = false;
	$allUsers = getAllUsers();
	foreach ($allUsers as $user) {
		if ( $user["email"] == $email ) {
			unset($user["password"]);
			$return = true;
			return $return;
		}
	}
	return $return;
}
function dbug($dato){
	echo "<br><pre>";
	var_dump($dato);
	echo "</pre><br>";
}
 ?>
