<?php
    define('HOST','127.0.0.1');
    define('USUARIO','root');
    define('SENHA','');
    define('DB','siteviagem');

    $conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Nao foi possivel conectar');
?>