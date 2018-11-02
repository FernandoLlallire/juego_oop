<?php

require_once "DB.php";
require_once "SaveImage.php";
class DbMySql extends DB{

  private $host;
  private $dbName;
  private $user;
  private $pass;
  private $conn;

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

  public function isRegister($value, $column){
    $stmt = $this->conn->prepare("SELECT * FROM users where {$column}=:value");
    $stmt -> bindValue(":value",$value,PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->rowCount();
  }

  public function isEmpty(){
    $stmt = $this->conn->prepare("SELECT * FROM users");
    $stmt->execute();
    if($stmt->rowCount() == 0){
      return true;
    }else{
      return false;
    }
  }

  public function saveUser ($post){
    $avatar = SaveImage::save($post['avatar']);
    $password = password_hash($post['password'], PASSWORD_DEFAULT);
    $stmt = $this->conn->prepare("
      INSERT INTO users (
        firstName,
        lastName,
        userName,
        email,
        password,
        country,
        avatar
      )
      VALUES (
        :firstName,
        :lastName,
        :userName,
        :email,
        :password,
        :country,
        :avatar
      )
    ");

    $stmt->bindValue(":firstName", $post['firstName'], PDO::PARAM_STR);
    $stmt->bindValue(":lastName", $post['lastName'], PDO::PARAM_STR);
    $stmt->bindValue(":userName", $post['userName'], PDO::PARAM_STR);
    $stmt->bindValue(":email", $post['email'], PDO::PARAM_STR);
    $stmt->bindValue(":password", $password, PDO::PARAM_STR);
    $stmt->bindValue(":country", $post['country'], PDO::PARAM_STR);
    $stmt->bindValue(":avatar", $avatar, PDO::PARAM_STR);

    $stmt->execute();
  }

  public function IsRegisterPassword ($email, $password) {
    $stmt = $this->conn->prepare("SELECT password FROM users WHERE email = :email");
    $stmt -> bindValue(":email", $email, PDO::PARAM_STR);
    $stmt -> execute();
    $result = $stmt -> fetch(PDO::FETCH_OBJ);
    return password_verify ($password,$result->password);
  }

  public function getUserByEmail($email){
    $stmt = $this->conn->prepare("SELECT * FROM users where email=:email");
    $stmt -> bindValue(":email",$email,PDO::PARAM_STR);
    $stmt->execute();
    return  $stmt->fetchAll(PDO::FETCH_OBJ);
  }

  public function jsonToMySql ($firstName, $lastName, $userName, $email, $password, $country, $avatar){
    $stmt = $this->conn->prepare("
      INSERT INTO users (
        firstName,
        lastName,
        userName,
        email,
        password,
        country,
        avatar
      )
      VALUES (
        :firstName,
        :lastName,
        :userName,
        :email,
        :password,
        :country,
        :avatar
      )
    ");

    $stmt->bindValue(":firstName", $firstName, PDO::PARAM_STR);
    $stmt->bindValue(":lastName", $lastName, PDO::PARAM_STR);
    $stmt->bindValue(":userName", $userName, PDO::PARAM_STR);
    $stmt->bindValue(":email", $email, PDO::PARAM_STR);
    $stmt->bindValue(":password", $password, PDO::PARAM_STR);
    $stmt->bindValue(":country",  $country, PDO::PARAM_STR);
    $stmt->bindValue(":avatar", $avatar, PDO::PARAM_STR);

    $stmt->execute();
  }
}
