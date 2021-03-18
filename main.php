<?php

  session_start();  
  require 'modules/employees/login_check.php';
  
?>
<!doctype html>
<html lang="pt-br">
  <head>
    <!-- META TAGS -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!-- CUSTOM CSS -->
    <link rel="stylesheet" href="css/custom.css">
    <!-- FONTS AWESOME -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!-- FAV ICON -->
    <link rel="icon" href="img/fav.png">
    <!-- FONT GOOGLE -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet"> 
    <!-- TITLE -->
    <title>Sistema Web</title>
  </head>
  <body>
    <!-- HEADER -->
    <header>
    <!-- NAVBAR -->
    <nav class="navbar navbar-fixed navbar-dark bg-dark navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <!-- LOGO -->    
        <a class="navbar-brand bold" href="main.php"><img class="logo" src="img/logo.png">Sistema Web | Renata Laços</a>
        <!-- NAVBAR TOGGLE -->     
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>                
        <!-- NAVBAR MENU -->
        <div class="collapse navbar-collapse " id="navbarSupportedContent">                  
          <ul class="navbar-nav ml-auto">              
            <li class="nav-item dropdown">                      
              <a class="nav-link dropdown-toggle bold" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Olá, <?php echo $_SESSION['user']; ?></a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a href="modules/employees/logout.php"><button class="btn btn-outline-success my-2 my-sm-0 dropdown-item bold" type="button" data-toggle="modal" data-target="#modal_manual">Sair</button></a>
              </div>               
            </li>      
          </ul>                       
        </div>
      </div>
    </nav>
    <!-- NAVBAR BOTTOM -->
    <nav class="navbar fixed-bottom navbar-dark bg-dark navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <ul class="navbar-nav mx-auto">
        <!-- LOGO -->    
        <a class="navbar-brand bold" href="main.php"><img class="logo" src="img/logo.png">Sistema Web 2021 © Todos os direitos reservados</a>   
        </ul> 
      </div>    
    </nav>
    </header>
    <!-- MAIN SECTION -->
    <section class="d-flex">
      <div class="d-flex flex-column container margin1">
        <div class="row align-items-center justify-content-center">
          <a href="modules/products/product_new.php" type="button" class="btn btn-success btn-lg ml-5 mb-4 bold"><i class="fas fa-box-open fa-2x"></i><hr>&nbsp&nbspCadastrar Produto&nbsp&nbsp&nbsp&nbsp</a>
          <a href="modules/products/product_inventory.php" type="button" class="btn btn-success btn-lg ml-5 mb-4 bold"><i class="fas fa-boxes fa-2x"></i></i><hr>Estoque de Produtos</a>
          <a href="modules/products/product_available.php" type="button" class="btn btn-success btn-lg ml-5 mb-4 bold"><i class="fas fa-pallet fa-2x"></i></i><hr>Produtos Disponíveis</a>
          <a href="modules/products/product_search.php" type="button" class="btn btn-success btn-lg ml-5 mb-4 bold"><i class="fas fa-search fa-2x"></i><hr>&nbsp&nbsp&nbspPesquisar Produto&nbsp&nbsp&nbsp</a>
        </div>
        <div class="row align-items-center justify-content-center">
          <a href="modules/customers/customer_new.php" type="button" class="btn btn-success btn-lg ml-5 mb-4 bold"><i class="fas fa-user-plus fa-2x"></i><hr>&nbsp&nbsp&nbsp&nbspCadastrar Cliente&nbsp&nbsp&nbsp&nbsp</a>
          <a href="modules/customers/customer_database.php" type="button" class="btn btn-success btn-lg ml-5 mb-4 bold"><i class="fas fa-user-cog fa-2x"></i></i><hr>Editar/Excluir Cliente</a>
          <a href="modules/customers/customer_search.php" type="button" class="btn btn-success btn-lg ml-5 mb-4 bold"><i class="fas fa-user-check fa-2x"></i></i><hr>&nbsp&nbsp&nbspPesquisar Cliente&nbsp&nbsp&nbsp</a>
          <a href="modules/os/os_database.php" type="button" class="btn btn-success btn-lg ml-5 mb-4 bold"><i class="fas fa-edit fa-2x"></i><hr>&nbsp&nbsp&nbspOrdens de Serviço&nbsp&nbsp&nbsp&nbsp</a>
        </div>
        <div class="row align-items-center justify-content-center">
          <a href="modules/employees/login_new.php" type="button" class="btn btn-success btn-lg ml-5 mb-4 bold"><i class="fas fa-user-tie fa-2x"></i><hr>Cadastrar Funcionário</a>
          <a href="modules/employees/login_database.php" type="button" class="btn btn-success btn-lg ml-5 mb-4 bold"><i class="fas fa-users-cog fa-2x"></i></i><hr>&nbsp&nbspEditar/Excluir Func.&nbsp</a>
          <a href="modules/os/os_new.php" type="button" class="btn btn-success btn-lg ml-5 mb-4 bold"><i class="fas fa-file-signature fa-2x"></i></i><hr>&nbsp&nbspCadastrar Nova OS&nbsp</a>
          <a href="modules/os/os_search.php" type="button" class="btn btn-success btn-lg ml-5 mb-4 bold"><i class="fas fa-search-dollar fa-2x"></i><hr>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspPesquisar OS&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</a>
        </div>
      </div>
    </section>
    <!-- jQuery  -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <!-- Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>