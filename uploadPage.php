<?php
session_start();
if (file_exists('header.php')) include ('header.php');
if(isset($_SESSION['zalogowany'])){
$maxSize = 0;
$files = 'img'.'/'.$_SESSION['user'].'/';
$images = glob($files."*.jpg");
foreach($images as $image){
    $maxSize += filesize($image);
}
$maxSize = $maxSize / 1048576;
$maxSize = number_format($maxSize, 2, '.', '');
if ($maxSize < 100){
  if (file_exists('middleUpload.php')) include ('middleUpload.php');  
}
else{
  if (file_exists('infoLimit.php')) include ('infoLimit.php');  
}  
}
else{
  echo '<h3 style="text-align:center">Tylko dla zalogowanych użytkowników</h3></div><br/>';
  if (file_exists('middle.php')) include ('middle.php');
}
if (file_exists('footer.php')) include ('footer.php');
?>