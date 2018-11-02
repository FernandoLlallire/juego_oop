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
					$db_user,
					$db_pass,
					$opt);
			}catch( PDOException $Exception ) {
		   	echo $Exception->getMessage();
			}
		}
		public function getAllUsers(){
			$stmt = $this->conn->prepare("SELECT * FROM Habitos_db.Users");
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}
		public function getUserByEmail($email){
			$stmt = $this->conn->prepare("SELECT * FROM Habitos_db.Users WHERE email = '{$email}'");
			$stmt->execute();
			return $stmt->fetch(PDO::FETCH_OBJ);
		}
		public function isRegister($data, $col){//data: valor a buscar, col: columna de la tabla usuarios
			$stmt = $this->conn->prepare("SELECT * FROM Habitos_db.Users WHERE {$col} = '{$data}'");
			$stmt->execute();
			if ($stmt->rowCount()>0){
				return true;
			}
			return false;
		}
		public function saveUser($user){
			$user['password'] = password_hash($user['password'], PASSWORD_DEFAULT);//El hasheo no se deberia hacer aqui mover despues
			$stmt = $this->conn->prepare("
				INSERT INTO Habitos_db.Users (first_name, last_name, user_email, user_password, user_country, user_nickname, user_avatar)
				VALUES ('{$user['firstName']}', '{$user['lastName']}', '{$user['email']}', '{$user['password']}', '{$user['country']}', '{$user['userName']}', '{$user['avatar']}')
			");
			$stmt->execute();
		}
		public function deleteUser($user){
			
		}
		public function updateUser(){

		}
	}
