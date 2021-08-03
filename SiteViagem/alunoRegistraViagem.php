<?php
session_start();
include_once("conexao.php");

//informacoes do aluno que entrara na viagem
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
$rg = filter_input(INPUT_POST, 'rg', FILTER_SANITIZE_STRING);
$idViagem = filter_input(INPUT_POST, 'id_Viagem', FILTER_SANITIZE_STRING);



$query = "INSERT INTO participa (nomeAluno,rgAluno,cpfAluno,idViagem,pagamento) VALUES ('$nome','$rg','$cpf','$idViagem','Pagar')"; //Quando aluno se registrar na viagem VER COM EDUARDO


$result = mysqli_query($conexao, $query);

if (mysqli_insert_id($conexao)) {
    $_SESSION['msg'] = "<p style='color: green;'>Fomrulario enviado com sucesso!</p>";
    header('Location: index.php');
} else {
    $_SESSION['msg'] = "<p style='color: red;'>Erro ao enviar formulario!</p>";
    header('Location: index.php');
}
