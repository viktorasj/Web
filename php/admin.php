<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>AdminArea</title>
    </head>
    <body>
        <h1>Welcome Admin</h1>
        <form class="" action="../index.php">
               <button style="width: 200px; height: 50px; font-size: 20px; background-color: rgb(221, 190, 37)" type="submit">Back to my page</button>
        </form>

        <h2>Edit your "About Message"</h2>
        <?php

        include_once ('./database_functions.php');
        $error = "";


        if(isset($_GET['text'])) {
            $textToAdd = $_GET['text'];
            updateAboutArticle ($connection, $textToAdd);
            $temp = getAboutArticle($connection);
            if($temp['article'] == $textToAdd){
                 echo "Message updated";
            }
            $text = $textToAdd;
        }

        $article = getAboutArticle($connection);
        $text = $article['article'];
        ?>

        <form class="" action="admin.php" method="get">
            <textarea  style="font-size: 18px" name="text" rows="8" cols="150"><?php echo $text ?></textarea>
            <br />
            <button style="width: 100px; height: 50px; font-size: 20px; background-color: rgb(49, 220, 223)" type="submit" name="sent">Edit!</button>
        </form>

        <?php
        $messages = getMessages ($connection);


        if(isset($_GET['deleteSelected'])) {
            foreach ($_GET["checked"] as $id){
                deleteMessages ($connection, $id);
                $messages = getMessages ($connection);
            }
       }

        ?>
        <br />
        <h1>Your messages</h1>
        <br />
        <form class="" action="admin.php" method="get">
            <table style="font-size: 20px;">
                <tr>
                    <th></th>
                    <th style="border: 1px solid #000">id</th>
                    <th style="border: 1px solid #000">who write to you</th>
                    <th style="border: 1px solid #000">his email</th>
                    <th style="border: 1px solid #000">message</th>
                    <th style="border: 1px solid #000">date</th>
                </tr>
                <?php while ($row = mysqli_fetch_array($messages)) : ?>
                    <tr>
                        <td><input type="checkbox" name="checked[]" value="<?php echo $row['id'] ?>"></td>
                        <td style="border: 1px solid #000"><?php echo $row['id'] ?></td>
                        <td style="border: 1px solid #000"><?php echo $row['name'] ?></td>
                        <td style="border: 1px solid #000"><?php echo $row['email'] ?></td>
                        <td style="border: 1px solid #000"><?php echo $row['message'] ?></td>
                        <td style="border: 1px solid #000"><?php echo $row['date'] ?></td>
                    </tr>

                <?php endwhile; ?>
            </table>

            <?php
            if(isset($_GET['delete'])) {
                deleteAllMessages ($connection);
            }
             ?>
                <br />
                <button style="width: 200px; height: 50px; font-size: 20px; background-color: pink" type="submit" name="deleteSelected">Delete <b>SELECTED</b> Messages!</button>
                <button style="width: 200px; height: 50px; font-size: 20px; background-color: pink" type="submit" name="delete">Delete <b> ALL</b> Messages!</button>
            </form>
            <br />

            <h1>Add more SuperAdmins or Clients!</h1>

            <?php
            $users = getLogin($connection);
            if(isset($_GET['deleteSelectedUsers'])) {
                foreach ($_GET["checkedUsers"] as $userId){
                    deleteUsers ($connection, $userId);
                    $users = getLogin($connection);
                }
            }
            if(isset($_GET['addUser'])) {
                $AddedUsername = ($_GET['AddedUsername']);
                $AddedPassword = ($_GET['AddedPassword']);
                $radio = ($_GET['radio']);
                if ($AddedUsername == "" || $AddedPassword =="") {
                    $error = "username and password cannot be blank!";
                }
                else {
                addUsers ($connection, $AddedUsername, $AddedPassword, $radio);
                $users = getLogin($connection);
                $error = "";

            }
            }


            ?>

            <form class="" action="admin.php" method="get">
                <table style="font-size: 20px;">
                    <tr>
                        <th></th>
                        <th style="border: 1px solid #000">id</th>
                        <th style="border: 1px solid #000">username</th>
                        <th style="border: 1px solid #000">password</th>
                        <th style="border: 1px solid #000">status</th>

                    </tr>
                    <?php while ($row = mysqli_fetch_array($users)) : ?>
                        <tr>
                            <td><input type="checkbox" name="checkedUsers[]" value="<?php echo $row['id'] ?>"></td>
                            <td style="border: 1px solid #000"><?php echo $row['id'] ?></td>
                            <td style="border: 1px solid #000"><?php echo $row['username'] ?></td>
                            <td style="border: 1px solid #000"><?php echo $row['password'] ?></td>
                            <td style="border: 1px solid #000"><?php echo $row['status'] ?></td>
                        </tr>
                    <?php endwhile; ?>
                </table>
                <br />
                <button style="width: 200px; height: 50px; font-size: 20px; background-color: rgb(50, 228, 111)" type="submit" name="deleteSelectedUsers">Delete selected users!</button>
                <br />
                <h1>Add users!</h1>
                <form class="" action="admin.php" method="get">
                    <h3 style="color: red;"><? echo $error ?></h3>
                    <input style="height: 25px; font-size: 20px" type="text" name="AddedUsername" value="" placeholder="Add Username">
                    <input style="height: 25px; font-size: 20px" type="text" name="AddedPassword" value="" placeholder="Add Password">
                    <input type="radio" name="radio" value="client"> client
                    <input type="radio" name="radio" value="admin" checked> admin <br>
                    <br />
                    <button style="width: 200px; height: 50px; font-size: 20px; background-color: rgb(108, 150, 214)" type="submit" name="addUser">Add User</button>
                </form>

    </body>
</html>
