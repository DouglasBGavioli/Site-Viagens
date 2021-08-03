<?php
session_start();
session_destroy();
header('Location: loginProf.php');
exit();
?>