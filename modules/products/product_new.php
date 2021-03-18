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
    <!--JQUERY LOCAL-->
		<script src="../../jquery/money_mask/jquery.min.js" type="text/javascript"></script>
		<!--JQUERY LOCAL MONEY FIELD-->
		<script src="../../jquery/money_mask/jquery.maskMoney.js" type="text/javascript"></script>
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
                <li class="breadcrumb-item active"><a href="product_new.php">Novo Produto</a></li>
              </ol>
            </nav>
          </div>
          <div class="col-md-12">
            <div class="container page">
                <div class="row">
                <div class="col">
                  <!-- NEW PRODUCT SECTION -->
                  <h4>Novo Produto</h4>
                  <hr />
                  <form method="post" action="product_controller.php?action=insert">
                    <div class="form-group">
                      <label>Descrição do produto:</label>                              
                      <input type="text" name="product" class="col-10 form-control" placeholder="Camisa feminina casual Summer tamanho P ">
                    </div>
                    <div class="form-group d-flex">
                      <label class="mt-3">Quantidade:</label>                              
                      <input type="number" name="amount" value="1" class="col-2 form-control ml-3 mr-5 mb-2 mt-2" min="1" max="999">                    
                      <label class="mt-3">Valor:</label>                              
                      <input type="text" name="value" class="col-2 form-control ml-3 mb-2 mt-2" id="value">
                    </div>
                    <div class="form-group">
                      <label>Anotações:</label>
                      <textarea name="notes" class="col-10 form-control" placeholder="Observações importantes..."></textarea>                              
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
    <section>
    <!-- SUCCESS -->
    <?php if(isset($_GET['fields']) && $_GET['fields'] == 'success'){ ?>
      <script>
        alert ('Produto cadastrado com sucesso!');
      </script>
    <?php } ?>
    <!-- WHITE -->
    <?php if(isset($_GET['fields']) && $_GET['fields'] == 'white'){ ?>
      <script>
        alert ('Campo(s) vazio(s)! Favor preencher todos os campos!');
      </script>
    <?php } ?>
    <!-- INPUT MASKS -->
    </section>
    <!-- JQUERY MONEY SCRIPT -->
		<script type="text/javascript">
			$(function(){
 				$("#value").maskMoney({symbol:'R$ ', 
				showSymbol:true, thousands:'.', decimal:',', symbolStay: true});
 			})
		</script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>