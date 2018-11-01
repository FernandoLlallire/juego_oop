<?php

  class Auth
  {
    //Cuando instancie Auth, inicio la sesión.
    public function __construct()
    {
      session_start();
      if( isset($_COOKIE['rememberUser']) ){
        $this->logIn($_COOKIE['rememberUser']);
      }
    }

    /*dbclass getAllUsers*/
    public function getUserFromCookie (){
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

public function isUserAlreadyLogged(){
  if(isset($_COOKIE["user"])){
    $user = $auth->getUserFromCookie();
    if($user){
      $auth->logIn($user["email"]);
    }
  }
  if($auth->isLogged()){
    header('location: profile.php');
    exit;
  }
}
    /*dbclass getUserbyEmail*/
    public function logIn ($user){
      $_SESSION['user'] = getUserbyEmail($user["email"]);
      header('location: profile.php');
      exit;
    }

    public function isLogged(){
      return isset($_SESSION['user']);
    }
    public function saveCookie($user){
      setcookie("user",hash("sha256" , $user["email"]),strtotime( '+30 days' ));//Se usa un hasheo con hash por ahora por q en mysql se va a guardar la  hora de creacion para encryotar junto contras cosas
    }
  }
  /*dbclass getAllUsers*/
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
 ?>
