<?php
	require_once 'DB.php';
	require_once 'User.php';
	class UsersMySql extends DB{
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
		public function createUser($user){
			$stmt = $conn->prepare("
				INSERT INTO Habitos_db.Users (first_name, last_name, user_email, user_password, user_country, user_nickname, user_avatar)
				VALUES ('{$user->$firstName}', '{$user->$lastName}', '{$user->email}', '{$user->$password}', '{$user->$country}', '{$user->$userName}', '{$user->$image}')
			")
		}
	}
