<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>ClientArea</title>
    </head>
    <body>
        <h1>Welcome Client</h1>
        <form class="" action="../index.php">
               <button style="width: 200px; height: 50px; font-size: 20px; background-color: rgb(221, 190, 37)" type="submit">Back to my page</button>
        </form>
        <?php

        include_once ('./database_functions.php');


        $messages = getMessages ($connection);
        ?>
        <br />
        <h1>Received messages</h1>
        <br />
        <form class="" action="admin.php" method="get">
            <table style="font-size: 20px;">
                <tr>
                    <th style="border: 1px solid #000">id</th>
                    <th style="border: 1px solid #000">who write to you</th>
                    <th style="border: 1px solid #000">his email</th>
                    <th style="border: 1px solid #000">message</th>
                    <th style="border: 1px solid #000">date</th>
                </tr>
                <?php while ($row = mysqli_fetch_array($messages)) : ?>
                    <tr>
                        <td style="border: 1px solid #000"><?php echo $row['id'] ?></td>
                        <td style="border: 1px solid #000"><?php echo $row['name'] ?></td>
                        <td style="border: 1px solid #000"><?php echo $row['email'] ?></td>
                        <td style="border: 1px solid #000"><?php echo $row['message'] ?></td>
                        <td style="border: 1px solid #000"><?php echo $row['date'] ?></td>
                    </tr>

                <?php endwhile; ?>
            </table>
            <br />
            <br />
            <br />
            <h1>Existing Users</h1>
            <?php
            $users = getLogin($connection);
            ?>

            <form class="" action="admin.php" method="get">
                <table style="font-size: 20px;">
                    <tr>
                        <th style="border: 1px solid #000">id</th>
                        <th style="border: 1px solid #000">username</th>
                        <th style="border: 1px solid #000">status</th>

                    </tr>
                    <?php while ($row = mysqli_fetch_array($users)) : ?>
                        <tr>
                            <td style="border: 1px solid #000"><?php echo $row['id'] ?></td>
                            <td style="border: 1px solid #000"><?php echo $row['username'] ?></td>
                            <td style="border: 1px solid #000"><?php echo $row['status'] ?></td>
                        </tr>
                    <?php endwhile; ?>
                </table>
                
    </body>
</html>
