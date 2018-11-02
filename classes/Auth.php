<?php
  class Auth
  {
    //Cuando instancie Auth, inicio la sesión.
    public function __construct()
    {
      session_start();
      if( isset($_COOKIE['rememberUser']) && !$this->isLogged()){
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
      if(isset($_COOKIE["user"])){ //Que va dentro de user: nombre, username o mail? Devuelve el id?
        $user = $this->getUserFromCookie();
        if($user){
          $this->logIn($user["email"]);
        }
      }
      if($this->isLogged()){
        // dbug($_SESSION['user']);exit;
        header('location: profile.php');
        exit;
      }
    }

    public function logIn ($user){
      $userData = new User(getUserbyEmail($user["email"]));//TERMINAR
      $_SESSION['user'] = $userData->getFirstName;
      // dbug($_SESSION);exit;
      header('location: profile.php');
      exit;
    }

    public function isLogged(){
      return isset($_SESSION['user']);
    }
    public function saveCookie($user){
      // dbug($user);exit;
      setcookie("user",hash("sha256" , $user["email"]),strtotime( '+30 days' ));//Se usa un hasheo con hash por ahora por q en mysql se va a guardar la  hora de creacion para encryotar junto contras cosas
    }
    /*dbclass getAllUsers*/
    public function isSessionValid(){
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
    public function logOut() {
			session_destroy();
			setcookie('rememberUser', '', time() - 10);
			header('location: index.php');
			exit;
		}
  }
 ?>