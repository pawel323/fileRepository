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
            ?>
            <h4 style="text-align:center">Zarejestrowani użytkownicy</h4>

            <?php
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
                    
echo <<< END

<form method="POST" action="changePasswordAdmin.php">
<input type="hidden" value="$userId" name="userId"/>
<label for="login">Login</label>
<input type="text" class="form-control" name="login" value="$userLogin"disabled>
<label for="pass">Hasło</label>
<input type="password" class="form-control" name="pass">
<button type="submit" class="btn btn-secondary" style="margin-top:5px;margin-bottom:5px">Zmień hasło</button>
</form>
<form method="POST" action="deleteUser.php">
<input type="hidden" value="$userId" name="userId"/>
<input type="hidden" value="$userLogin" name="userLogin"/>
<button type="submit" class="btn btn-secondary" style="margin-top:5px;margin-bottom:5px">Usuń użytkownika</button>
</form>
<form method="POST" action="wyswietlaniePlikowAdmin.php">
<input type="hidden" value="$userLogin" name="userLogin"/>
<button type="submit" class="btn btn-secondary" style="margin-top:5px;margin-bottom:5px">Pokaż folder</button>
</form>
<hr style="height: 10px; background: black; border: 0px;">

END;
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