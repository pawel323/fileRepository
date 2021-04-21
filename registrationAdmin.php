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
            header('Location: alert.php');
        }
        else{
            if ($polaczenie->query("INSERT INTO uzytkownicy VALUES (NULL, '$login', '$haslo_hash', '0')"))
			{
                unlink('index.php');
                $myfile = fopen("index.php", "w");
                $txt1 = "<?php\n";
                fwrite($myfile, $txt1);
                $txt2 = "session_start();\n";
                fwrite($myfile, $txt2);
                $txt3 = "if(isset(".'$_SESSION["zalogowany"]'.")){\n";
                fwrite($myfile, $txt3);
                $txt4 = "switch (".'$_SESSION["uprawnienia"]'."){\n";
                fwrite($myfile, $txt4);
                $txt5 = "case 0:\n";
                fwrite($myfile, $txt5);
                $txt6 = "header('Location: listaUzytkownikow.php');\n";
                fwrite($myfile, $txt6);
                $txt7 = "break;\n";
                fwrite($myfile, $txt7);
                $txt8 = "case 1:\n";
                fwrite($myfile, $txt8);
                $txt9 = "header('Location: wysylaniePlikow.php');\n";
                fwrite($myfile, $txt9);
                $txt10 = "break;\n";
                fwrite($myfile, $txt10);
                $txt11 = "}\n";
                fwrite($myfile, $txt11);
                $txt12 = "}\n";
                fwrite($myfile, $txt12);
                $txt13 = "else{\n";
                fwrite($myfile, $txt13);
                $txt14 = "if (file_exists('header.php')) include ('header.php');\n";
                fwrite($myfile, $txt14);
                $txt15 = "if (file_exists('middleLogin.php')) include ('middleLogin.php');\n";
                fwrite($myfile, $txt15);
                $txt16 = "if (file_exists('footer.php')) include ('footer.php');\n";
                fwrite($myfile, $txt16);
                $txt17 = "}\n";
                fwrite($myfile, $txt17);
                $txt18 = "?>";
                fwrite($myfile, $txt18);
                
                fclose($myfile);
                unlink('alert.php');
                unlink('dodawanieKontaAdmina.php');
                unlink('registrationAdmin.php');
                header('Location: index.php');
				
			}
        }
        $polaczenie->close();
}
?>