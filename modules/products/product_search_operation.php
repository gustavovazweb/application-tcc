<?php

  session_start();
  require 'product_controller.php';
  error_reporting(0);
  ini_set(“display_errors”, 0 );

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
    </head>
    <body>
        <!-- HEADER -->
        <header>
            <!-- NAVBAR -->
            <?php
                include 'navbar.php';
            ?>            
        </header>
    <section>
<!--JAVASCRIPT FOR DELETE, UPDATE AND CHANGE THE STATUS OS A PRODUCT-->
<script>
      
    //DELETE FUNCTION
    function delet(id){
        location.href = 'product_inventory.php?action=delete&status=search_delete&id=' + id;
    }

    //PRODUCT UNAVAILABLE FUNCTION
    function productUnavailable(id){
        location.href = 'product_inventory.php?action=productUnavailable&status=search_product_unavailable&id=' + id;
    }

    //UPDATE FUNCTION
    function update(id, txt_product, amount, txt_value, txt_notes){

        let form = document.createElement('form')
        form.action = 'product_controller.php?action=update&status=search_update'
        form.method = 'post'
        form.className = 'row'

        let input = document.createElement('input')
        input.type = 'text'
        input.value = txt_product
        input.name = 'product'
        input.className = 'col-4 form-control'
        input.placeholder = 'Nome do produto...'

        let inputNotes = document.createElement('input')
        inputNotes.type = 'text'
        inputNotes.value = txt_notes
        inputNotes.name = 'notes'
        inputNotes.className = 'col-3 form-control'
        inputNotes.placeholder = 'Observações importantes...'

        let inputValue = document.createElement('input')
        inputValue.type = 'text'
        inputValue.value = txt_value
        inputValue.name = 'value'
        inputValue.className = 'col-2 form-control'
        inputValue.placeholder = 'R$ 0,00'

        let inputAmount = document.createElement('input')
        inputAmount.type = 'number'
        inputAmount.value = amount
        inputAmount.name = 'amount'
		inputAmount.max = '999'
		inputAmount.min = '1'
        inputAmount.className = 'col-1 form-control'

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

</script>	
<!--CONTAINER LIST GROUP LINKS NAVIGATION-->
        <div class="container app margin1">
            <div class="row">
                <div class="col-md-12">
                    <!--BREADCRUMB-->
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="../../main.php">Principal</a></li>
                            <li class="breadcrumb-item"><a href="product_search.php">Pesquisar Produtos</a></li>
                            <li class="breadcrumb-item active"><a href="product_search.php">Resultados da Pesquisa</a></li>
                        </ol>
                    </nav>
                </div>
                <!--FORM SECTION-->
                <div class="col-md-12">
                    <div class="container page">
                        <div class="row">
                            <div class="col">
                                <h4>Resultados da Pesquisa</h4>
                                <hr />
                                <!--FOREACH LIST PRODUCTS-->
                                <?php foreach ($products as $index => $product) { ?>
                                <div class="row mb-3 d-flex align-items-center">
                                    <div class="col-sm-10" id="product_<?= $product->id ?>">
                                    <h5><?= $product->product ?> | <?= $product->notes ?> | <?= $product->value ?> | <?= $product->amount ?> unidade(s) | <?= $product->status ?></h5>
                                    </div>
                                    <div class="col-sm-2 mt-2 d-flex justify-content-between">
                                    <i class="fas fa-trash-alt fa-lg icon" onclick="delet(<?= $product->id ?>)"></i>
                                        <!-- DELETE AND STATUS BUTTON -->
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
                    <br>
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