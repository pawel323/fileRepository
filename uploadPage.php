<?php
if (file_exists('header.php')) include ('header.php');
if (file_exists('middleUpload.php')) include ('middleUpload.php');
if(isset($_SESSION['zalogowany'])){
    if (file_exists('middleUpload.php')) include ('middleUpload.php');  
  }
  else{
      header('Location: index.php');
  }
if (file_exists('footer.php')) include ('footer.php');
?>