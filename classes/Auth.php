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
    public function getUserFromCookie ($userModel){
    	$return = false;
    	$idCookie = $_COOKIE["user"];
    	$allUsers = $userModel->getAllUsers();
    	foreach ($allUsers as $user) {
    		$idHasheado = hash("sha256" , $user->email);
    		if( $idHasheado ==  $idCookie){
    			// $user->$password="";
    			return $user;
    		}
    	}
    	return $return;
    }

    public function isUserAlreadyLogged($userModel){
      if(isset($_COOKIE["user"])){
        $user = $this->getUserFromCookie($userModel);
        if($user){
          $this->logIn($user->email);
        }
      }
      if($this->isLogged()){
        header('location: profile.php');
        exit;
      }
    }

    /*dbclass getUserbyEmail*/
    public function logIn ($user){
      $_SESSION['user'] = $user["email"];
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
    public function isSessionValid($userModel){
      $email = $_SESSION["user"];
      return $userModel->IsRegister($email,"email");
    }

    public function logOut() {
			session_destroy();
			setcookie('user', '', time() - 10);
			header('location: index.php');
			exit;
		}

  }

 ?>
