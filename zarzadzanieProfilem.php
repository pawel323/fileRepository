<?php
session_start();
if($_SESSION['uprawnienia']==0){
    if (file_exists('adminNav.php')) include ('adminNav.php'); 
}
else{
    if (file_exists('header.php')) include ('header.php'); 
}
if (file_exists('middleManage.php')) include ('middleManage.php');  
if (file_exists('footer.php')) include ('footer.php');
?>