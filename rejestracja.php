<?php
session_start();
if(isset($_SESSION['zalogowany'])){
  switch ($_SESSION['uprawnienia']){
    case 0:
        header('Location: listaUzytkownikow.php');
        break;
    case 1:
        header('Location: wysylaniePlikow.php');
        break;
  }
}
else{
  if (file_exists('header.php')) include ('header.php');
  if (file_exists('middleRegister.php')) include ('middleRegister.php'); 
  if (file_exists('footer.php')) include ('footer.php');
}

?>