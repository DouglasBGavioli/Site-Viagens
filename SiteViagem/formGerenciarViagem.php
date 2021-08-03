<?php
session_start();
include_once("conexao.php");

$id_Viagem = $_GET['id_Viagem'];

$result_excluir = "DELETE FROM viagem WHERE idViagem='$id_Viagem'";


$resultado_excluir = mysqli_query($conexao, $result_excluir);

header('Location: gerenciarViagem.php');
