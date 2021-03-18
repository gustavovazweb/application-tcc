<?php
  
  session_start();
  require 'login_check.php';

?>

<!-- MAIN NAVBAR -->
<nav class="navbar bold navbar-dark bg-dark navbar-expand-lg navbar-light fixed-top position-fixed bg-light">
  <div class="container">
    <!-- LOGO -->
    <a class="navbar-brand" href="../../main.php"><img class="logo" src="../../img/logo.png">Sistema Web | Renata Laços</a>
      <!-- NAVBAR TOGGLE -->
      <form class="d-flex">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </form>
    <!-- NAVBAR MENU -->
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