<body>
<div class="container">
<div class="row align-items-center">
<div class="col-sm-6 offset-sm-3">
<form method="POST" action="registration.php">
  <div class="mb-3">
    <h3 style="text-align:center">Zarejestruj się</h3>
    <label for="login">Login</label>
    
    <input type="text" class="form-control" name="login"/>
    <?php
    if (isset($_SESSION['bladRejestracji'])){
      echo $_SESSION['bladRejestracji'];
      
    }
    ?>
    
  </div>
  <div class="mb-3">
  <label for="pass">Hasło</label>
    <input type="password" class="form-control" name="pass"/>
    <?php
    if (isset($_SESSION['bladRejestracji'])){
      echo $_SESSION['bladRejestracji'];
      unset($_SESSION['bladRejestracji']);
    }
    ?>
  </div>
  
  <button type="submit" class="btn btn-secondary">Zarejestruj</button>
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