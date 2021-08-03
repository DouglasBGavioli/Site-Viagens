<!--Tela do site para que o PROFESSOR de um OK nos pagamentos dos alunos ja registrados na viagem respectivo-->
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
                        <a class="nav-link text-primary" href="index.php">Viagens</a>
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

        <?php
        $cpf = $_POST['CPF'];
        $idViagem = $_POST['idViagem'];

        $result_status = "SELECT pagamento FROM participa  WHERE cpfAluno = '$cpf' and idViagem = $idViagem";

        $resultado_status = mysqli_query($conexao, $result_status);
        $row_status =  mysqli_fetch_assoc($resultado_status);

        if (isset($row_status['pagamento'])) {
            if ($row_status['pagamento'] == 'Pago') {
        ?>
                <div class="modal-header">
                    <h4 class="modal-title">Status do pagamento</h4>
                </div>
                <div class="modal-body">
                    <div id="pagamento-aprovado" class="alert alert-success">
                        <strong>Pagamento aprovado!</strong> Aproveite sua viagem!
                    </div>
                </div>
    </div>
<?php
            } else {
?>
    <div class="modal-header">
        <h4 class="modal-title">Status do pagamento</h4>
    </div>
    <div class="modal-body">
        <div id="pagamento-pendente" class="alert alert-danger">
            <strong>Pagamento pendente!</strong> Seu pagamento ainda não foi efetivado!
        </div>
    </div>
    </div>
<?php
            }
        } else {
?>
<div class="modal-header">
    <h4 class="modal-title">Status do pagamento</h4>
</div>
<div class="modal-body">
    <div id="pagamento-pendente" class="alert alert-danger">
        <strong>Nenhum resultado encontrado para este CPF</strong>
    </div>
</div>
</div>
<?php
        }
?>




<!--Scripts JavaScrip necessarios para o funcionamento-->
<script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="js/popper.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>

</body>

</html>