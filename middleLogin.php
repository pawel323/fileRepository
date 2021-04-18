<body>
<div class="container">
<div class="row align-items-center">
<div class="col-sm-6 offset-sm-3">
<form method="POST" action="login.php">
  <div class="mb-3">
    <h3 style="text-align:center">Zaloguj się</h3>
    <label for="login">Login</label>
    
    <input type="text" class="form-control" name="login"/>
    <?php
    if (isset($_SESSION['bladLogowania'])){
      echo $_SESSION['bladLogowania'];
      
    }
    ?>
    
  </div>
  <div class="mb-3">
  <label for="pass">Hasło</label>
    <input type="password" class="form-control" name="pass"/>
    <?php
    if (isset($_SESSION['bladLogowania'])){
      echo $_SESSION['bladLogowania'];
      unset($_SESSION['bladLogowania']);
    }
    ?>
  </div>
  
  <button type="submit" class="btn btn-secondary">Zaloguj</button>
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