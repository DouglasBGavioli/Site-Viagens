<?php
session_start();
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

  <title>Tela da viagem</title>

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
            <a class="nav-link text-light" href="loginProf.php">Acesso Professor</a>
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

    <div class="container">

      <div class="container py-3">
        <div class="title h1 text-center text-light"></div>
        <!-- Card Start -->
        <div class="card">
          <div class="row ">

            <div class="col-md-7 px-4">
              <div class="card-block px-6">
                <?php

                $id_Viagem = $_GET['id_Viagem'];
                $result_viagem = "SELECT * FROM viagem WHERE idViagem='$id_Viagem'";
                $resultado_viagem = mysqli_query($conexao, $result_viagem);

                if (isset($_SESSION['msg'])) {
                  echo $_SESSION['msg'];
                  unset($_SESSION['msg']);
                }

                while ($row_viagem = mysqli_fetch_assoc($resultado_viagem)) {
                ?>
                  <div class="title h1 text-center text"><?php echo "" . $row_viagem['titulo'] . "<br>"; ?> </div>
                <?php
                  //Converte a data pra brasileira
                  $data_timestemp = strtotime($row_viagem['dataViagem']);
                  $data_br = date("d/m/Y", $data_timestemp);

                  echo "Viagem para " . $row_viagem['titulo'] . "<br>";
                  echo "Local: " . $row_viagem['localViagem'] . "<br>";
                  echo "Data: " . $data_br . "<br>";
                  echo "Valor: " . $row_viagem['valorViagem'] . "<br>";
                  echo "Distância: " . $row_viagem['distanciaViagem'] . "<br>";
                  echo "Transporte: " . $row_viagem['tipoTransporte'] . "<br>";
                  echo "Empresa: " . $row_viagem['empresa'] . "<br>";
                  echo "Total de lugares: " . $row_viagem['capacidadeBus'] . "<br>";
                  echo "Professor Responsavel: " . $row_viagem['titulo'] . "<br>";
                  echo "Descrição: " . $row_viagem['descricaoViagem'] . "<br>";
                }
                ?>

                <button type="button" class="btn btn-md btn-primary btn-block mb-2 mt-3 col-md-4 offset-md-2" data-toggle="modal" data-target="#myModal">Registrar-se na viagem</button>
                <!-- Modal -->
                <div id="myModal" class="modal fade" role="dialog">
                  <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Registro de viagem</h4>
                      </div>
                      <div class="modal-body">
                        <form action="alunoRegistraViagem.php" method="POST">
                          <div class="form-row ml-1">
                            <label for="inputText">Nome completo</label>
                            <input type="text" class="form-control" name="nome" id="inputText" placeholder="Nome" required>


                            <label for="inputEmail">CPF</label>
                            <input type="text" class="form-control" name="cpf" id="inputCPF" placeholder="CPF" minlength="11" maxlength="11" required>

                          </div>
                          <div class="form-row ml-1">
                            <label for="inputRg">RG</label>
                            <input type="text" class="form-control" name="rg" id="inputRg" placeholder="Digite apenas numeros" minlength="10" maxlength="10" required>
                            <input type="hidden" name="id_Viagem" value="<?php echo $_GET['id_Viagem'] ?>">
                          </div>
                          <button type="submit" class="btn btn-primary col-md-4 offset-md-4 mt-3">Registrar-se</button>
                        </form>

                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>

            <?php // Abrindo o while para reproduzir o codigo das cards correspondente ao numero de viagens que ocorrem no banco

            $result_imagem = "SELECT * FROM arquivo WHERE codigo = $id_Viagem";
            $resultado_imagem = mysqli_query($conexao, $result_imagem);
            $rows_imagem = mysqli_fetch_assoc($resultado_imagem);

            ?>
            <div class="col-sm-12 col-md-4 mb-4">
              <style type="text/css">
                .viag {
                  max-width: 100%;
                  width: 430px;
                  height: 280px;
                  object-fit: cover;
                  object-position: bottom right;
                }
              </style>

              <h4 class="card-title text-center mt-2">Foto do local</h4>
              <img class="viag" src="./upload/<?php echo $rows_imagem['arqui']; ?>" alt="Imagem do Card">
            </div>
            <!--Fechando o while-->


            <!--Scripts JavaScrip necessarios para o funcionamento-->
            <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
            <script type="text/javascript" src="js/popper.min.js"></script>
            <script type="text/javascript" src="js/bootstrap.min.js"></script>

</body>

</html>