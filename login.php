<?php

	session_start();
	
	if ((!isset($_POST['login'])) || (!isset($_POST['pass'])))
	{
		
		header('Location: index.php');
		exit();
	}

	if ((strlen($_POST['login']) > 0) && (strlen($_POST['pass']) > 0)){
		
			$login = $_POST['login'];
			$haslo = $_POST['pass'];

			$login = htmlentities($login, ENT_QUOTES, "UTF-8");
			$haslo = htmlentities($haslo, ENT_QUOTES, "UTF-8");

			require_once "connect.php";
			$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);

			if($polaczenie->connect_errno!=0){

				$_SESSION['e_baza'] = '<div style="color:red">Błąd łączenia z bazą danych</div>';
				header('Location: index.php');
			}
			else{
				$rezultat = mysqli_query($polaczenie, sprintf("SELECT * FROM uzytkownicy WHERE login='%s'", mysqli_real_escape_string($polaczenie,$login)));

				if (!$rezultat) throw new Exception($polaczenie->error);

				$ile_wierszy = mysqli_num_rows($rezultat);
				if($ile_wierszy > 0){
					$wiersz =  $rezultat->fetch_assoc();
					if (password_verify($haslo, $wiersz['haslo'])){
						$_SESSION['zalogowany'] = true;
						$_SESSION['id'] = $wiersz['id'];
						$_SESSION['uprawnienia'] = $wiersz['uprawnienia'];
						$_SESSION['user'] = $login;
						header('Location: uploadPage.php');
						unset($_SESSION['bladLogowania']);
					}
					else{
						$_SESSION['bladLogowania'] = 'Nieprawidłowy login lub hasło!';
						header('Location: index.php');
					}
				}
				else{
					$_SESSION['bladLogowania'] = "Nieprawidłowy login lub hasło!";
					header('Location: index.php');
				}

				mysqli_close($polaczenie);
			}
		
	}
	else{
		$_SESSION['bladLogowania'] = "Podaj login i hasło";
		header('Location: index.php');
	}
	
?>