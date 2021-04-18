<?php
session_start();
if (file_exists('header.php')) include ('header.php');
if(isset($_SESSION['zalogowany'])){
$directorySize = 0;
$files = 'img'.'/'.$_SESSION['user'].'/';
$images = glob($files."*.jpg");
foreach($images as $image){
    $directorySize += filesize($image);
}
$images = glob($files."*.jpeg");
foreach($images as $image){
    $directorySize += filesize($image);
}
$images = glob($files."*.png");
foreach($images as $image){
    $directorySize += filesize($image);
}
$images = glob($files."*.pdf");
foreach($images as $image){
    $directorySize += filesize($image);
}
$images = glob($files."*.txt");
foreach($images as $image){
    $directorySize += filesize($image);
}
$images = glob($files."*.docx");
foreach($images as $image){
    $directorySize += filesize($image);
}
$directorySize = $directorySize / 1048576;
$directorySize = number_format($directorySize, 2, '.', '');
if ($directorySize < 100){
  if (file_exists('middleUpload.php')) include ('middleUpload.php');  
}
else{
  if (file_exists('infoLimit.php')) include ('infoLimit.php');  
}  
}
else{
  echo '<h3 style="text-align:center">Tylko dla zalogowanych użytkowników</h3></div><br/>';
  if (file_exists('middleLogin.php')) include ('middleLogin.php');
}
if (file_exists('footer.php')) include ('footer.php');
?>