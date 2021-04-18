<?php
session_start();
if(isset($_POST['pass'])){
    $haslo = $_POST['pass'];
    $userId = $_POST['userId'];
    $haslo = htmlentities($haslo, ENT_QUOTES, "UTF-8");
    $haslo_hash = password_hash($haslo, PASSWORD_DEFAULT);
    require_once "connect.php";
        $polaczenie = new mysqli($host, $db_user, $db_password, $db_name);

        if($polaczenie->connect_errno!=0)
        {
            $_SESSION['e_baza'] = "Błąd łączenia z bazą danych";
            header('Location: listaUzytkownikow.php');
        }
        else{
            $polaczenie->query("UPDATE uzytkownicy SET haslo='$haslo_hash' WHERE id='$userId'");
            unset($_SESSION['e_haslo']);
            header('Location: listaUzytkownikow.php');

        }
}
else{
    $_SESSION['e_haslo'] = "<div>Podaj nowe hasło</div>";
}
?>