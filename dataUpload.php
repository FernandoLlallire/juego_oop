<?php
	session_start();
	if ( isset($_COOKIE['userLogged'] ) ) {
		$user = getUserByEmail($_COOKIE['userLogged']);
		unset($user['id']);
		unset($user['password']);
		$_SESSION['user'] = $user;
	}
  function logIn($user) {
    unset($user['id']);
    unset($user['password']);
    $_SESSION['user'] = $user;
    header('location: profile.php');
    exit;
  }
  // function está logueado
  function isLogged() {
    return isset($_SESSION['id']);
  }
?>
