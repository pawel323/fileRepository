<body>
<div class="container">
<div class="row">
<?php
$maxSize = 0;
$files = 'img'.'/'.$_SESSION['user'].'/';
$jpg = glob($files."*.jpg");
foreach($jpg as $image){
    $maxSize += filesize($image);
}
$jpeg = glob($files."*.jpeg");
foreach($jpeg as $image){
    $maxSize += filesize($image);
}
$png = glob($files."*.png");
foreach($png as $image){
    $maxSize += filesize($image);
}
$pdf = glob($files."*.pdf");
foreach($pdf as $image){
    $maxSize += filesize($image);
}
$txt = glob($files."*.txt");
foreach($txt as $image){
    $maxSize += filesize($image);
}
$docx = glob($files."*.docx");
foreach($docx as $image){
    $maxSize += filesize($image);
}
$maxSize = $maxSize / 1048576;
$maxSize = number_format($maxSize, 2, '.', '');
$_SESSION['rozmiar'] = '<h3 style="text-align:center">Zajęte '.$maxSize." MB ze 100MB</h3>";
if(isset($_SESSION['rozmiar'])){
    echo $_SESSION['rozmiar'];
}

function display($image){
    echo '<div class="col-sm-4 ">';
    echo '<embed src="'.$image.'" height=200 width=350/><br/>';
    echo '<a href="'.$image.'" download="'.$image.'" style="text-decoration:none;color:black">Pobierz plik</a>'; 
    echo '<form action="deleteFile.php" method="POST"><input type="hidden" value="'.$image.'" name="usuwane"/><button type="submit" class="btn btn-secondary">Usuń</button></form>';
    echo '</div>'; 
}

foreach($jpg as $image){
    display($image);
}
foreach($jpeg as $image){
    display($image);
}
foreach($png as $image){
    display($image); 
}
foreach($pdf as $image){
    display($image); 
}
foreach($txt as $image){
    display($image);
}
foreach($docx as $image){
    display($image); 
}
?>
</div>
</div>