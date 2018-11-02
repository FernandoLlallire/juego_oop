<?php

define ( "ERROR_EMPTY_NAME", "ingrese el nombre completo" );
define ( "ERROR_EMPTY_firstName", "ingrese el nombre de usuario" );
define ( "ERROR_EMPTY_SURNAME", "ingrese el apellido" );
define ( "ERROR_INVALID_NAME", "Caracter invalido en el nombre, ingrese solo letras" );
define ( "ERROR_INVALID_firstName", "Caracter invalido en firstName" );
define ( "ERROR_EMPTY_MAIL", "Ingrese un email" );
define ( "ERROR_INVALID_MAIL","Formato de email invalido" );
define ( "ERROR_EXISTING_MAIL", "Email ya registrado en la pagina" );
define ( "ERROR_EMPTY_COUNTRY", "Seleccione un Pais" );
define ( "ERROR_EMPTY_FILE", "Seleccione un Avatar" );
define ( "ERROR_EXTENSION_FILE", "Formato de imagen no valido" );
define ( "ERROR_EMPTY_PASSWORD", "Complete las contraseñas" );
define ( "ERROR_DIFERENT_PASSWORD", "Las contraseñas tienen que coincidir" );
define ( "ERROR_MIN_PASSWORD_LENGTH", "Las contraseñas tienen que tener como minimo 6 caracteres" );
define ( "VALID_EXTENSION", ["jpg", "png", "jpeg", "gif", "svg"] );
define ( "ERROR_EXISTING_firstName", "El usuario ya esta registrado" );
define ( "ERROR_LENGTH_PASSWORD", "La contraseña debe tener más de 4 caracteres" );
define ("ERROR_NOT_VALID_USER", "Usuario No registrado");
define ("ERROR_INVALID_PASSWORD", "Contraseña incorrecta");

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
