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
		private $userModel;
		public function __construct($post, $files)
		{
      $this->firstName = isset ( $post["firstName"] ) ? $post["firstName"] : "";
      $this->lastName = isset ( $post["lastName"] )  ? $post["lastName"] : "";
      $this->userName = isset ( $post["userName"] )  ? $post["userName"] : "";
      $this->email = isset ( $post["email"] ) ? $post["email"] : "";
      $this->password = isset ( $post["password"] )  ? $post["password"] : "";
      $this->rePassword = isset ( $post["rePassword"] ) ?  $post["rePassword"] : "";
      $this->country = isset ( $post["country"] ) ? $post["country"] : "";
      $this->avatar = isset ( $files["avatar"] ) ? $files["avatar"] : "";
			$this->rememberMe = isset ($_POST["rememberUser"]) ? $_POST["rememberUser"] : false;
			$this->userModel = new DbMySql(DB_HOST, DB_NAME, DB_USER, DB_PASS);
		}

		public function sanitizateAndValidateData(){

			empty($this->firstName) ? $this->addError("firstName", ERROR_EMPTY_NAME) : ( $this->invalidChar(trim($this->firstName)) ? $this->addError("firstName", ERROR_INVALID_NAME) : "" );
		  empty($this->lastName) ? $this->addError("lastName",ERROR_EMPTY_SURNAME) : ( $this->invalidChar(trim($this->lastName)) ? $this->addError("lastName", ERROR_INVALID_NAME) : "" );
		  if (empty($this->userName)){
				$this->addError("userName",ERROR_EMPTY_firstName);
		  }elseif ($this->invalidChar(trim($this->userName))) {
				$this->addError("userName",ERROR_INVALID_firstName);
		  }elseif ($this->userModel->isRegister($this->userName,"userName")) {
				$this->addError("userName",ERROR_EXISTING_firstName);
		  }

		  empty($this->country) ? $this->addError("country",ERROR_EMPTY_COUNTRY) : "";

		  $archivo = (isset($this->avatar) ? $this->avatar : "");
		  if (isset($archivo["error"])) {
		    if($archivo["error"] !== UPLOAD_ERR_OK){
					$this->addError("avatar",ERROR_EMPTY_FILE);
		   } elseif ( !in_array ( pathinfo($archivo['name'], PATHINFO_EXTENSION), VALID_EXTENSION ) ) {/*pathinfo junto con PATHINFO_EXTENSION nos devuelve la extension de la imagen q es apuntado en $_FILES[name] y por ultimo con el in_array nos fijamos si esta dentro del array de formatos permitidos.*/
				 $this->addError("avatar",ERROR_EXTENSION_FILE);
		   }
		  }

		  if(empty($this->email)){
				$this->addError("email",ERROR_EMPTY_MAIL);
		  } elseif (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
		    $this->addError("email",ERROR_INVALID_MAIL);
		  } elseif ($this->userModel->isRegister($this->email,"email")) {
				$this->addError("email",ERROR_EXISTING_MAIL);
		  }

		  if ( empty($this->password) || empty($this->rePassword) ) {
				$this->addError("password",ERROR_EMPTY_PASSWORD);
		  } elseif ( $this->password !== $this->rePassword) { //stackoverflow aconseja que usemos el tipo de comparacion sin el tipo. y no el strcmp por ese tiene mas tiempo de ejecucion
				$this->addError("password",ERROR_DIFERENT_PASSWORD);
		  } elseif ( strlen($this->password) < 4 || strlen($this->rePassword) < 4 ) {
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
