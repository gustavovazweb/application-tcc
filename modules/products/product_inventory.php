<?php

  session_start(); 
  $action = 'recover';
  require 'product_controller.php';

?>
<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../../css/custom.css">
    <!-- FONTS AWESOME -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!-- FAV ICON -->
    <link rel="icon" href="../../img/fav.png">
    <!-- FONT GOOGLE -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">    
    <title>Sistema Web</title>
    <!-- JAVASCRIPT FOR DELETE, UPDATE AND CHANGE THE STATUS OF A PRODUCT -->
    <script>
      
      //DELETE FUNCTION
      function delet(id){
        location.href = 'product_inventory.php?action=delete&id=' + id;
      }

      //PRODUCT UNAVAILABLE FUNCTION
      function productUnavailable(id){
        location.href = 'product_inventory.php?action=productUnavailable&id=' + id;
      }

      //UPDATE FUNCTION
      function update(id, txt_product, amount, txt_value, txt_notes){

        let form = document.createElement('form')
        form.action = 'product_controller.php?action=update'
        form.method = 'post'
        form.className = 'row'
        

        let input = document.createElement('input')
        input.type = 'text'
        input.value = txt_product
        input.name = 'product'
        input.className = 'col-4 form-control'
        input.placeholder = 'Nome do produto...'
        

        let inputAmount = document.createElement('input')
        inputAmount.type = 'number'
        inputAmount.value = amount
        inputAmount.name = 'amount'
		    inputAmount.max = '999'
		    inputAmount.min = '1'
        inputAmount.className = 'col-1 form-control'

        let inputValue = document.createElement('input')
        inputValue.type = 'text'
        inputValue.value = txt_value
        inputValue.name = 'value'
        inputValue.className = 'col-2 form-control'
        inputValue.placeholder = 'R$ 0,00'

        let inputNotes = document.createElement('input')
        inputNotes.type = 'text'
        inputNotes.value = txt_notes
        inputNotes.name = 'notes'
        inputNotes.className = 'col-3 form-control'
        inputNotes.placeholder = 'Observações importantes...'

        let inputId = document.createElement('input')        
        inputId.value = id
        inputId.name = 'id'
        inputId.type = 'hidden'

        let button = document.createElement('button')
        button.innerHTML = 'Atualizar'
        button.className = 'col-2 btn btn-success'
        button.type = 'submit'

        form.appendChild(input).required = true

        form.appendChild(inputNotes).required = true

        form.appendChild(inputValue).required = true

        form.appendChild(inputAmount).required = true

        form.appendChild(inputId)

        form.appendChild(button)

        let product = document.getElementById('product_' + id)

        product.innerHTML = ''

        product.insertBefore(form,product[0])

      }

      function validateForm() {
        var x = document.forms["form"]["product"].value;
      if (x == "") {
        alert("Todos os campos devem ser preenchidos!");
      return false;
      }


}
    </script>
  </head>
  <body>
    <!-- HEADER -->
    <header>
    <!-- NAVBAR -->
    <nav class="navbar bold navbar-dark bg-dark navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <!-- LOGO -->
        <a class="navbar-brand" href="../../main.php"><img class="logo" src="../../img/logo.png">Sistema Web | Renata Laços</a>
        <!-- NAVBAR TOGGLE -->     
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>        <!-- NAVBAR MENU -->
        <div class="collapse navbar-collapse " id="navbarSupportedContent">                  
          <ul class="navbar-nav ml-auto">              
            <li class="nav-item dropdown">                      
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Olá, <?php echo $_SESSION['user']; ?></a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a href="../employees/logout.php"><button class="btn btn-outline-success my-2 my-sm-0 dropdown-item" type="button" data-toggle="modal" data-target="#modal_manual">Sair</button></a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    </header>
    <!-- MAIN SECTION -->
    <section class="d-flex justify-content-center align-items-center">
      <div class="container margin1">
        <div class="row">
          <div class="col-md-12">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../../main.php">Principal</a></li>
                <li class="breadcrumb-item active"><a href="product_inventory.php">Estoque de Produtos</a></li>
              </ol>
            </nav>
          </div>
          <div class="col-md-12">
            <div class="container page">
              <div class="row">
              <div class="col">
              <!-- PRODUCTS INVENTORY LIST -->
              <h4>Estoque de Produtos</h4>
              <hr />
              <!-- FOREEACH PRODUCTS LIST -->
              <?php foreach ($products as $index => $product) { ?>
              <div class="row mb-3 d-flex align-items-center">
                <div class="col-sm-10" id="product_<?= $product->id ?>">
                  <h5><?= $product->product ?> | <?= $product->notes ?> | <?= $product->value ?> | <?= $product->amount ?> unidade(s) | <?= $product->status ?></h5>
                </div>
                <div class="col-sm-2 mt-2 d-flex justify-content-between">
                  <i class="fas fa-trash-alt fa-lg icon" onclick="delet(<?= $product->id ?>)"></i>
                    <?php if($product->status == 'DISPONÍVEL'){ ?>
                      <i class="fas fa-edit fa-lg icon" onclick="update(<?= $product->id ?>,'<?= $product->product ?>','<?= $product->amount ?>','<?= $product->value ?>','<?= $product->notes ?>')"></i>
                      <i class="fas fa-check-square fa-lg icon" onclick="productUnavailable(<?= $product->id ?>)"></i>
                    <?php } ?>
                </div>
              </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
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