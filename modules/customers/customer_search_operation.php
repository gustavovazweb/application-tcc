<?php

  require 'customer_controller.php';
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
<!--JAVASCRIPT FORM CREATING-->
<script>
      
      function delet(id){
        location.href = 'customer_database.php?action=delete&status=search_delete&id=' + id;
      }

      function update(id, txt_name, txt_cpf, txt_address, txt_phone, txt_mail, txt_dob){

        let form = document.createElement('form')
        form.action = 'customer_controller.php?action=update'
        form.method = 'post'
        form.className = 'row'

        let inputName = document.createElement('input')
        inputName.type = 'text'
        inputName.value = txt_name
        inputName.name = 'name'
        inputName.className = 'col-4 form-control'
        inputName.placeholder = 'Nome do cliente'

        let inputCpf = document.createElement('input')
        inputCpf.type = 'text'
        inputCpf.value = txt_cpf
        inputCpf.name = 'cpf'
        inputCpf.className = 'col-3 form-control'
        inputCpf.placeholder = '000.000.000-00'

        let inputAddress = document.createElement('input')
        inputAddress.type = 'text'
        inputAddress.value = txt_address
        inputAddress.name = 'address'
        inputAddress.className = 'col-6 form-control'
        inputAddress.placeholder = 'ex: Rua Estados Unidos 225 apto 401 Centro Curitiba-PR'

        let inputPhone = document.createElement('input')
        inputPhone.type = 'text'
        inputPhone.value = txt_phone
        inputPhone.name = 'phone'
        inputPhone.className = 'col-2 form-control'
        inputPhone.placeholder = '(41) 9 0000-0000'

        let inputMail = document.createElement('input')
        inputMail.type = 'email'
        inputMail.value = txt_mail
        inputMail.name = 'mail'
        inputMail.className = 'col-4 form-control'
        inputMail.placeholder = 'email@exemplo.com'

        let inputDob = document.createElement('input')
        inputDob.type = 'text'
        inputDob.value = txt_dob
        inputDob.name = 'dob'
        inputDob.className = 'col-3 form-control'
        inputDob.placeholder = 'ano-mês-dia (ex: 1999-05-01)'

        let inputId = document.createElement('input')
        inputId.value = id
        inputId.name = 'id'
        inputId.type = 'hidden'

        let button = document.createElement('button')
        button.innerHTML = 'Atualizar'
        button.className = 'col-2 btn btn-success'
        button.type = 'submit'

        form.appendChild(inputName).required = true

        form.appendChild(inputAddress).required = true

        form.appendChild(inputPhone).required = true

        form.appendChild(inputMail).required = true

        form.appendChild(inputCpf).required = true

        form.appendChild(inputDob).required = true

        form.appendChild(inputId)

        form.appendChild(button)

        let customer = document.getElementById('customer_' + id)

        customer.innerHTML = ''

        customer.insertBefore(form,customer[0])

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
                            <li class="breadcrumb-item"><a href="customer_search.php">Pesquisar Clientes</a></li>
                            <li class="breadcrumb-item active"><a href="customer_search.php">Resultados da Pesquisa</a></li>
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
                                <?php foreach ($customers as $index => $customer) { ?>
                                <div class="row mb-3 d-flex align-items-center">
                                    <div class="col-sm-11" id="customer_<?= $customer->id ?>">
                                    <h5><?= $customer->name ?> | <?= $customer->address ?> | <?= $customer->phone ?> | <?= $customer->mail ?> | CPF: <?= $customer->cpf ?> | NASCIMENTO: <?= $customer->dob ?></h5>
                                    </div>
                                    <div class="col-sm-1 mt-2 d-flex justify-content-between">
                                    <i class="fas fa-trash-alt fa-lg icon" onclick="delet(<?= $customer->id ?>)"></i>                                       
                                    <i class="fas fa-edit fa-lg icon" onclick="update(<?= $customer->id ?>,'<?= $customer->name ?>','<?= $customer->cpf ?>','<?= $customer->address ?>','<?= $customer->phone ?>','<?= $customer->mail ?>','<?= $customer->dob ?>')"></i>
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