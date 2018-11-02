<?php
    require_once 'FormValidator.php';
    
    class RegisterFormValidator extends FormValidator
    {
        private $firstName;
        private $lastName;
        private $userName;
        private $email;
        private $password;
        private $repassword;
        private $country;
        private $avatar;
        private $rememberMe;
        public function __construct($post, $files)
        {
            $this->firstName = isset ( $post["firstName"] ) ? $post["firstName"] : "";
            $this->lastName = isset ( $post["lastName"] )  ? $post["lastName"] : "";
            $this->userName = isset ( $post["userName"] )  ? $post["userName"] : "";
            $this->email = isset ( $post["email"] ) ? $post["email"] : "";
            $this->password = isset ( $post["password"] )  ? $post["password"] : "";
            $this->repassword = isset ( $post["repassword"] ) ?  $post["repassword"] : "";
            $this->country = isset ( $post["country"] ) ? $post["country"] : "";
            $this->avatar = isset ( $files["avatar"] ) ? $files["avatar"] : "";
            $this->rememberMe = isset ($_POST["rememberUser"]) ? $_POST["rememberUser"] : false;
        }
        public function sanitizateAndValidateData($post, $file, $db){
            empty($post["firstName"]) ? $this->addError("firstName", ERROR_EMPTY_NAME) : ( $this->invalidChar(trim($post["firstName"])) ? $this->addError("firstName", ERROR_INVALID_NAME) : "" );
            empty($post["lastName"]) ? $this->addError("lastName",ERROR_EMPTY_SURNAME) : ( $this->invalidChar(trim($post["lastName"])) ? $this->addError("lastName", ERROR_INVALID_NAME) : "" );
            if (empty($post["userName"])){
                $this->addError("userName",ERROR_EMPTY_firstName);//No seria userName?
            }elseif ($this->invalidChar(trim($post["userName"]))) {
                $this->addError("userName",ERROR_INVALID_firstName);
            }
            elseif ($db->isRegister($post["userName"], "user_nickname")) {
                $this->addError("userName",ERROR_EXISTING_firstName);
            }

            empty($post["country"]) ? $this->addError("country",ERROR_EMPTY_COUNTRY) : "";
            
            $archivo = (isset($file["imagen"]) ? $file["imagen"] : "");
            if (isset($archivo["error"])) {
                if($archivo["error"] !== UPLOAD_ERR_OK){
                    $this->addError("imagen",ERROR_EMPTY_FILE);
                }   
                elseif ( !in_array ( pathinfo($archivo['name'], PATHINFO_EXTENSION), VALID_EXTENSION )) {
                    $this->addError("imagen",ERROR_EXTENSION_FILE);
                }
            }
            
            if(empty($post["email"])){
                $this->addError("email",ERROR_EMPTY_MAIL);
            } 
            elseif (!filter_var($post["email"], FILTER_VALIDATE_EMAIL)) {
                $this->addError("email",ERROR_INVALID_MAIL);
            }
            elseif ($db->isRegister($post["email"],"user_email")) {
                $this->addError("email",ERROR_EXISTING_MAIL);
            }
            if ( empty($post["password"]) || empty($post["rePassword"]) ) {
                $this->addError("password",ERROR_EMPTY_PASSWORD);
            }
            elseif ( $post["password"] !== $post["rePassword"]) { //stackoverflow aconseja que usemos el tipo de comparacion sin el tipo. y no el strcmp por ese tiene mas tiempo de ejecucion
                $this->addError("password",ERROR_DIFERENT_PASSWORD);
            }
            elseif ( strlen($post["password"]) < 4 || strlen($post["rePassword"]) < 4 ) {
                $this->addError("password",ERROR_LENGTH_PASSWORD);
            }
        }
        public function getFirstName(){
            return $this->firstName;
        }
        public function getLastName(){
            return $this->lastName;
        }
        public function getUserName(){
            return $this->userName;
        }
        public function getEmail(){
            return $this->email;
        }
        public function getPassword(){
            return $this->password;
        }
        public function getCountry(){
            return $this->country;
        }
        public function getAvatar(){
            return $this->avatar;
        }
	    public function getRememberMe(){
			return $this->rememberMe;
	    }
    }