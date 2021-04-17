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
foreach($jpg as $image){
    echo '<div class="col-sm-5 offset-sm-1">';
    echo '<embed src="'.$image.'" height=200px width=300px/>';
    echo '</div>'; 
}
foreach($jpeg as $image){
    echo '<div class="col-sm-5 offset-sm-1">';
    echo '<embed src="'.$image.'" height=200px width=300px/>';
    echo '</div>'; 
}
foreach($png as $image){
    echo '<div class="col-sm-5 offset-sm-1">';
    echo '<embed src="'.$image.'" height=200 width=300/>';
    echo '</div>'; 
}
foreach($pdf as $image){
    echo '<div class="col-sm-5 offset-sm-1">';
    echo '<embed src="'.$image.'" height=200px width=300px/>';
    echo '</div>'; 
}
foreach($txt as $image){
    echo '<div class="col-sm-5 offset-sm-1">';
    echo '<embed src="'.$image.'" height=200px width=300px/>';
    echo '</div>'; 
}
foreach($docx as $image){
    echo '<div class="col-sm-5 offset-sm-1">';
    echo '<embed src="'.$image.'" height=200 width=300/>';
    echo '</div>'; 
}
?>
</div>
</div>