<?php
include_once('./php/db_conn.php');

class order_list extends dbh {
  public $allOrders = array();
  public $number_of_pages;
  public $number_of_records;
  public $results_per_page = 10;

  public function __construct ($order_by, $sort) {
    $temp_array = array();
    $sql = "select *
            FROM orders
            ORDER BY $order_by
            $sort";
    $result = $this->connect()->query($sql);
    while($row = $result->fetch_assoc()){
      $temp_array[] = $row;
    }
    $this->allOrders = $temp_array;
    $this->number_of_records = mysqli_num_rows($result);
    $this->number_of_pages = ceil($this->number_of_records/$this->results_per_page);

  }


  public function search ($search) {
    if ($search === "") {
      return;
    }
    $cont = strtolower($search);
    $search_results = array();
    $array = $this->allOrders;
    foreach ($array as $key => $val) {
       if (strpos(strtolower($val['id']), $cont) !== false ||
           strpos(strtolower($val['name']), $cont) !== false ||
           strpos(strtolower($val['email']), $cont) !== false ||
           strpos(strtolower($val['sh_addr']), $cont) !== false ||
           strpos(strtolower($val['qty']), $cont) !== false ||
           strpos(strtolower($val['order_id']), $cont) !== false ||
           strpos(strtolower($val['time_stamp']), $cont) !== false) {
         $search_results[$key]['id'] = $key+1;
         $search_results[$key]['name'] = $val['name'];
         $search_results[$key]['email'] = $val['email'];
         $search_results[$key]['sh_addr'] = $val['sh_addr'];
         $search_results[$key]['qty'] = $val['qty'];
         $search_results[$key]['order_id'] = $val['order_id'];
         $search_results[$key]['time_stamp'] = $val['time_stamp'];
       }
    }
    $this->allOrders = $search_results;
  }
}


?>
