<?php
if (file_exists('header.php')) include ('header.php');
if (file_exists('middleUpload.php')) include ('middleUpload.php');
if(isset($_SESSION['zalogowany'])){
   header('Location: uploadPage.php');
  }
  else{
    if (file_exists('middleRegister.php')) include ('middleRegister.php'); 
  }
if (file_exists('footer.php')) include ('footer.php');
?>