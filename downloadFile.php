<?php
$f = $_POST['pobierane'];
header('Content-Type: application/octet-stream');
header("Content-Transfer-Encoding: Binary"); 
header ("Content-Disposition: attachment; filename=".$f); 
readfile($f);
header('Location: displayUploaded.php');
?>