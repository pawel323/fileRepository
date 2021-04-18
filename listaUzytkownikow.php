<?php
session_start();
if(isset($_SESSION['zalogowany'])){
 if (file_exists('adminNav.php')) include ('adminNav.php');   
 if (file_exists('middleAdmin.php')) include ('middleAdmin.php');  
 if (file_exists('footer.php')) include ('footer.php');
}
else{
    header('Location: index.php');
}
?>