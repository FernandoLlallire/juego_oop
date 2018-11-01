<?php

require_once "DB.php";

class DbMySql extends DB{

  private $host;
  private $dbName;
  private $user;
  private $pass;
  public $conn;

  public function __construct ($host, $dbname, $username, $password){
    $this->host = $host;
    $this->dbName = $dbname;
    $this->user = $username;
    $this->pass = $password;
    try {
      $this->conn = new PDO(
        "mysql:host=$this->host; dbname=$this->dbName; charset=utf8mb4",
        $this->user,
        $this->pass,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
      );
    } catch (PDOException $exception) {
      echo $exception->getMessage();
    }
  }

  public function getConnection(){
    return $this->conn;
  }

  public function getAllUsers(){
    $stmt = $this->conn->prepare("SELECT * FROM users");
    $stmt->execute();
    return  $stmt->fetchAll(PDO::FETCH_OBJ);
  }


}
