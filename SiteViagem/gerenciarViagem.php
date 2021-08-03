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

  <title>Tela inicial</title>

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
    <!--Divisao dos primeiros 3 card-->
    <?php
    $result_viagens = "SELECT * FROM viagem";
    $resultado_viagens = mysqli_query($conexao, $result_viagens);
    ?>


    <div class="row my-4">
      <?php // Abrindo o while para reproduzir o codigo das cards correspondente ao numero de viagens que ocorrem no banco
      while ($rows_viagens = mysqli_fetch_assoc($resultado_viagens)) {
        $id = $rows_viagens['idViagem'];
        $result_imagem = "SELECT * FROM arquivo, viagem WHERE codigo = $id";
        $resultado_imagem = mysqli_query($conexao, $result_imagem);
        $rows_imagem = mysqli_fetch_assoc($resultado_imagem);

        //Transforma data para o padrao brasileiro.
        $data_timestemp = strtotime($rows_viagens['dataViagem']);
        $data_br = date("d/m/Y",$data_timestemp);

      ?>
        <div class="col-sm-12 col-md-4 mb-4">
          <div class="card">
            <!--Ajusta o tamanho da imagem do card-->
          <style type="text/css">
            .viag{
              max-width: 100%;
              width: 350px;
              height: 232px;
              object-fit: cover;
              object-position: bottom right;
            }
          </style>
            <img class="viag" src="./upload/<?php echo $rows_imagem['arqui']; ?>" alt="Imagem do Card">
            <div class="card-body text-center">
              <h4 class="card-title"><?php echo $rows_viagens['titulo']; ?> </h4>
              <p class="card-text">Viagem acontecerá no dia <?php echo $data_br ?></p>
              <a href="formGerenciarViagem.php?id_Viagem=<?php echo $rows_viagens['idViagem']; ?>
              " class="btn btn-primary">EXCLUIR </a><!-- id_da_Viagem recebe o id_viagem-->

            </div>
          </div>
        </div>
      <?php } ?>
      <!--Fechando o while-->
    </div>


    <!--Divisão dos outros tres-->
    <div class="row">

    </div>

  </div>
  <!--Scripts JavaScrip necessarios para o funcionamento-->
  <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
  <script type="text/javascript" src="js/popper.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>

</body>

</html>