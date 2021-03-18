<?php

	//CONNECTION
	class Connection{

		private $host = 'localhost';
		private $dbname = 'rl_system';
		private $user = 'root';
		private $pass = '';

		public function connect(){

			$connection = new PDO(
				"mysql:host=$this->host;dbname=$this->dbname",
				"$this->user",
				"$this->pass"
			);		

			return $connection;

		}


	}

?>