<?php
	require_once 'FormValidator.php';

	class LoginFormValidator extends FormValidator
	{
		private $email;
		private $password;
		private $rememberMe;
		private $userModel;

		public function __construct($post,$userModel)
		{
			$this->email = isset($post['email']) ?  $post['email'] : '';
			$this->password = isset($post['password']) ?  $post['password'] : '';
			$this->rememberMe = isset ($post["rememberUser"]) ? $post["rememberUser"] : false;
			$this->userModel = $userModel;
		}
		public function sanitizateAndValidateData(){
			  if(empty($this->email)){
			    $this->addError("email", ERROR_EMPTY_MAIL);
			  } elseif (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
			    $this->addError("email", ERROR_INVALID_MAIL);
			  } elseif(!$this->userModel->isRegister($this->email,"email")){
			    $this->addError("email", ERROR_NOT_VALID_USER);
			  } elseif ( empty($this->password) ) {
			    $this->addError("password", ERROR_EMPTY_PASSWORD);
			  } else {
			    if (!$this->userModel->isRegisterPassword($this->email, $this->password)){
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
?>
