<?php


	abstract class FormValidator
	{
		protected $errors;

		protected $forbidden_chars= [ "?","[","]","/","\\","=","<",">",":",";",",","'","\"","&","$","#","*","(",")" ,"|","~","`","!","{","}","%","+" ];

		function __construct()
		{
			$this->errors = [];
		}
		public function fieldHasError($field)
		{
			return isset($this->errors[$field]);
		}
		public function getFieldError($field)
		{
			return isset($this->errors[$field]) ? $this->errors[$field] : '';
		}
		public function getAllErrors()
		{
			return $this->errors;
		}
		public function addError($field, $error)
		{
			$this->errors[$field] = $error;
		}
		public function invalidChar($data){
			foreach ($this->forbidden_chars as $char) {
				if(strpos($data,$char)){
					return true;
				}
			}
			return false;
		}
		// public abstract function sanitizateAndValidateData($post,$file);
	}
