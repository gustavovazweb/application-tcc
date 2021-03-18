<?php

	class Customer{

		//ATTRIBUTES
		private $id;
		private $name;
		private $cpf;
		private $address;
		private $phone;
		private $mail;
		private $dob;

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