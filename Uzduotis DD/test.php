<!DOCTYPE html>
<html>
    <head>
        <title>test</title>
<?php include_once ('header.php');
include_once ('db_functions.php');?>







        <script src="./libs/jQuery/jquery-3.2.1.min.js"></script>
         <script src="./libs/datepicker/js/foundation-datepicker.js"></script>
         <script src="./libs/bootstrap/js/bootstrap.min.js"></script>
        <script src="./libs/timepicki/js/timepicki.js"></script>
        <script type="text/javascript" src="./js/script.js"></script>


        <?php
        session_start ();
        $_SESSION['kkk'] = $_GET['name'];
        $_SESSION['lll'] = $_GET['age'];

        echo $_SESSION['kkk'], $_SESSION['lll'];
        ?>

    </body>
</html>
