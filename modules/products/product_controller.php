<?php

	require_once "connection.php";
	require_once "product.service.php";
	require_once "product.model.php";


	$action = isset($_GET['action']) ? $_GET['action'] : $action;	


	//INSERT
	if($action == 'insert'){

		if(empty($_POST['product']) || empty($_POST['value']) || empty($_POST['notes'])){
		header('location: product_new.php?fields=white');
		exit();
		}

		$connection = new Connection();

		$product = new Product();
		$product->__set('product',$_POST['product']);
		$product->__set('amount',$_POST['amount']);
		$product->__set('value',$_POST['value']);
		$product->__set('notes',$_POST['notes']);

		$productService = new ProductService($connection, $product); 
		$productService->insert();

		header('location: product_new.php?fields=success');


		//RECOVER
	}else if($action == 'recover'){

		$connection = new Connection();

		$product = new Product();		

		$productService = new ProductService($connection, $product); 
		$products = $productService->recover();


		//UPDATE
	}else if($action == 'update'){

		$connection = new Connection();

		$product = new Product();
		$product->__set('id',$_POST['id']);
		$product->__set('product',$_POST['product']);
		$product->__set('amount',$_POST['amount']);
		$product->__set('value',$_POST['value']);
		$product->__set('notes',$_POST['notes']);
		

		$productService = new ProductService($connection, $product); 
		$productService->update();

		if(isset($_GET['status']) && $_GET['status'] == 'search_update'){
			header('location: product_search.php');
		}else{
			header('location: product_inventory.php');	
		}
		

		//DELETE
	}else if($action == 'delete'){

		$connection = new Connection();

		$product = new Product();
		$product->__set('id',$_GET['id']);		

		$productService = new ProductService($connection, $product); 
		$products = $productService->delete();

		if(isset($_GET['status']) && $_GET['status'] == 'search_delete'){
			header('location: product_search.php');
		}else{
			header('location: product_inventory.php');	
		}


		//PRODUCT UNAVAILABLE
	}else if($action == 'productUnavailable'){

		$connection = new Connection();

		$product = new Product();
		$product->__set('id',$_GET['id'])->__set('id_status',2);				

		$productService = new ProductService($connection, $product); 
		$productService->productUnavailable();

		if(isset($_GET['status']) && $_GET['status'] == 'search_product_unavailable'){
			header('location: product_search.php');
		}else{
			header('location: product_inventory.php');	
		}


		//PRODUCT AVAILABLE
	}else if($action == 'productAvailable'){

		$connection = new Connection();

		$product = new Product();
		$product->__set('id_status',1);		

		$productService = new ProductService($connection, $product); 
		$products = $productService->productAvailable();
		

	//SEARCH PRODUCT
	} else if($action == 'searchProduct') {

		if(empty($_POST['search_product'])){
		header('location: product_search.php?fields=white');
		exit;
		}
	
		$product = new Product();

		$connection = new Connection();

		$productService = new ProductService($connection, $product);
		$products = $productService->searchProduct();

	}	

?>
