<?php
$f = $_POST['usuwane'];
 unlink($f);
 header('Location: displayUploaded.php');
?>