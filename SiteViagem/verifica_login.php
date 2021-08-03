<?php

if(!$_SESSION['usuario']){
    header('Location: loginProf.php');
    exit();
}
?>