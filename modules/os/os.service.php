<?php

	class OsService{

		private $connection;
		private $os;

		//CONSTRUCT
		public function __construct(Connection $connection, Os $os){
			$this->connection = $connection->connect();
			$this->os = $os;
		}

		//INSERT OS
		public function insert(){
			$query = 'insert into tb_os(name, description, value, service)values(:name, :description, :value, :service)';
			$stmt = $this->connection->prepare($query);
			$stmt->bindValue(':name',$this->os->__get('name'));
			$stmt->bindValue(':description',$this->os->__get('description'));
			$stmt->bindValue(':value',$this->os->__get('value'));
			$stmt->bindValue(':service',$this->os->__get('service'));
			$stmt->execute();
		}

		
		//RECOVER OS DATA - OS'S LIST
		public function recover(){
			$query =	'select
							a.id, b.status, a.name, a.description, a.value, a.service
						from 
							tb_os as a
						left join
							tb_os_status as b
						on
							(a.id_status = b.id)
						';
			$stmt = $this->connection->prepare($query);			
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}


		//UPDATE OS'S
		public function update(){
			$query = 'update tb_os set name = :name, description = :description, value = :value, service = :service where id = :id';
			$stmt = $this->connection->prepare($query);
			$stmt->bindValue(':name',$this->os->__get('name'));
			$stmt->bindValue(':description',$this->os->__get('description'));
			$stmt->bindValue(':value',$this->os->__get('value'));
			$stmt->bindValue(':service',$this->os->__get('service'));
			$stmt->bindValue(':id',$this->os->__get('id'));			
			$stmt->execute();
		}


		//DELETE OS'S
		public function delete(){
			$query = 'delete from tb_os where id = :id';
			$stmt = $this->connection->prepare($query);
			$stmt->bindValue(':id',$this->os->__get('id'));
			$stmt->execute();
		}


		//CLOSE OS
		public function osClose(){
			$query = 'update tb_os set id_status = ? where id = ?';
			$stmt = $this->connection->prepare($query);
			$stmt->bindValue(1,$this->os->__get('id_status'));
			$stmt->bindValue(2,$this->os->__get('id'));
			$stmt->execute();

		}


		//OS'S OPEN LIST
		public function osOpen(){
			$query =	'select
							a.id, b.status, a.name, a.description, a.value, a.service
						from 
							tb_os as a
						left join
							tb_os_status as b
						on
							(a.id_status = b.id)
						where
							id_status = :id_status	
						';
			$stmt = $this->connection->prepare($query);
			$stmt->bindValue(':id_status',$this->os->__get('id_status'));			
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		

		}

		//SEARCH OS
		public function searchOs() {
			$search_os = $_POST['search_os'];	
			$query = "select a.id, b.status, a.name, a.description, a.value, a.service from tb_os as a left join tb_os_status as b on (a.id_status = b.id) where name LIKE '%$search_os%'";
			$stmt = $this->connection->prepare($query);
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_OBJ);
		}
	}

?>