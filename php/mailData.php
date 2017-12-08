<?php
include_once ('./database_functions.php');
if(isset($_GET)){
    $name = $_GET['name'];
    $email = $_GET['email'];
    $message = $_GET['message'];
addMessage ($connection, $name, $email, $message);
}

?>
