<?php

	class CustomerService{

		private $connection;
		private $customer;

		//CONSTRUCT
		public function __construct(Connection $connection, Customer $customer){
			$this->connection = $connection->connect();
			$this->customer = $customer;
		}

		
		//REGISTER CUSTOMER
		public function register(){
			$query = 'insert into tb_customers(name, cpf, address, phone, mail, dob)values(:name, :cpf, :address, :phone, :mail, :dob)';
			$stmt = $this->connection->prepare($query);
			$stmt->bindValue(':name',$this->customer->__get('name'));
			$stmt->bindValue(':cpf',$this->customer->__get('cpf'));
			$stmt->bindValue(':address',$this->customer->__get('address'));
			$stmt->bindValue(':phone',$this->customer->__get('phone'));
			$stmt->bindValue(':mail',$this->customer->__get('mail'));
			$stmt->bindValue(':dob',$this->customer->__get('dob'));
			$stmt->execute();
		}

		
		//RECOVER
		public function recover(){
			$query = 'select * from tb_customers';
			$stmt = $this->connection->prepare($query);			
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}


		//RECOVER ID
		public function recoverId() {
			$query = 'select * from tb_customers';
			$stmt = $this->connection->prepare($query);
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}

		
		//UPDATE CUSTOMAR
		public function update(){
			$query = 'update tb_customers set name = :name, cpf = :cpf, address = :address, phone = :phone, mail = :mail, dob = :dob where id = :id';
			$stmt = $this->connection->prepare($query);			
			$stmt->bindValue(':name',$this->customer->__get('name'));		
			$stmt->bindValue(':cpf',$this->customer->__get('cpf'));
			$stmt->bindValue(':address',$this->customer->__get('address'));
			$stmt->bindValue(':phone',$this->customer->__get('phone'));	
			$stmt->bindValue(':mail',$this->customer->__get('mail'));	
			$stmt->bindValue(':dob',$this->customer->__get('dob'));
			$stmt->bindValue(':id',$this->customer->__get('id'));			
			$stmt->execute();
		}


		//DELETE CUSTOMER
		public function delete(){
			$query = 'delete from tb_customers where id = :id';
			$stmt = $this->connection->prepare($query);
			$stmt->bindValue(':id',$this->customer->__get('id'));
			$stmt->execute();
		}	


		//SEARCH CUSTOMER
		public function searchCustomer() {
			$search_customer = $_POST['search_customer'];	
			$query = "select id, name, cpf, address, phone, mail, dob from tb_customers where name LIKE '%$search_customer%'";
			$stmt = $this->connection->prepare($query);
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}
	}

?>