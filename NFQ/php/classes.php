<?php
class order {
  public $name;
  public $email;
  public $sh_addr;
  public $qty;
  public $message;

  public function __construct ($received_post) {
    $this->name = $received_post['name'];
    $this->email = $received_post['email'];
    $this->sh_addr = $received_post['sh_addr'];
    $this->qty = $received_post['qty'];
  }

  public function verify_order(){
    if (empty($this->name)) {
      $this->message = "Name is missed";
    }
    elseif (empty($this->email)) {
      $this->message = "Email is missed";
    }
    elseif (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
      $this->message = "Email is not valid";
    }
    elseif (empty($this->sh_addr)) {
      $this->message = "Sipping address is missed";
    }
    elseif (empty($this->qty)) {
      $this->message = "Quantity of boxes is missed";
    }
    elseif (!($this->qty > 0)) {
      $this->message = "Check quantity field";
    }
    return;
  }

}


?>
