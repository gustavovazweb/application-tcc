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
  </head>
  <body>
    <!-- HEADER -->
    <header>
      <!-- NAVBAR -->
      <?php
        include 'navbar.php';
      ?>      
    </header>      
    <!-- MAIN SECTION -->    
    <section class="d-flex justify-content-center align-items-center">
      <div class="container margin1">              
        <div class="row">
          <div class="col-md-12">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../../main.php">Principal</a></li>
                <li class="breadcrumb-item active"><a href="login_new.php">Novo Funcionário</a></li>
              </ol>
            </nav>
          </div>
          <div class="col-md-12">
            <div class="container page">
                <div class="row">
                <div class="col">
                  <!-- NEW CUSTOMER SECTION -->
                  <h4>Novo Funcionário</h4>
                  <hr />
                  <form method="post" action="login_controller.php?action=register">
                    <div class="form-group">
                      <label>Nome:</label>                              
                      <input type="text" name="name" class="col-10 form-control">
                    </div>
                    <div class="form-group">
                      <label>Sobrenome:</label>                              
                      <input type="text" name="surname" class="col-10 form-control">
                    </div>
                    <div class="form-group">
                      <label>Cargo:</label>                              
                      <input type="text" name="post" class="col-10 form-control">
                    </div>
                    <div class="form-group">
                      <label>Endereço:</label>                              
                      <input type="text" name="address" class="col-10 form-control" placeholder="Rua Dinamarca 25 apto 101 Atuba Curitiba-PR">
                    </div>
                    <div class="form-group">
                      <label>Telefone:</label>                              
                      <input type="text" name="phone" id="phone" class="col-10 form-control cel-sp-mask">
                    </div>
                    <div class="form-group">
                      <label>Email:</label>                              
                      <input type="email" name="mail" class="col-10 form-control" placeholder="exemplo@email.com">
                    </div>
                    <div class="form-group">
                      <label>Senha:</label>                              
                      <input type="password" name="password" class="col-10 form-control" minlength="8" placeholder="Mínimo 8 caracteres...">
                    </div>                          
                      <button class="btn btn-success">Cadastrar</button>
                  </form>                                                                        
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ALERT SECTION -->
    <section class="alerta">
    <!-- SUCCESS -->
    <?php if(isset($_GET['status']) && $_GET['status'] == 'success'){ ?>
      <script>
        alert ('Funcionário cadastrado com sucesso!');
      </script>
    <?php } ?>
    <!-- WHITE -->
    <?php if(isset($_GET['fields']) && $_GET['fields'] == 'white'){ ?>
      <script>
        alert ('Campo(s) vazio(s)! Favor preencha todos os campos!');
      </script>
    <?php } ?>
    </section>
    <!-- JQUERY -->
    <script type="text/javascript" src="../../jquery/cpf_mask/jquery-1.2.6.pack.js"></script>
    <script type="text/javascript" src="../../jquery/cpf_mask/jquery.maskedinput-1.1.4.pack.js"></script>
    <!-- INPUT MASKS -->
    <script>
      $("#phone").mask("(99) 9 9999-9999");
        $("#phone").on("blur", function() {
          var last = $(this).val().substr( $(this).val().indexOf("-") + 1 );

          if( last.length == 3 ) {
            var move = $(this).val().substr( $(this).val().indexOf("-") - 1, 1 );
            var lastfour = move + last;
            var first = $(this).val().substr( 0, 9 );

            $(this).val( first + '-' + lastfour );
          }
        });
    </script>    
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>