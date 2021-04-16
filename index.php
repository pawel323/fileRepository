<?php
session_start();
if(isset($_SESSION['zalogowany'])){
    header('Location: uploadPage.php');
}
if (file_exists('header.php')) include ('header.php');
if (file_exists('middle.php')) include ('middle.php');
if (file_exists('footer.php')) include ('footer.php');
?>