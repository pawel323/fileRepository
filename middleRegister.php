<body>
<div class="container">
<div class="row align-items-center">
<div class="col-sm-6 offset-sm-3">
<form method="POST" action="registration.php">
  <div class="mb-3">
    <h3>Zarejestruj się</h3>
    <label for="login">Login</label>
    
    <input type="text" class="custom-input" name="login"/>
    <?php
    if (isset($_SESSION['bladRejestracji'])){
      echo $_SESSION['bladRejestracji'];
      
    }
    ?>
    
  </div>
  <div class="mb-3">
  <label for="pass">Hasło</label>
    <input type="password" class="custom-input" name="pass"/>
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