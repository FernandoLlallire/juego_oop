<?php
// require_once "classes\\User.php";
require_once "classes\\Auth.php";
//Agregar clase de mysql
	$auth = new Auth();
	require_once "DataSanitization.php";
	require_once "DataUpload.php";
	require_once "classes\\RegisterFormValidator.php";
	require_once "classes\\LoginFormValidator.php";
	require_once "classes\\SaveImage.php";

	require_once "includes\\header.php";

?>
