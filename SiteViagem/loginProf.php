<?php
  session_start();
  if (isset($_SESSION['usuario'])) {
    if($_SESSION['usuario']){  
    header('Location: telaProfessor.php');
    exit();
    }
  }


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

  <title>Login do professor</title>

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
            <a class="nav-link text-primary" href="loginProf.php">Acesso Professor</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="confirmaPagamento.php">Pagamento</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="historico.html">Histórico</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="sobre.html">Sobre</a>
          </li>

        </ul>

      </div>

    </nav>
    <!--Form de Login-->
    <div class="container text-center mx-auto pt-3 pr-5 pl-5" cz-shortcut-listen="true">
      <form class="form-signin" action="login.php" method="POST">
        <h1 class="h3 mb-3 font-weight-normal mt-5 mb-4">Faça login</h1>
        <label for="inputUser" class="sr-only">Usuário</label>
        <input type="text" name="usuario" class="form-control mb-2 col-md-4 offset-md-4" id="inputUser" placeholder="Usuario">

        <label for="inputSenha" class="sr-only">Senha</label>
        <input type="password" name="senha" class="form-control col-md-4 offset-md-4" id="inputSenha" placeholder="Senha">

        <button class="btn btn-lg btn-primary btn-block col-md-2 offset-md-5 mt-2" type="submit">Login</button>
      </form>
    </div>

  </div>



  <!--Scripts JavaScrip necessarios para o funcionamento-->
  <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
  <script type="text/javascript" src="js/popper.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>

</body>

</html>