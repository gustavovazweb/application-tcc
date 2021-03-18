<?php

	class ProductService{

		private $connection;
		private $product;

		//CONSTRUCT
		public function __construct(Connection $connection, Product $product){
			$this->connection = $connection->connect();
			$this->product = $product;
		}

		
		//INSERT
		public function insert(){
			$query = 'insert into tb_products(product, amount, value, notes)values(:product, :amount, :value, :notes)';
			$stmt = $this->connection->prepare($query);
			$stmt->bindValue(':product',$this->product->__get('product'));
			$stmt->bindValue(':amount',$this->product->__get('amount'));
			$stmt->bindValue(':value',$this->product->__get('value'));
			$stmt->bindValue(':notes',$this->product->__get('notes'));
			$stmt->execute();
		}

		
		//RECOVER
		public function recover(){
			$query =	'select
							a.id, b.status, a.product, a.amount, a.value, a.notes
						from 
							tb_products as a
						left join
							tb_status as b
						on
							(a.id_status = b.id)
						';
			$stmt = $this->connection->prepare($query);			
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}

		
		//UPDATE
		public function update(){
			$query = 'update tb_products set product = :product, amount = :amount, value = :value, notes = :notes where id = :id';
			$stmt = $this->connection->prepare($query);
			$stmt->bindValue(':product',$this->product->__get('product'));
			$stmt->bindValue(':amount',$this->product->__get('amount'));
			$stmt->bindValue(':value',$this->product->__get('value'));
			$stmt->bindValue(':notes',$this->product->__get('notes'));
			$stmt->bindValue(':id',$this->product->__get('id'));			
			$stmt->execute();
		}


		//DELETE
		public function delete(){
			$query = 'delete from tb_products where id = :id';
			$stmt = $this->connection->prepare($query);
			$stmt->bindValue(':id',$this->product->__get('id'));
			$stmt->execute();
		}


		//PRODUCT UNAVAILABLE
		public function productUnavailable(){
			$query = 'update tb_products set id_status = ? where id = ?';
			$stmt = $this->connection->prepare($query);
			$stmt->bindValue(1,$this->product->__get('id_status'));
			$stmt->bindValue(2,$this->product->__get('id'));
			$stmt->execute();

		}

		
		//PRODUCT AVAILABLE
		public function productAvailable(){
			$query =	'select
							a.id, b.status, a.product, a.amount, a.value, a.notes
						from 
							tb_products as a
						left join
							tb_status as b
						on
							(a.id_status = b.id)
						where
							id_status = :id_status	
						';
			$stmt = $this->connection->prepare($query);
			$stmt->bindValue(':id_status',$this->product->__get('id_status'));			
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		

		}


		//SEARCH PRODUCT
		public function searchProduct() {
			$search_product = $_POST['search_product'];	
			$query = "select a.id, b.status, a.product, a.amount, a.value, a.notes from tb_products as a left join tb_status as b on (a.id_status = b.id) where product LIKE '%$search_product%'";
			$stmt = $this->connection->prepare($query);
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}
	}

?>