<?php
include_once('./db_conn.php');

class order extends dbh {
  public $name;
  public $email;
  public $sh_addr;
  public $qty;
  public $message;
  public $order_id;

  public function __construct ($received_post) {
    $this->name = $received_post['name'];
    $this->email = $received_post['email'];
    $this->sh_addr = $received_post['sh_addr'];
    $this->qty = $received_post['qty'];
    $this->order_id = $received_post['order_id'];
    $this->message = false;
  }

  public function validate_order(){
    if (empty($this->name)) {
      $this->message = "Name is missed";
    }
    elseif (strlen(trim($this->name)) == 0) {
      $this->message = "Name contains only white spaces";
    }
    elseif (preg_match('/[^A-Za-z ]/', $this->name)) {
      $this->message = "Name contains invalid characters";
    }
    elseif (strlen($this->name) < 3) {
      $this->message = "Name must be minimum three letters";
    }
    elseif (empty($this->email)) {
      $this->message = "Email is missed";
    }
    elseif (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
      $this->message = "Email is not valid";
    }
    elseif (empty($this->sh_addr)) {
      $this->message = "Shipping address is missed";
    }
    elseif (strlen($this->sh_addr) < 8) {
      $this->message = "Shipping address is too short";
    }
    elseif (empty($this->qty)) {
      $this->message = "Quantity of boxes is missed";
    }
    elseif (!($this->qty > 0)) {
      $this->message = "Check quantity field";
    }
    return $this->message;
  }

  public function place_to_db(){
    $sql = "INSERT INTO orders
            VALUES('', '$this->name', '$this->email', '$this->sh_addr', '$this->qty', '$this->order_id', NOW())";
    $result = $this->connect()->query($sql);
    if (!$result) {
      die('Cannot place order to db!');
    }
  }
}

// order list classes


class order_list extends dbh {
  public $allOrders;

  public function __construct () {
    $sql = "select *
            FROM orders";
    $result = $this->connect()->query($sql);
    $this->allOrders = $result;
  }

  public function test () {
    echo (mysqli_fetch_assoc($this->allOrders));
  }

}


?>
