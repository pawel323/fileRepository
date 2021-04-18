<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-6 offset-sm-3">
            <?php
            if(isset($_SESSION['e_haslo'])){
                echo $_SESSION['e_haslo'];
            }
            
            if (isset($_SESSION['e_baza'])){
                echo $_SESSION['e_baza'];
                unset($_SESSION['e_baza']);
            }
   
            require_once "connect.php";
            $polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
            if ($polaczenie->connect_errno!=0)
            {
                echo "Error: ".$polaczenie->connect_errno;
            }
            else
            {
                $result = (@$polaczenie->query("SELECT * FROM uzytkownicy WHERE uprawnienia=1"));
                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()) {
                    $userId = $row["id"];
                    $userLogin = $row["login"];
                    $userPass = $row["haslo"];
                    echo '<form method="POST" action="changePasswordAdmin.php">';
                    echo '<input type="hidden" value="'.$userId.'" name="userId"/>';
                    echo '<label for="login">Login</label>';
                    echo '<input type="text" class="form-control" name="login" value="'.$userLogin.'"disabled>';
                    echo '<label for="pass">Hasło</label>';
                    echo '<input type="password" class="form-control" name="pass">';
                    echo '<button type="submit" class="btn btn-secondary" style="margin-top:5px;margin-bottom:5px">Zmień hasło</button>';
                    echo '</form>';
                    echo "<form>";
                    echo '<input type="hidden" value="'.$userId.'" name="userId"/>';
                    echo '<button type="submit" class="btn btn-secondary" style="margin-top:5px;margin-bottom:5px">Usuń użytkownika</button>';
                    echo '</form>';
                    }
                }
                else{
                    $_SESSION['users'] = "<div>Nie ma zarejestrowanych użytkowników</div>";
                }
            }
            $polaczenie->close();
            ?>
            </form>
            </div>
        </div>
    </div>