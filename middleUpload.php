<body>
<div class="container">
<div class="row align-items-center">
<div class="col-sm-6 offset-sm-3">
<form method="POST" action="upload.php" enctype="multipart/form-data">
  <div class="mb-3">
    <h3>Wyślij zdjęcia</h3>
    <h5>Dopuszczane rozszerzenie .png</h5>
    
    <input type="file" class="custom-file-input" name="image[]" multiple="">
    
  </div>
  
  <button type="submit" class="btn btn-secondary">Wyślij</button>
</form>
<?php
if(isset($_SESSION['bladRozszerzenia'])){
  echo $_SESSION['bladRozszerzenia'];
  unset($_SESSION['bladRozszerzenia']);
}
?>
<?php
if(isset($_SESSION['bladRozmiaru'])){
  echo $_SESSION['bladRozmiaru'];
  unset($_SESSION['bladRozmiaru']);
}
?>
</div>
</div>
</div>