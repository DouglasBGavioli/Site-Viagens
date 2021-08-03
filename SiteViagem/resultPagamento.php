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

    <title>Pagamentos</title>

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
        <?php
        $select = filter_input(INPUT_POST, 'pagamento_upload', FILTER_SANITIZE_STRING);

        $result_aluno = "SELECT * FROM participa WHERE idViagem = $select"; //Selecionar o nome dos alunos correspondentes a viagem selecionada
        $resultado_aluno = mysqli_query($conexao, $result_aluno);

        $titul_viagem = "SELECT titulo FROM viagem WHERE idViagem = $select";
        $titulo_viagem = mysqli_query($conexao,$titul_viagem);

        $row_titulo = mysqli_fetch_assoc($titulo_viagem)

        ?>
  
        <h1 class="text-md-center "><?php echo $row_titulo['titulo'] ?></h1>
        <div class="input-group input-group-sm  col-sm-9">
            <button type="button" class="btn btn-outline-secondary mt-2" value="Imprimir" onclick="print()">Imprimir</button>
        </div>

        <table class="table table-dark mt-2" value = "Tabela">
        
            <thead> 
                <tr>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Confirmação</th>
                </tr>
            </thead>

            <tbody>
                <?php
                if (($resultado_aluno) && ($resultado_aluno->num_rows != 0)) {
                    while ($row_aluno = mysqli_fetch_assoc($resultado_aluno)) {
                ?>
                        <tr>

                            <td><?php echo $row_aluno['nomeAluno']; ?></td>
                            <td><?php echo $row_aluno['cpfAluno']; ?></td>
                            <td>
                                <div>
                                    <form method="POST" action="formpagamento.php" class="btn-group btn-group-toggle btn-block">

                                        <label class="btn btn-secondary col-sm-3 ">
                                            <input type="submit" name="pago" value="<?php echo $row_aluno['pagamento'] ?>">
                                            <input type="hidden" name="idParticipa" value="<?php echo $row_aluno['id'] ?>">
                                        </label>

                                    </form>
                                </div>
                            </td>
                        </tr>

                <?php
                    }
                } else {
                    echo "nenhum usuario encontrado";
                }
                ?>
            </tbody>
        </table>


        <!--Scripts JavaScrip necessarios para o funcionamento-->
        <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
        <script type="text/javascript" src="js/popper.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>

</body>

</html>