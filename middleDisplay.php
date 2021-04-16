<body>
<div class="container">
<div class="row">
<?php
$maxSize = 0;
$files = 'img'.'/'.$_SESSION['user'].'/';
$images = glob($files."*.png");
foreach($images as $image){
    $maxSize += filesize($image);
}
$maxSize = $maxSize / 1048576;
$maxSize = number_format($maxSize, 2, '.', '');
$_SESSION['rozmiar'] = '<h3 style="text-align:center">Rozmiar katalogu to: '.$maxSize." MB</h3>";
if(isset($_SESSION['rozmiar'])){
    echo $_SESSION['rozmiar'];
}
foreach($images as $image){
    echo '<div class="col-sm-5 offset-sm-1">';
    echo '<img src="'.$image.'" height=200px width=300px/>';
    echo '</div>';
 
}

?>
</div>
</div>