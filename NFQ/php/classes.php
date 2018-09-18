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
    //---written with if statements cos' it's less code than with switch/case---
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
    elseif (strlen($this->name) > 20) {
      $this->message = "Maximum name length twenty letters";
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
    elseif (!preg_replace( '/[^0-9]/', '', $this->sh_addr) || !preg_replace( '/[^a-zA-Z]/', '', $this->sh_addr)) {
      $this->message = "Shipping address must contain letters and number";
    }
    elseif (empty($this->qty)) {
      $this->message = "Quantity of boxes is missed";
    }
    elseif (!($this->qty > 0)) {
      $this->message = "Check quantity field";
    }
    elseif ($this->qty > 10) {
      $this->message = "Really? 10+ boxes? Max is ten!";
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

?>
