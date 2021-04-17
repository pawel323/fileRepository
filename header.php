<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="main.css">
    
    <title>Repozytorium zdjęć</title>
</head>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">REPOZYTORIUM ZDJĘĆ</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nawigacja" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="nawigacja">
      <ul class="navbar-nav ">
        <li class="nav-item">
          <a class="nav-link" href="uploadPage.php">Dodaj zdjęcia</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="displayUploaded.php">Pobierz zdjęcia</a>
        </li>
        <?php
        if(isset($_SESSION['zalogowany'])){
          echo  '<li class="nav-item"><a class="nav-link" href="manageProfil.php">Profil</a></li>';
          echo  '<li class="nav-item"><a class="nav-link" href="logout.php">Wyloguj się</a></li>';
        }
        else{
          echo '<li class="nav-item"><a class="nav-link" href="register.php">Zarejestruj się</a></li>';
        }
        ?>
        
       
      </ul>
    </div>
  </div>
</nav>