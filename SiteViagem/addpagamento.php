<!--Tela do site para que o PROFESSOR de um OK nos pagamentos dos alunos ja registrados na viagem respectivo-->
<?php
session_start();
include('verifica_login.php');
include('conexao.php');
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

  <title>Adicinar Pagamento</title>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


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
  <div id="menu" class="container">

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
    <!-- Populando o seletor com informacoes do banco de dados-->
    <div class="container text-center mx-auto pt-3 pr-5 pl-5" cz-shortcut-listen="true">
      <form class="form-signin" method="POST" action="resultPagamento.php">
        <h1 class="h3 mb-3 font-weight-normal mt-5 mb-4">CONFIRMAR PAGAMENTOS</h1>

        <label class="text-light" for="sel1">Lista de viagens</label>
        <select class="form-control mb-4 col-md-4 offset-md-4" id="sel1" name="pagamento_upload">
          <option selected>Selecionar viagem</option>
          <?php
          $result_pagamento = "SELECT * from viagem";
          $resultado_pagamento = mysqli_query($conexao, $result_pagamento);
          while ($row_niveis_acesso = mysqli_fetch_assoc($resultado_pagamento)) { ?>
            <option value="<?php echo $row_niveis_acesso['idViagem']; ?>"><?php echo $row_niveis_acesso['titulo']; ?>
            </option><?php
                    }
                      ?>
        </select>
        <button type="submit" class="btn btn-lg btn-primary btn-block col-md-2 offset-md-5">Verificar</button>
      </form>
    </div>



    <!-- Trigger the modal with a button -->



    <!--Scripts JavaScrip necessarios para o funcionamento-->
    <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="js/popper.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

</body>

</html>