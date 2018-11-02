<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'habitos_db');
define('DB_USER', 'root');
define('DB_PASS', '');
// require_once "classes\\User.php";
require_once "classes\\Auth.php";
//Agregar clase de mysql
	$auth = new Auth();
	// require_once "DataSanitization.php";
	// require_once "DataUpload.php";
	require_once "classes\\RegisterFormValidator.php";
	require_once "classes\\LoginFormValidator.php";
	require_once "classes\\SaveImage.php";

	// require_once "includes\\header.php";

	// require_once 'clases/Connection.php';
	// require_once 'clases/MoviesModel.php';
require_once "classes\\DbMySql.php";
	$userModel = new DbMySql(DB_HOST, DB_NAME, DB_USER, DB_PASS);


?>
