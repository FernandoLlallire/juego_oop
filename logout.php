<?php
require_once 'DataUpload.php';
session_start();
session_destroy();
DeleteCokie();
header('location: index.php');

require_once 'autoload.php';
	$auth->logOut();
exit;
