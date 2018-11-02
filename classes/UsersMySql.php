<?php
	require_once 'User.php';
	class UsersMySql{
		private $database;
		private $conn;
		public function __construct($dbName)
		{
			$this->database = $dbName;
			$host = "mysql:host=localhost; dbname={$this->database}; charset=utf8mb4";
			$db_user = 'root';
			//$db_pass = 'root'; Linux
			$db_pass = '';
			$opt = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
			try{
				$this->conn = new PDO(
					$host,
					$user,
					$pass,
					$opt);
			}catch( PDOException $Exception ) {
		   	echo $Exception->getMessage();
			}
		}
		public function getAllUsers(){//Usado por el metodo Isregister & IsRegisterPassword
			$stmt = $conn->prepare("SELECT * FROM Habitos_db.Users");
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}
		public function emailExist($email){
			$stmt = $conn->prepare("SELECT * FROM Habitos_db.Users WHERE email = '{$email}'");
			if ($stmt->rowCount()>0){
				return true;
			}
			return false;
		}
		public function getUserByEmail($email){
			$stmt = $conn->prepare("SELECT * FROM Habitos_db.Users WHERE email = '{$email}'");
			$stmt->execute();
			return $stmt->fetch(PDO::FETCH_OBJ);
		}
		public function createUser($_POST){//No probar
			$stmt = $conn->prepare("
				INSERT INTO Habitos_db.Users (first_name, last_name, user_email, user_password, user_country, user_nickname, user_avatar)
				VALUES ('{$user->$firstName}', '{$user->$lastName}', '{$user->email}', '{$user->$password}', '{$user->$country}', '{$user->$userName}', '{$user->$image}')
			");
		}
	}
