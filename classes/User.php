<?php
	class User
	{

		private $firstName;
		private $lastName;
		private $userName;
		private $email;
		private $country;
		private $avatar;

		public function __construct($user)
		{
			$this->firstName = $user->firstName;
			$this->lastName = $user->lastName;
			$this->userName = $user->userName;
			$this->email = $user->email;
			$this->country = $user->country;
			$this->avatar = $user->avatar;

		}
		public function setName($firstName)
		{
			$this->firstName = $firstName;
		}
		public function getName()
		{
			return $this->firstName;
		}
		public function setEmail($email)
		{
			$this->email = $email;
		}
		public function getEmail()
		{
			return $this->email;
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
			return $this->avatar;
		}
		public function setImage($avatar){
			$this->avatar = $avatar;
		}
	}
