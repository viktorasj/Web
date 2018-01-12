<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
<?php
include_once ('header.php');
include_once ('db_functions.php');

session_start ();
initAjaxVechile ($connection);


?>
<div class="container-fluid">

<?php


            if(isset($_GET["login"])){
            $sentUsername = ($_GET['username']);
            $sentPassword = ($_GET['password']);
            $sentUsername = stripcslashes($sentUsername);
            $sentPassword = stripcslashes($sentPassword);
            $sentUsername = mysqli_real_escape_string($connection, $sentUsername);
            $sentPassword = mysqli_real_escape_string($connection, $sentPassword);
            $result = getLogin($connection);



            while ($row = mysqli_fetch_array($result)) :
                if ($sentUsername == $row['username'] && $sentPassword == $row['password'] && $row['status'] == "admin") {
                $_SESSION['username'] = $row['username'];
                header('Location: ./adminSide.php');
            }
                elseif ($sentUsername == $row['username'] && $sentPassword == $row['password'] && $row['status'] == "driver") {
                $_SESSION['username'] = $row['username'];
                header('Location: ./chooseForDriver.php');
            }
                elseif ($sentUsername != $row['username']){
                    $_SESSION['login_error'] = "Neteisingi prisijungimo duomenys";
                }
            endwhile;

    }

?>

                    <div class="wrapper">
                      <form class="form-signin">
                        <h2 class="form-signin-heading">Prisijunkite</h2>
                        <br />
                        <input class="form-control" type="text" name="username" value="" required="" autofocus="" placeholder="Prisijungimo vardas"/>
                        <input class="form-control" type="password" name="password" value="" required="" placeholder="Slaptažodis"/>
                        <br />
                         <p class="error text-center" ><?php if(isset($_SESSION['login_error'])) {
                                  echo $_SESSION['login_error'];
                                  $_SESSION['login_error'] = "";
                                  }?>
                         </p>
                        <button class="btn btn-lg btn-primary btn-block" type="submit" name="login" value="Login">Prisijungti</button>
                      </form>
                    </div>

</div>















         <script src="./libs/jQuery/jquery-3.2.1.min.js"></script>
         <script src="./libs/bootstrap/js/bootstrap.min.js"></script>

        <script src="./libs/timepicki/js/timepicki.js"></script>
        <script type="text/javascript" src="./js/script.js"></script>

    </body>
</html>
