<?php
session_start();

    
    $userId = $_POST['userId'];
    $userLogin = $_POST['userLogin'];
    require_once "connect.php";
        $polaczenie = new mysqli($host, $db_user, $db_password, $db_name);

        if($polaczenie->connect_errno!=0)
        {
            $_SESSION['e_baza'] = "Błąd łączenia z bazą danych";
            header('Location: administration.php');
        }
        else{
            $polaczenie->query("DELETE FROM uzytkownicy WHERE id='$userId'");
            delete_files('img'.'/'.$userLogin);
            header('Location: administration.php');

        }


        function delete_files($target) {
            if(is_dir($target)){
                $files = glob( $target . '*', GLOB_MARK ); 
        
                foreach( $files as $file ){
                    delete_files( $file );      
                }
        
                rmdir( $target );
            } elseif(is_file($target)) {
                unlink( $target );  
            }
        }

?>