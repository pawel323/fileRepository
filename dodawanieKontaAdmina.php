<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="main.css">
    
    <title>Repozytorium plików</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">REPOZYTORIUM</a>
    
    </div>
  </div>
</nav>
<div class="container">
<div class="row align-items-center">
<div class="col-sm-6 offset-sm-3">
<h3 style="text-align:center">Witaj w instalatorze</h3>
<h5 style="text-align:center">Podaj informacje dotyczące konta administratora</h5>
<form method="POST" action="registrationAdmin.php">
  <div class="mb-3">
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
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>