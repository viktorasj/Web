<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>AdminArea</title>
    </head>
    <body>
        <h1>Welcome Paulius!</h1>
        <h2>Edit your "About Message"</h2>
        <?php

        include_once ('./database_functions.php');


        if(isset($_POST['text'])) {
            $textToAdd = $_POST['text'];
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

        <form class="" action="logged.php" method="post">
            <textarea  style="font-size: 18px" name="text" rows="8" cols="150"><?php echo $text ?></textarea>
            <br />
            <button style="width: 100px; height: 50px; font-size: 20px; background-color: pink" type="submit" name="sent">Edit!</button>
        </form>

        <br />
        <?php
        $messages = getMessages ($connection);

        ?>
        <br />
        <br />
        <h1>Your messages</h1>
        <br />
        <br />
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

            <?php
            if(isset($_POST['delete'])) {
                deleteMessages ($connection);
            }
             ?>

            <form class="" action="logged.php" method="post">
                <br />
                <button style="width: 200px; height: 50px; font-size: 20px; background-color: pink" type="submit" name="delete">Delete all Messages!</button>
            </form>



            <br />
            <br />
            <br />
            <br />
            <a style="font-size: 20px" href="../index.php">Back to my page</a>


    </body>
</html>
