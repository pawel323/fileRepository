<body>
<div class="container">
<div class="row align-items-center">
<div class="col-sm-6 offset-sm-3">
<form method="POST" action="changePassword.php">
<div class="mb-3">
<h3 style="text-align:center">Zmień hasło</h3>
<label for="login">Aktualne hasło</label>
    
    <input type="password" class="form-control" name="oldPass"/>
    <?php
    if (isset($_SESSION['bladStaregoHasla'])){
      echo $_SESSION['bladStaregoHasla'];
      unset($_SESSION['bladStaregoHasla']);
    }
    ?>
    
  </div>
  <div class="mb-3">
  <label for="pass">Nowe hasło</label>
    <input type="password" class="form-control" name="newPass"/>
    
  </div>
  
  <button type="submit" class="btn btn-secondary">Zmień hasło</button>
  <?php
    if (isset($_SESSION['e_baza'])){
      echo $_SESSION['e_baza'];
      unset($_SESSION['e_baza']);
    }
    ?>
</form>
</div>
</div>
</div>