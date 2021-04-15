<body>
<div class="container">
<div class="row">
<?php
$files = "img/";
$images = glob($files."*.png");
foreach($images as $image){
    echo '<div class="col-sm-5 offset-sm-1">';
    echo '<img src="'.$image.'" height=200px width=300px/>';
    echo '</div>';
}
?>
</div>
</div>