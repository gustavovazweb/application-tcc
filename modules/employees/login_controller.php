<?php

	session_start();

	require 'connection.php';
	require 'login.model.php';
	require 'login.service.php';	


	
	$action = isset($_GET['action']) ? $_GET['action'] : $action;

	//LOGIN

	if($action == 'login'){

	if(empty($_POST['mail']) || empty($_POST['password'])){
		header('location: ../../index.php?fields=white');
		exit();
	}

	$connection = new Connection();

	$login = new Login();
	$login->__set('mail',$_POST['mail']);
	$login->__set('password',$_POST['password']);

	$loginService = new LoginService($connection, $login);
	$loginService->login();

	if($login->__get('id') != '' && $login->__get('name') != ''){
		$_SESSION['user'] = $login->__get('name');
		header('location: ../../main.php');
	}else{
		header('location: ../../index.php?status=erro');
	}

	
	//REGISTER
	}else if($action == 'register'){

	if(empty($_POST['name']) || empty($_POST['surname']) || empty($_POST['post']) || empty($_POST['address'])
	|| empty($_POST['phone']) || empty($_POST['mail']) || empty($_POST['password'])){
		header('location: login_new.php?fields=white');
		exit();
	}

	$connection = new Connection();

	$login = new Login();
	$login->__set('name',$_POST['name']);
	$login->__set('surname',$_POST['surname']);
	$login->__set('post',$_POST['post']);
	$login->__set('address',$_POST['address']);
	$login->__set('phone',$_POST['phone']);
	$login->__set('mail',$_POST['mail']);
	$login->__set('password',$_POST['password']);

	$loginService = new LoginService($connection, $login);
	$loginService->register();

		header('location: login_new.php?status=success');



	//RECOVER
	}else if($action == 'recover'){

		$connection = new Connection();

		$login = new Login();		

		$loginService = new LoginService($connection, $login); 
		$logins = $loginService->recover();




	//UPDATE
	}else if($action == 'update'){

	$connection = new Connection();

	$login = new Login();
	$login->__set('id',$_POST['id']);
	$login->__set('name',$_POST['name']);
	$login->__set('surname',$_POST['surname']);
	$login->__set('post',$_POST['post']);
	$login->__set('address',$_POST['address']);
	$login->__set('phone',$_POST['phone']);
	$login->__set('mail',$_POST['mail']);
	$login->__set('password',$_POST['password']);
	

	$loginService = new LoginService($connection, $login); 
	$loginService->update();

	if(isset($_GET['action']) && $_GET['action'] == 'update'){
		header('location: login_database.php');
	}else{
		header('location: login_database.php');	
	}



	//DELETE
	}else if($action == 'delete'){

	$connection = new Connection();

	$login = new Login();
	$login->__set('id',$_GET['id']);		

	$loginService = new LoginService($connection, $login); 
	$logins = $loginService->delete();

	if(isset($_GET['action']) && $_GET['action'] == 'delete'){
		header('location: login_database.php');
	}else{
		header('location: login_database.php');	
	}

	}
	
?>