<?php
session_start();
include('verifica_login.php');
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>

  <!--Codigos obrigatorios para iniciar o bootstrap-->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="scss/css.css">

  <title>Menu do professor</title>

</head>

<body>
<style>
    body {
      background-image: url("assets/maleta.jpg");
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;

    }
  </style>
  <!--Divisão do MENU-->
  <div class="container">

    <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">

      <a class="navbar-brand" href="index.php"><img src="assets/bus.png" alt="Logo da Viagem"></a>

      <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSite">
        <span class="navbar-toggler-icon icon-bar"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSite">

        <ul class="nav navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link text-light" href="index.php">Viagens</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="criarViagem.php">Criar viagem</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="gerenciarViagem.php">Gerenciar viagens</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="addPagamento.php">Pagamento</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-primary" href="logout.php">Sair</a>
          </li>
        </ul>
      </div>
    </nav>
    <!--Usuário logado-->
    <h5 class="nav-link text-light">Logado como: <?php echo $_SESSION['usuario']; ?><h5>
  </div>



  <!--Scripts JavaScrip necessarios para o funcionamento-->
  <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
  <script type="text/javascript" src="js/popper.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>

</body>

</html>