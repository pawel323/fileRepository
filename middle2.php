<?php
$files = "img/";
$images = glob($files."*.png");
foreach($images as $image){
    echo '<img src="'.$image.'" height=200 width=300/>';
}
?>