<?php
    include "conexao.php";

    $pago = $_POST['pago'];
    $idParticipa = $_POST['idParticipa'];

    $result_pagamento = "UPDATE participa  SET pagamento = 'Pago' WHERE id = $idParticipa";


    $resultado_pagamento = mysqli_query($conexao,$result_pagamento);

    header('Location: addpagamento.php');
