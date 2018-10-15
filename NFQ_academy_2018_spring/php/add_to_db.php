<?php
include_once ('./classes.php');

if(isset($_GET)){
$new_order = new order();
$new_order->createOrder($_GET['name'], $_GET['lastName'], $_GET['email'], $_GET['shippingAdr'], $_GET['qty'], $_GET['orderPrice'], $_GET['orderNumber']);
$new_order->addOrder();
}

?>
