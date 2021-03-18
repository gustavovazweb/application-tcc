<?php

	require_once "connection.php";
	require_once "os.service.php";
	require_once "os.model.php";


	$action = isset($_GET['action']) ? $_GET['action'] : $action;	


	//INSERT OS
	if($action == 'insert'){

		if(empty($_POST['name']) || empty($_POST['description'])){
		header('location: os_new.php?fields=white');
		exit();
		}

		$connection = new Connection();

		$os = new Os();
		$os->__set('name',$_POST['name']);
		$os->__set('description',$_POST['description']);
		$os->__set('value',$_POST['value']);
		$os->__set('service',$_POST['service']);

		$osService = new OsService($connection, $os); 
		$osService->insert();

		header('location: os_new.php?status=success');


		//RECOVER OS
	}else if($action == 'recover'){

		$connection = new Connection();

		$os = new Os();		

		$osService = new OsService($connection, $os); 
		$oss = $osService->recover();


		//UPDATE OS
	}else if($action == 'update'){

		$connection = new Connection();

		$os = new Os();
		$os->__set('id',$_POST['id']);
		$os->__set('name',$_POST['name']);
		$os->__set('description',$_POST['description']);
		$os->__set('value',$_POST['value']);
		$os->__set('service',$_POST['service']);
		

		$osService = new OsService($connection, $os); 
		$osService->update();

		if(isset($_GET['status']) && $_GET['status'] == 'search_update'){
			header('location: os_search.php');
		}else{
			header('location: os_database.php');	
		}


		//DELETE OS
	}else if($action == 'delete'){

		$connection = new Connection();

		$os = new Os();
		$os->__set('id',$_GET['id']);		

		$osService = new OsService($connection, $os); 
		$oss = $osService->delete();

		if(isset($_GET['status']) && $_GET['status'] == 'search_delete'){
			header('location: os_search.php');
		}else{
			header('location: os_database.php');	
		}


		//CLOSE OS
	}else if($action == 'osClose'){

		$connection = new Connection();

		$os = new Os();
		$os->__set('id',$_GET['id'])->__set('id_status',2);				

		$osService = new OsService($connection, $os); 
		$osService->osClose();

		if(isset($_GET['status']) && $_GET['status'] == 'search_close'){
			header('location: os_search.php');
		}else{
			header('location: os_database.php');	
		}


		//OPEN OS
	}else if($action == 'osOpen'){

		$connection = new Connection();

		$os = new Os();
		$os->__set('id_status',1);		

		$osService = new OsService($connection, $os); 
		$oss = $osService->osOpen();


	//SEARCH OS
	} else if($action == 'searchOs') {

		if(empty($_POST['search_os'])){
		header('location: os_search.php?fields=white');
		exit;
		}
	
		$os = new Os();

		$connection = new Connection();

		$osService = new OsService($connection, $os);
		$oss = $osService->searchOs();

	}	

?>
