<?php

	class LoginService{


		private $connection;
		private $login;

		//CONSTRUCT
		public function __construct(Connection $connection, Login $login){
			$this->connection = $connection->connect();
			$this->login = $login;
		}


		//LOGIN
		public function login(){

			$query = 'select id, name from tb_users where mail = :mail and password = md5(:password)';
			$stmt = $this->connection->prepare($query);
			$stmt->bindValue(':mail',$this->login->__get('mail'));
			$stmt->bindValue(':password',$this->login->__get('password'));
			$stmt->execute();

			$login = $stmt->fetch(\PDO::FETCH_ASSOC);

			if($login['id'] != '' && $login['name'] != ''){
				$this->login->__set('id',$login['id']);
				$this->login->__set('name',$login['name']);				
			}

			return $this;

		}


		//REGISTER
		public function register(){

			$query = 'insert into tb_users(name, surname, post, address, phone, mail, password)values(:name, :surname, :post, :address, :phone, :mail, md5(:password))';
			$stmt = $this->connection->prepare($query);
			$stmt->bindValue(':name',$this->login->__get('name'));
			$stmt->bindValue(':surname',$this->login->__get('surname'));
			$stmt->bindValue(':post',$this->login->__get('post'));
			$stmt->bindValue(':address',$this->login->__get('address'));
			$stmt->bindValue(':phone',$this->login->__get('phone'));
			$stmt->bindValue(':mail',$this->login->__get('mail'));
			$stmt->bindValue(':password',$this->login->__get('password'));
			$stmt->execute();

		}
		

		//RECOVER
		public function recover(){
			$query = 'select * from tb_users';
			$stmt = $this->connection->prepare($query);			
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}

		//UPDATE
		public function update(){
			$query = 'update tb_users set name = :name, surname = :surname, post = :post, address = :address, phone = :phone, mail = :mail, password = :password where id = :id';
			$stmt = $this->connection->prepare($query);
			$stmt->bindValue(':name',$this->login->__get('name'));
			$stmt->bindValue(':surname',$this->login->__get('surname'));
			$stmt->bindValue(':post',$this->login->__get('post'));
			$stmt->bindValue(':address',$this->login->__get('address'));
			$stmt->bindValue(':phone',$this->login->__get('phone'));
			$stmt->bindValue(':mail',$this->login->__get('mail'));
			$stmt->bindValue(':password',$this->login->__get('password'));			
			$stmt->bindValue(':id',$this->login->__get('id'));
			$stmt->execute();
		}

		//DELETE
		public function delete(){
			$query = 'delete from tb_users where id = :id';
			$stmt = $this->connection->prepare($query);
			$stmt->bindValue(':id',$this->login->__get('id'));
			$stmt->execute();
		}

	}

?>