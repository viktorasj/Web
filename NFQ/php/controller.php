<?php
include_once('./classes.php');

if(isset($_POST)){
  $order = new order($_POST);
  $message = $order->validate_order();
  $return_arr = [];
  if (!empty($message)) {
    $return_arr['message'] = $message;
    echo json_encode($return_arr);
    return;
  }
  else{
    $return_arr['message'] = $message;
    $return_arr['order_id'] = $order->order_id;
    echo json_encode($return_arr);
    $order->place_to_db();
  }

}



?>
