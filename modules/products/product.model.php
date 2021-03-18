<?php

	class Product{

		//ATTRIBUTES
		private $id;
		private $id_status;
		private $product;
		private $amount;
		private $value;
		private $notes;
		private $date_register;


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