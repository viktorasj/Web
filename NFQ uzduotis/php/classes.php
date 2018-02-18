<?php
include_once ('./db_conn.php');

  class guitar_price extends dbh {
    public function get_guitar_price () {
        $sql = "SELECT * FROM guitar_price";
        $result = $this->connect()->query($sql);
        $result = mysqli_fetch_assoc($result);
        return $result['price'];
      }
    }

  class order extends dbh {
    private $name;
    private $last_name;
    private $email;
    private $shipping_adr;
    private $qty;
    private $order_price;
    private $order_number;

    public function createOrder ($name_, $last_name_, $email_,	$shipping_adr_,	$qty_,	$order_price_,	$order_number_){
      $this->name = $name_;
      $this->last_name = $last_name_;
      $this->email = $email_;
      $this->shipping_adr = $shipping_adr_;
      $this->qty = $qty_;
      $this->order_price = $order_price_;
      $this->order_number = $order_number_;
    }

    public function addOrder () {
        $sql = "INSERT INTO orders VALUES('', '$this->name', '$this->last_name', '$this->email', '$this->shipping_adr', '$this->qty', '$this->order_price', '$this->order_number', NOW())";
        $result = $this->connect()->query($sql);
      }

      public function getColNames() {
        $sql = "SELECT `COLUMN_NAME`FROM `INFORMATION_SCHEMA`.`COLUMNS`
        WHERE `TABLE_SCHEMA`='nfq'
        AND `TABLE_NAME`='orders'";
        $result = $this->connect()->query($sql);
        foreach ($result as $key => $value) {
          $array[] = $value['COLUMN_NAME']; //creates column names array
          $array[$value['COLUMN_NAME']] = $array[$key]; //sets keys of an array to original column numbers
          unset($array[$key]); // unsets old keys
        }
        $array = str_replace('_', ' ', $array); //replaces _ from column names
        $array = array_map('ucfirst', $array); // capitalize first letter
        return $array;
      }

    // public function getAllOrders () {
    //     $sql = "SELECT * FROM orders";
    //     $result = $this->connect()->query($sql);
    //     return $result;
    //   }

    public function getOrders ($search, $start, $qty, $sort_type, $sort_col) {
        $sql = "SELECT * FROM orders LIMIT $start, $qty";
        $result = $this->connect()->query($sql);
        return $result;
      }

    public function searchOrders ($search, $start, $qty, $sort_type, $sort_col) {
        $search = mysqli_real_escape_string($this->connect(), $search);
        $sql = "SELECT * FROM orders WHERE name LIKE '%$search%' OR
                                           last_name LIKE '%$search%' OR
                                           email LIKE '%$search%' OR
                                           shipping_adr LIKE '%$search%' OR
                                           qty LIKE '%$search%' OR
                                           order_price LIKE '%$search%' OR
                                           order_number LIKE '%$search%' OR
                                           date LIKE '%$search%' LIMIT $start, $qty";
        $result = $this->connect()->query($sql);
        return $result;
      }


    public function sortOrders ($search, $start, $qty, $sort_type, $sort_col) {
      $sql = "SELECT * FROM orders ORDER BY `$sort_col` $sort_type";
      $result = $this->connect()->query($sql);
      return $result;
    }
  }
?>
