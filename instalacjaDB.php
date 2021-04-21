<?php
if(isset($_POST['name'])){
$h = $_POST['host'];
$u = $_POST['user'];
$p = $_POST['pass'];
$n = $_POST['name'];


$myfile = fopen("connect.php", "w");
$txt1 = "<?php\n";
fwrite($myfile, $txt1);
$txt2 = "$".'host = "'.$h.'"'.';'."\n";
fwrite($myfile, $txt2);
$txt3 = "$".'db_user = "'.$u.'"'.';'."\n";
fwrite($myfile, $txt3);
$txt4 = "$".'db_password = "'.$p.'"'.';'."\n";
fwrite($myfile, $txt4);
$txt5 = "$".'db_name = "'.$n.'"'.';'."\n";
fwrite($myfile, $txt5);
$txt6 = "?>";
fwrite($myfile, $txt6);
fclose($myfile);





   require_once "connect.php";
   $polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
   if($polaczenie->connect_errno!=0)
   {
        
      header('Location: alert.php');
            
   }
   else{
      if ($polaczenie->query("CREATE TABLE uzytkownicy (id INT AUTO_INCREMENT PRIMARY KEY, login TEXT NOT NULL, haslo TEXT NOT NULL, uprawnienia INT NOT NULL) "))
		{   
         unlink('installer.php');
         unlink('instalacjaDB.php');
         header('Location: index.php'); 
      }
   }
        $polaczenie->close();


 
}

?>