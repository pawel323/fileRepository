<?php
$f = $_POST['usuwane'];
 unlink($f);
 switch($_SESSION['uprawnienia']){
    case 0:
        header('Location: wyswietlaniePlikowAdmin.php');
    case 1:
        header('Location: wyswietlaniePlikow.php');
 }
?>