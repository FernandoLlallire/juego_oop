<?php
	abstract class DB
	{
		private $database;
		private $conn;
		public function __construct($dbName)
		{
			$this->database = $dbName;
			$host = "mysql:host=localhost; dbname={$this->database}; charset=utf8mb4";
			$db_user = 'root';
			$db_pass = 'root';
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
	}
