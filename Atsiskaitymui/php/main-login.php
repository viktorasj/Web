<?php
        if(isset($_POST["login"])){
            $sentUsername = ($_POST['username']);
            $sentPassword = ($_POST['password']);
            $sentUsername = stripcslashes($sentUsername);
            $sentPassword = stripcslashes($sentPassword);
            $sentUsername = mysqli_real_escape_string($connection, $sentUsername);
            $sentPassword = mysqli_real_escape_string($connection, $sentPassword);
            $result = getLogin($connection);
            while ($row = mysqli_fetch_array($result)) :
                if ($sentUsername == $row['username'] && $sentPassword == $row['password'] && $row['status'] == "admin") {
                header('Location: ./php/admin.php');
            }
                elseif ($sentUsername == $row['username'] && $sentPassword == $row['password'] && $row['status'] == "client") {
                header('Location: ./php/client.php');
            }
            endwhile;

    }
?>
