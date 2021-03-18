<?php

	class Os{

		//ATTRIBUTES
		private $id;
		private $id_status;
		private $name;
		private $description;
		private $value;
		private $service;
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