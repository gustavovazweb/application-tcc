<?php

	session_start();

	require 'connection.php';
	require 'customer.model.php';
	require 'customer.service.php';	


	
	$action = isset($_GET['action']) ? $_GET['action'] : $action;		


	//REGISTER
	if($action == 'register'){

	if(empty($_POST['name']) || empty($_POST['cpf']) || empty($_POST['address'])
	|| empty($_POST['phone']) || empty($_POST['mail']) || empty($_POST['dob'])){
		header('location: customer_new.php?fields=white');
		exit();
	}

	$connection = new Connection();

	$customer = new Customer();
	$customer->__set('name',$_POST['name']);
	$customer->__set('cpf',$_POST['cpf']);
	$customer->__set('address',$_POST['address']);
	$customer->__set('phone',$_POST['phone']);
	$customer->__set('mail',$_POST['mail']);
	$customer->__set('dob',$_POST['dob']);

	$customerService = new CustomerService($connection, $customer);
	$customerService->register();

	header('location: customer_new.php?fields=success');


	//RECOVER
	}else if($action == 'recover'){

		$connection = new Connection();

		$customer = new Customer();		

		$customerService = new CustomerService($connection, $customer); 
		$customers = $customerService->recover();


	//RECOVER ID
	} else if($action == 'recoverId') {
		
		$customer = new Customer();

		$connection = new Connection();

		$customerService = new CustomerService($connection, $customer);
		$customers = $customerService->recoverId();


	//UPDATE
	}else if($action == 'update'){

	$connection = new Connection();

	$customer = new Customer();
	$customer->__set('id',$_POST['id']);
	$customer->__set('name',$_POST['name']);
	$customer->__set('cpf',$_POST['cpf']);
	$customer->__set('address',$_POST['address']);
	$customer->__set('phone',$_POST['phone']);
	$customer->__set('mail',$_POST['mail']);
	$customer->__set('dob',$_POST['dob']);
	

	$customerService = new CustomerService($connection, $customer); 
	$customerService->update();

	if(isset($_GET['status']) && $_GET['status'] == 'search_update'){
		header('location: customer_search.php');
	}else{
		header('location: customer_database.php');	
	}


	//DELETE
	}else if($action == 'delete'){

	$connection = new Connection();

	$customer = new Customer();
	$customer->__set('id',$_GET['id']);		

	$customerService = new CustomerService($connection, $customer); 
	$customers = $customerService->delete();

	if(isset($_GET['status']) && $_GET['status'] == 'search_delete'){
		header('location: customer_search.php');
	}else{
		header('location: customer_database.php');	
	}


	//SEARCH CUSTOMER
	} else if($action == 'searchCustomer') {

		if(empty($_POST['search_customer'])){
		header('location: customer_search.php?fields=white');
		exit;
		}
	
		$customer = new Customer();

		$connection = new Connection();

		$customerService = new CustomerService($connection, $customer);
		$customers = $customerService->searchCustomer();

	}	




	
?>