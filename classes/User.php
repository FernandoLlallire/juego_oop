<?php
	class User
	{
		private $id;
		private $lastName;
    private $firstName;
    private $username;
		private $email;
		private $password;
		private $country;
		private $image;
		public function __construct($post)
		{
			$this->lastname = $post['firstName'];
      $this->lastname = $post['lastName'];
      $this->lastname = $post['userName'];
			$this->email = $post['email'];
			$this->password = $post['password'];
			$this->country = $post['country'];
			$this->image = $post['image'];
		}
		public function setFirstName($firstName)
		{
			$this->firstName = $firstName;
		}
		public function getFirstName()
		{
			return $this->firstName;
		}
    public function setLastName($lastName)
		{
			$this->lastName = $lastName;
		}
		public function getLastName()
		{
			return $this->lastName;
		}
    public function setUserName($userName){
      $this->userName = $userName;
    }
    public function getUserName(){
      return $this->userName;
    }
		public function setEmail($email)
		{
			$this->email = $email;
		}
		public function getEmail()
		{
			return $this->email;
		}
		public function getPassword()
		{
			return $this->password;
		}
		public function setPassword($password)
		{
			$this->password = $password;
		}
		public function getCountry()
		{
			return $this->country;
		}
		public function setCountry($country)
		{
			$this->country = $country;
		}
		public function getImage() {
			return $this->image;
		}
		public function setImage($image)
		{
			$this->image = $image;
		}
		public function setId($id)
		{
			$this->id = $id;
		}
		public function hashPassword()
		{
			return password_hash($this->password, PASSWORD_DEFAULT);
		}
	}
