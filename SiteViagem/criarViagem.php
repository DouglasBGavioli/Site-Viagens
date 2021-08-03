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

  <title>Criar viagem</title>

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

    <div class="container">

      <div class="container py-3 col-md-10 inline-block">
        <div class="title h1 text-center">Cadastrar viagem</div>
        <!-- Card Start -->
        <?php
        if (isset($_SESSION['msg'])) {
          echo $_SESSION['msg'];
          unset($_SESSION['msg']);
        }
        ?>

        <form class="card" action="formViagem.php" method="POST"  enctype="multipart/form-data">
          <div class="row ">

            <div class="col-md-7 px-4">
              <div class="card-block px-6">

                <dl class="row">
                  <div class="input-group input-group-sm mb-3 col-sm-9 mt-2">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="inputGroup-sizing-sm">Titulo da viagem:</span>
                    </div>
                    <input type="text" name="titulo" class="form-control" aria-label="Sizing example input " required aria-describedby="inputGroup-sizing-sm">
                  </div>
                  <div class="input-group input-group-sm mb-3 col-sm-9">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="inputGroup-sizing-sm">Tipo de transporte:</span>
                    </div>
                    <input type="text" name="transporte" class="form-control" aria-label="Sizing example input" required aria-describedby="inputGroup-sizing-sm">
                  </div>

                  <div class="input-group input-group-sm mb-3 col-sm-9">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="inputGroup-sizing-sm">Empresa contratada:</span>
                    </div>
                    <input type="text" name="empresa" class="form-control" aria-label="Sizing example input" required aria-describedby="inputGroup-sizing-sm">
                  </div>

                  <div class="input-group input-group-sm mb-3 col-sm-9">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="inputGroup-sizing-sm">Capacidade:</span>
                    </div>
                    <input type="text" name="capacidadeBus" class="form-control" aria-label="Sizing example input" required aria-describedby="inputGroup-sizing-sm">
                  </div>

                  <div class="input-group input-group-sm mb-3 col-sm-9">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="inputGroup-sizing-sm">Destino:</span>
                    </div>
                    <input type="text" name="destino" class="form-control" aria-label="Sizing example input" required aria-describedby="inputGroup-sizing-sm">
                  </div>

                  <div class="input-group input-group-sm mb-3 col-sm-9">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="inputGroup-sizing-sm">Distância:</span>
                    </div>
                    <input type="text" name="distancia" class="form-control" aria-label="Sizing example input" required aria-describedby="inputGroup-sizing-sm">
                  </div>

                  <div class="input-group input-group-sm mb-3 col-sm-9">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="inputGroup-sizing-sm">Professor responsavel:</span>
                    </div>
                    <input type="text" name="professor" class="form-control" aria-label="Sizing example input" required aria-describedby="inputGroup-sizing-sm">
                  </div>

                  <div class="input-group input-group-sm mb-3 col-sm-9">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="inputGroup-sizing-sm">Valor da viagem R$:</span>
                    </div>
                    <input type="text" name="valor" class="form-control" aria-label="Sizing example input" required aria-describedby="inputGroup-sizing-sm">
                  </div>

                  <div class="input-group input-group-sm mb-3 col-sm-9">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="inputGroup-sizing-sm">Data da viagem:</span>
                    </div>
                    <input type="date" name="data" class="form-control" aria-label="Sizing example input" required aria-describedby="inputGroup-sizing-sm">
                  </div>

                  <div class="input-group input-group-sm  col-sm-9">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="inputGroup-sizing-sm">Descrição:</span>
                    </div>
                    <input type="text" name="descricao" class="form-control" aria-label="Sizing example input" required aria-describedby="inputGroup-sizing-sm">
                  </div>
                  <div class="input-group input-group-sm  col-sm-9">
                    <h5 class="card-title mt-2">Foto referente a viagem</h5>
                    <img src="assets/exemplos/plus.png" class="card-img-top" alt="">

                      Arquivo: <input type="file" required name="arquivo">

                  </div>

              </div>



              <button type="submit" class="btn btn-primary mt-2 mb-2 col-md-4">Enviar</button>
            </div>

        </form>

      </div>
    </div>

  </div>

  <!--Scripts JavaScrip necessarios para o funcionamento-->
  <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
  <script type="text/javascript" src="js/popper.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>

</body>

</html>