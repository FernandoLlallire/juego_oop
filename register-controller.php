<?php
	session_start();
	if ( isset($_COOKIE['userLogged'] ) ) {
		$user = getUserByEmail($_COOKIE['userLogged']);
		unset($user['id']);
		unset($user['password']);
		$_SESSION['user'] = $user;
	}
}
function isLogged() {
		return isset($_SESSION['user']);
	}
?>
