<?php
session_start();
if(isset($_SESSION['zalogowany'])){
 if (file_exists('adminNav.php')) include ('adminNav.php');   
 if (file_exists('middleDirectories.php')) include ('middleDirectories.php');  
 if (file_exists('footer.php')) include ('footer.php');
}
else{
    header('Location: index.php');
}
?>