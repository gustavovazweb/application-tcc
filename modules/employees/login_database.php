<?php

  $action = 'recover';
  require 'login_controller.php';

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
    <link rel="stylesheet" href="../../css/custom.css">
    <!-- FONTS AWESOME -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!-- FAV ICON -->
    <link rel="icon" href="../../img/fav.png">
    <!-- FONT GOOGLE -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet"> 
    <title>Sistema Web</title>
    <!-- JAVASCRIPT FOR DELETE AND UPDATE -->
    <script>
      
      //DELETE FUNCTION
      function delet(id){
        location.href = 'login_database.php?action=delete&id=' + id;
      }

      //UPDATE FUNCTION
      function update(id, txt_name, txt_surname, txt_post, txt_address, txt_phone, txt_mail, txt_password){

        let form = document.createElement('form')
        form.action = 'login_controller.php?action=update'
        form.method = 'post'
        form.className = 'row'

        let inputName = document.createElement('input')
        inputName.type = 'text'
        inputName.value = txt_name
        inputName.name = 'name'
        inputName.className = 'col-2 form-control'
        inputName.placeholder = 'Nome do funcionário'
        

        let inputSurname = document.createElement('input')
        inputSurname.type = 'text'
        inputSurname.value = txt_surname
        inputSurname.name = 'surname'
        inputSurname.className = 'col-4 form-control'
        inputSurname.placeholder = 'Sobrenome do funcionário'

        let inputPost = document.createElement('input')
        inputPost.type = 'text'
        inputPost.value = txt_post
        inputPost.name = 'post'
        inputPost.className = 'col-2 form-control'
        inputPost.placeholder = 'Cargo'

        let inputAddress = document.createElement('input')
        inputAddress.type = 'text'
        inputAddress.value = txt_address
        inputAddress.name = 'address'
        inputAddress.className = 'col-4 form-control'
        inputAddress.placeholder = 'ex: Rua Dinamarca 254 apto 201 Centro Curitiba-PR'

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
        inputMail.placeholder = 'exemplo@email.com'

        let inputPassword = document.createElement('input')
        inputPassword.type = 'password'
        inputPassword.value = txt_password
        inputPassword.name = 'password'
        inputPassword.type = 'hidden'

        let inputId = document.createElement('input')        
        inputId.value = id
        inputId.name = 'id'
        inputId.type = 'hidden'

        let button = document.createElement('button')
        button.innerHTML = 'Atualizar'
        button.className = 'col-2 btn btn-success'
        button.type = 'submit'

        form.appendChild(inputName).required = true

        form.appendChild(inputSurname).required = true

        form.appendChild(inputPost).required = true

        form.appendChild(inputAddress).required = true

        form.appendChild(inputPhone).required = true

        form.appendChild(inputMail).required = true

        form.appendChild(inputPassword).required = true

        form.appendChild(inputId)

        form.appendChild(button)

        let login = document.getElementById('login_' + id)

        login.innerHTML = ''

        login.insertBefore(form,login[0])

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
              <a href="logout.php"><button class="btn btn-outline-success my-2 my-sm-0 dropdown-item" type="button" data-toggle="modal" data-target="#modal_manual">Sair</button></a>
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
                <li class="breadcrumb-item active"><a href="login_database.php">Funcionários</a></li>
              </ol>
            </nav>
          </div>
          <div class="col-md-12">
            <div class="container page">
              <div class="row">
              <div class="col">
              <!-- EMPLOYEES LIST -->
              <h4>Funcionários</h4>
              <hr />
              <?php foreach ($logins as $index => $login) { ?>
              <div class="row mb-3 d-flex align-items-center">
                <div class="col-sm-11" id="login_<?= $login->id ?>">
                  <h5><?= $login->name ?> <?= $login->surname ?> | <?= $login->post ?> | <?= $login->address ?> | <?= $login->phone ?> | <?= $login->mail?></h5>
                </div>
                <div class="col-sm-1 mt-2 d-flex justify-content-between">
                  <i class="fas fa-trash-alt fa-lg icon" onclick="delet(<?= $login->id ?>)"></i>
                  <i class="fas fa-edit fa-lg icon" onclick="update(<?= $login->id ?>,'<?= $login->name ?>','<?= $login->surname ?>','<?= $login->post ?>','<?= $login->address ?>','<?= $login->phone ?>','<?= $login->mail ?>')"></i>
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
  <!-- JQUERY  -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <!-- POPPER.js -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <!-- BOOTSTRAP JS -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>