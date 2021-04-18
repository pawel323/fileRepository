<body>
<div class="container">
<div class="row">
<?php
$user = $_POST['userLogin'];
$files = 'img'.'/'.$user.'/';
function display($image){
    
    echo '<div class="col-sm-4 ">';
    echo '<embed src="'.$image.'" height=200 width=350/><br/>';
    echo '<form action="downloadFile.php" method="POST"><input type="hidden" value="'.$image.'" name="pobierane"/><button type="submit" class="btn btn-secondary" style="margin-bottom:5px">Pobierz</button></form>'; 
    echo '<form action="deleteFile.php" method="POST"><input type="hidden" value="'.$image.'" name="usuwane"/><button type="submit" class="btn btn-secondary">Usuń</button></form>';
    echo '</div>'; 
}

$jpg = glob($files."*.jpg");
foreach($jpg as $image){
    display($image);
}
$jpeg = glob($files."*.jpeg");
foreach($jpeg as $image){
    display($image);
}
$png = glob($files."*.png");
foreach($png as $image){
    display($image); 
}
$pdf = glob($files."*.pdf");
foreach($pdf as $image){
    display($image); 
}
$txt = glob($files."*.txt");
foreach($txt as $image){
    display($image);
}
$docx = glob($files."*.docx");
foreach($docx as $image){
    display($image); 
}

?>
</div>
</div>