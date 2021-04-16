<?php
if((isset($_POST['login'])) && (isset($_POST['pass']))){
        $login = $_POST['login'];
        $haslo = $_POST['pass'];

        $login = htmlentities($login, ENT_QUOTES, "UTF-8");
		$haslo = htmlentities($haslo, ENT_QUOTES, "UTF-8");
        $haslo_hash = password_hash($haslo, PASSWORD_DEFAULT);

        require_once "connect.php";
        $polaczenie = new mysqli($host, $db_user, $db_password, $db_name);

        if($polaczenie->connect_errno!=0)
        {
            $_SESSION['e_baza'] = "Błąd łączenia z bazą danych";
            header('Location: dodaniePracownika.php');
        }
        else{
            if ($polaczenie->query("INSERT INTO uzytkownicy VALUES (NULL, '$login', '$haslo_hash', '1')"))
			{
				mkdir('img/'$login'');
                header('Location: index.php');
				
			}
        }
        $polaczenie->close();
}
?>