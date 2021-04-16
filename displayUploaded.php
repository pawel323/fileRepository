<?php
if (file_exists('header.php')) include ('header.php');
if(isset($_SESSION['zalogowany'])){
  if (file_exists('middleDisplay.php')) include ('middleDisplay.php');  
}
else{
    header('Location: index.php');
}
if (file_exists('footer.php')) include ('footer.php');
?>