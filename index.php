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
    <!-- FONT GOOGLE -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet"> 
    <!-- FAV ICON -->
    <link rel="icon" href="img/fav.png">
    <title>Sistema Web</title>
  </head>
  <body>
    <!-- HEADER -->
    <header>
    <!-- NAVBAR TOP -->
    <nav class="navbar navbar-dark bg-dark navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <!-- LOGO -->
        <a class="navbar-brand bold" href="index.php"><img class="logo" src="img/logo.png">Sistema Web | Renata Laços</a>
          <!-- NAVBAR BUTTON -->
          <button class="btn btn-success my-2 my-sm-0 bold" type="button" data-toggle="modal" data-target="#modal_reg">Suporte</button>
          <!-- MODAL  -->
          <div class="modal fade" id="modal_reg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title bold" id="exampleModalLabel">Suporte e Dúvidas Técnicas</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">                    
                <p class="bold"><i class="fas fa-phone"></i> (41) 3333-3333</p>
                <p class="bold"><i class="fab fa-whatsapp"></i> (41) 9 9999-9999</p>
                <p class="bold"><i class="fas fa-envelope"></i> contato@sistemaweb.com.br</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </nav>
    <!-- NAVBAR BOTTOM -->
    <nav class="navbar fixed-bottom position-fixed navbar-dark bg-dark navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <ul class="navbar-nav mx-auto">
          <!-- LOGO -->
          <a class="navbar-brand bold" href="index.php">
            <img class="logo" src="img/logo.png">
              Sistema Web 2021 © Todos os direitos reservados
          </a>             
        </ul> 
      </div>    
    </nav>
    </header>   
    <!-- MAIN SECTION -->
    <section class="main container d-flex justify-content-center align-items-center">
      <div class="border">
        <h5 class="text-white bold text-center">Área de Acesso</h5>      
        <form method="post" action="modules/employees/login_controller.php?action=login">
          <div class="form-group">
			      <img src="img/mail.svg" class="icons1">
            <input type="email" name="mail" class="form-control icons2" aria-describedby="emailHelp" placeholder="Digite seu email">				
          </div>
          <div class="form-group">
			      <img src="img/pass.svg" class="icons1">
            <input type="password" name="password" class="form-control icons2" placeholder="Digite sua senha">
          </div>
          <button type="submit" class="btn btn-success btn-block bold">Entrar</button>
        </form>
      </div>
    </section>    
    <?php if(isset($_GET['status']) && $_GET['status'] == 'erro'){ ?>
      <script>
        alert ('Login e/ou senha incorretos! Favor tente novamente.');
      </script>
    <?php } ?>
    <?php if(isset($_GET['fields']) && $_GET['fields'] == 'white'){ ?>
      <script>
        alert ('Campo(s) vazio(s)! Favor preencha todos os campos!');
      </script>
    <?php } ?>
    <!-- JQUERY  -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <!-- POPPER JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <!-- BOOTSTRAP JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>