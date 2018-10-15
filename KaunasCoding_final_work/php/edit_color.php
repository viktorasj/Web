<?php
include_once ('database_functions.php');
$current_color = getLastColor ($connection);
$current_color = $current_color['color_code'];
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Color edit</title>
        <link rel="stylesheet" href="../libs/bootstrap/css/bootstrap.min.css">
        <script src="../libs/jQuery/jquery-3.2.1.min.js" defer></script>
        <script src="../libs/bootstrap/js/bootstrap.min.js" defer></script>
        <script src="../libs/jscolor/jscolor.js"></script>

    </head>
    <body>
        <div style="display: flex; justify-content: center">
            <input type="button" style="width: 200px; height: 50px; font-size: 20px; background-color: rgb(97, 161, 36)" onclick="location.href='admin.php';" value="Back to AdminSide" />
        </div>
        <br>
        <h4 style="width: 150px" class="mx-auto">Color History</h4>


        <div class="mx-auto p-5" style="display: flex; justify-content: center; border: 2px solid black; width: 800px; height: 200px;">
        <br>
        <?php
        $result = getLasts ($connection);
        $resultLast = getLastColor ($connection);
        while ($row = mysqli_fetch_array($result)) { ?>
            <div class="mx-auto text-center" style="width: 100px; height: 100px; background-color: <?php echo $row['color_code'] ?>"><span style="font-size: 20px; color: yellow; font-weight: 500;">color code <?php echo $row['color_code'] ?></span> </div>
        <?php } ?>
            <div class="mx-auto text-center" style="width: 100px; height: 100px; background-color: <?php echo $resultLast['color_code'] ?>"><span style="font-size: 20px; color: yellow; font-weight: 500;">Current color code <?php echo $resultLast['color_code'] ?></span> </div>
        </div>




            <form class="mt-5 text-center" style="" action="change_color.php" method="post">
                <p style="font-size: 18px;">Click and choose your color OR paste color code into input field without # in HEX</p>
                <input style="width: 450px; font-size:24px;" type="text" name="main_color" class="jscolor" value="<?php echo ltrim($resultLast['color_code'], '#')?>">
                <br>
                <br>
                <button class="mt-3" type="submit" name="submit_color" style="width: 400px;">Change <br /> Color</button>
            </form>





    </body>
</html>
