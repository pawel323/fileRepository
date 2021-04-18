<?php
session_start();
if (file_exists('header.php')) include ('header.php');
if(isset($_SESSION['zalogowany'])){
  if (file_exists('middleDisplay.php')) include ('middleDisplay.php');  
}
else{
  echo '<h3 style="text-align:center">Tylko dla zalogowanych użytkowników</h3></div><br/>';
  if (file_exists('middleLogin.php')) include ('middleLogin.php');
}
if (file_exists('footer.php')) include ('footer.php');
?>