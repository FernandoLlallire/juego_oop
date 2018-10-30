<?php
	require_once 'FormValidator.php';

	class LoginFormValidator extends FormValidator
	{
		private $email;
		private $password;
		private $rememberMe;

		public function __construct($post)
		{
			$this->email = isset($post['email']) ?  $post['email'] : '';
			$this->password = isset($post['password']) ?  $post['password'] : '';
			$this->$rememberMe = isset ($post["session"]) ? $post["session"] : false;
		}
		public function sanitizateAndValidateData($post){
			  if(empty($post["email"])){
			    $this->addError("email", ERROR_EMPTY_MAIL);
			  } elseif (!filter_var($post["email"], FILTER_VALIDATE_EMAIL)) {
			    $this->addError("email", ERROR_INVALID_MAIL);
			  } elseif(!isRegister($post["email"],"email")){
			    $this->addError("email", ERROR_NOT_VALID_USER);
			  } elseif ( empty($post["password"]) ) {
			    $this->addError("password", ERROR_EMPTY_PASSWORD);
			  } else {
			    if (!isRegisterPassword($post)){
						$this->addError("password", ERROR_INVALID_PASSWORD);
			    }
			  }
		}
		public function getEmail()
		{
			return $this->email;
		}

		public function getPassword()
		{
			return $this->password;
		}
		public function getRemenberMe()
		{
			return $this->rememberMe;
		}
	}
