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
    //Esta función public recibe el mail del usuario
    public function logIn($userEmail){
      $_SESSION['userEmail'] = $userEmail;
      header('location: profile.php');
      exit;
    }

    public function isLogged(){
      return isset($_SESSION['userEmail']);
    }
  }

//Lo que Fer tenía puesto en DataUpload para el login
  //function logIn ($user){
  	//session_start();

    //$_SESSION['user'] = getUserbyEmail($user["email"]);
    //header('location: profile.php');
    //exit;
  //}


 ?>
