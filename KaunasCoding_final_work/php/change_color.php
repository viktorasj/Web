<?php
include_once ('database_functions.php');
if(isset($_POST['submit_color'])){
    $color_code = "#".$_POST['main_color'];
    addNewColor ($connection, $color_code);
    header('Location: ./edit_color.php');
}


?>
