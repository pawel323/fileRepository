<?php
session_start();
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
            header('Location: rejestracja.php');
        }
        else{
            $rezultat = mysqli_query($polaczenie, sprintf("SELECT * FROM uzytkownicy WHERE login='%s'", mysqli_real_escape_string($polaczenie,$login)));

			if (!$rezultat) throw new Exception($polaczenie->error);

			$ile_wierszy = mysqli_num_rows($rezultat);

            if($ile_wierszy > 0){
                $_SESSION['bladRejestracji'] = "<div>Podaj inny login i hasło</div>";
                header('Location: rejestracja.php');
            }
            else{
                if ($polaczenie->query("INSERT INTO uzytkownicy VALUES (NULL, '$login', '$haslo_hash', '1')")){
                    $folderPath = 'img'.'/'.$login;
                    if (!file_exists($folderPath)) {
                    mkdir($folderPath, 0777, true);
                    }
                    header('Location: index.php');
				
			    } 
            }

            
        }
        $polaczenie->close();
}
?>