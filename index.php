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
    if (file_exists('installer.php')){
        header('Location: installer.php');
    }
    if ((!file_exists('installer.php')) && (file_exists('dodawanieKontaAdmina.php'))){
        header('Location: dodawanieKontaAdmina.php');
    }
    else if((!file_exists('installer.php')) && (!file_exists('dodawanieKontaAdmina.php'))){
        
        if (file_exists('header.php')) include ('header.php');
        if (file_exists('middleLogin.php')) include ('middleLogin.php');
        if (file_exists('footer.php')) include ('footer.php');
    }

}

?>