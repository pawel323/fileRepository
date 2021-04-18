<?php
session_start();
if((isset($_POST['oldPass'])) && (isset($_POST['newPass']))){
        $noweHaslo = $_POST['newPass'];
        $stareHaslo = $_POST['oldPass'];
        $login = $_SESSION['user'];
        $id = $_SESSION['id'];

        $noweHaslo = htmlentities($noweHaslo, ENT_QUOTES, "UTF-8");
		$stareHaslo = htmlentities($stareHaslo, ENT_QUOTES, "UTF-8");
        $stareHaslo_hash = password_hash($stareHaslo, PASSWORD_DEFAULT);
        $noweHaslo_hash = password_hash($noweHaslo, PASSWORD_DEFAULT);

        require_once "connect.php";
        $polaczenie = new mysqli($host, $db_user, $db_password, $db_name);

        if($polaczenie->connect_errno!=0)
        {
            $_SESSION['e_baza'] = "Błąd łączenia z bazą danych";
            header('Location: manageProfil.php');
        }
        else{
            $rezultat = mysqli_query($polaczenie, sprintf("SELECT * FROM uzytkownicy WHERE login='%s'", mysqli_real_escape_string($polaczenie,$login)));

            if (!$rezultat) throw new Exception($polaczenie->error);

            $ile_wierszy = mysqli_num_rows($rezultat);
				if($ile_wierszy > 0){
					$wiersz =  $rezultat->fetch_assoc();
					if (password_verify($stareHaslo, $wiersz['haslo'])){
						$polaczenie->query("UPDATE uzytkownicy SET haslo='$noweHaslo_hash' WHERE id='$id'");
                        header('Location: zarzadzanieProfilem.php');
					}
					else{
						$_SESSION['bladStaregoHasla'] = 'Nieprawidłowe hasło!';
						header('Location: zarzadzanieProfilem.php');
					}
				}
				
        }
        $polaczenie->close();
}
?>