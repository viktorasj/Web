<?php
include_once('./classes.php');

if(isset($_POST)){
  $order = new order($_POST);
  if (!($order->verify_order())) {
    echo($order->message);
  }

}



?>
