<?php

	class Login{

		//ATTRIBUTES
		private $id;
		private $name;
		private $surname;
		private $post;
		private $address;
		private $phone;
		private $mail;
		private $password;


		//GETTER
		public function __get($attribute){
			return $this->$attribute;
		}

		//SETTER
		public function __set($attribute, $value){
			$this->$attribute = $value;
			return $this;
		}

	}

?>