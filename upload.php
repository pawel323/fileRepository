<?php
session_start();
if(isset($_FILES['image']))
{
     $file_name = $_FILES['image']['name'];
     $file_size =$_FILES['image']['size'];
     $file_tmp =$_FILES['image']['tmp_name']; 
     $file_type=$_FILES['image']['type'];
     $extensions= array("png", "jpeg", "jpg", "pdf", "txt", "docx"); 
     $validate_ok = true;
    foreach($file_name as $key => $value)
    { 
         $tmp = explode('.',$_FILES['image']['name'][$key]);
         $file_ext = strtolower(end($tmp));
         $searchingFile = "img/".$_SESSION['user'].'/'.$file_name[$key];
         if(!in_array($file_ext,$extensions))
         {
             $validate_ok = false;
             $_SESSION['bladRozszerzenia'] = '<div>Rozszerzenie niedozwolone</div>';
             header('Location: wysylaniePlikow.php');
         } 
         if($file_size[$key] > 5000000)
         {
            $validate_ok = false;
            $_SESSION['bladRozmiaru'] = 'Rozmiar pliku nie może być większy niż 5MB. ';
            header('Location: wysylaniePlikow.php');
         } 
         if(file_exists($searchingFile)){
            $validate_ok = false;
            $_SESSION['blad'] = 'Plik już istnieje';
            header('Location: wysylaniePlikow.php');
         }
     }  
     if ($validate_ok === true)
     {        
         foreach($file_name as $key => $value)
         { 
             move_uploaded_file($file_tmp[$key],"img/".$_SESSION['user'].'/'.$file_name[$key]);
             header('Location: wysylaniePlikow.php');
         } 
     }
    
}
?>