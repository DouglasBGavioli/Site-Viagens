<?php
session_start();
include_once("conexao.php");

// Informacoes da viagem
$titulo = filter_input(INPUT_POST,'titulo',FILTER_SANITIZE_STRING);
$transporte = filter_input(INPUT_POST,'transporte',FILTER_SANITIZE_STRING);
$empresa = filter_input(INPUT_POST,'empresa',FILTER_SANITIZE_STRING);
$capacidadeBus = filter_input(INPUT_POST,'capacidadeBus',FILTER_SANITIZE_STRING);
$destino = filter_input(INPUT_POST,'destino',FILTER_SANITIZE_STRING);
$distancia = filter_input(INPUT_POST,'distancia',FILTER_SANITIZE_STRING);
$professor = filter_input(INPUT_POST,'professor',FILTER_SANITIZE_STRING);
$valor = filter_input(INPUT_POST,'valor',FILTER_SANITIZE_STRING);
$data = filter_input(INPUT_POST,'data',FILTER_SANITIZE_STRING);
$descricao = filter_input(INPUT_POST,'descricao',FILTER_SANITIZE_STRING);

$query = "INSERT INTO viagem (titulo,tipoTransporte,empresa,capacidadeBus,localViagem,distanciaViagem,professorResponsavel,valorViagem,dataViagem,descricaoViagem) 
         VALUES ('$titulo','$transporte','$empresa','$capacidadeBus','$destino','$distancia','$professor','$valor','$data','$descricao')";

$result = mysqli_query($conexao,$query);

if(mysqli_insert_id($conexao)){
    $_SESSION['msg'] = "<p style='color: green;'>Fomrulario enviado com sucesso!</p>";
    header('Location: criarViagem.php');

}else{
    $_SESSION['msg'] = "<p style='color: red;'>Erro ao enviar formulario!</p>";
    header('Location: criarViagem.php');
}

//UPLOAD DE IMAGEM4
$msg = false;

    if(isset($_FILES['arquivo'])){

        $extensao =  strtolower(substr($_FILES['arquivo']['name'], -4));
        $novo_nome = md5(time()) . $extensao;
        $diretorio = "upload/";

        move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$novo_nome);

        $sql_code = "INSERT INTO arquivo(codigo, arqui, dat) VALUES (null, '$novo_nome', NOW())";

        if(!mysqli_query($conexao,$sql_code)){
            $msg = "Falha ao enviar o arquivo";
            header('Location: criarViagem.php');
        }
        else{
            $msg = "Arquivo enviado com sucesso";
            header('Location: criarViagem.php');
        }
    }

