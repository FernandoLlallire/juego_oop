<?php
	define('USER_IMAGE_PATH', dirname(__FILE__) . "/userimg/");
function SaveImage($file){
  $imgName = $file['name'];
  $ext = pathinfo($imgName, PATHINFO_EXTENSION);
  $temp_direction = $file['tmp_name'];
  $fileName = uniqid('img_') .  '.' . $ext;
  $finalDirectory = USER_IMAGE_PATH . $fileName;
  move_uploaded_file($temp_direction, $finalDirectory);
  return $finalName;
}
function saveUser ($post){
  $userArray = userCreator($post);
  $userJason = json_encode($userArray);
  file_put_contents('data/users.json', $userJason . PHP_EOL, FILE_APPEND);
  return $userArray;
}
function logIn ($userArray){
  unset($userArray['id']);
  unset($userArray['password']);
  $_SESSION['user'] = $user;
  header('location: profile.php');
  exit;
}
function SaveCookie($user){
  setcookie(password_hash($user["id"]));
}
function userCreator($user){
    $return = [
      'id' => setId(),
      'name' => $user['name'],
      'email' => $user['email'],
      'password' => password_hash($user['password'], PASSWORD_DEFAULT),
      'country' => $user['country'],
      'avatar' => $user['file'],
    ];
    return $return;
}
 ?>
