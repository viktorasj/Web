<?php
include_once('./php/db_conn.php');

class order_list extends dbh {
  public $number_of_records;
  public $orders_to_show = array();
  public $allOrders = array();
  public $number_of_pages;
  public $results_per_page = 10;
  public $current_page;
  public $this_page_first_result;
  public $sort;
  public $order_by;

  public function __construct ($order_by, $sort, $current_page) {
    $this->number_of_records = $this->get_number_of_records();
    $this->number_of_pages = ceil($this->number_of_records/$this->results_per_page);
    $this->current_page = $current_page;
    $this->this_page_first_result = ($this->current_page-1)*$this->results_per_page;
    $this->sort = $sort;
    $this->order_by = $order_by;
    $array = array();


    //-------------------collecting all orders in array for search---------------
    $sql = "select *
            FROM orders
            ORDER BY $order_by
            $sort
            ";
    $result = $this->connect()->query($sql);
    while($row = $result->fetch_assoc()){
      $array[] = $row;
    }
    $this->allOrders = $array;
    }

  public function get_number_of_records(){
      $sql = "select *
              FROM orders
              ";
      $result = $this->connect()->query($sql);
      return mysqli_num_rows($result);
  }

  public function get_orders_without_search(){
    $sql = "select *
            FROM orders
            ORDER BY $this->order_by
            $this->sort
            LIMIT " .$this->this_page_first_result. ',' .$this->results_per_page;
    $result = $this->connect()->query($sql);
    //-------------------defining simple multidimensional array--------------------------
    while($row = $result->fetch_assoc()){
      $temp_array[] = $row;
    }
    $this->orders_to_show = $temp_array;
  }

  public function get_orders_with_search ($search) {
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
         $search_results[$key]['id'] = $val['id']+1;
         $search_results[$key]['name'] = $val['name'];
         $search_results[$key]['email'] = $val['email'];
         $search_results[$key]['sh_addr'] = $val['sh_addr'];
         $search_results[$key]['qty'] = $val['qty'];
         $search_results[$key]['order_id'] = $val['order_id'];
         $search_results[$key]['time_stamp'] = $val['time_stamp'];
       }
    }
    $this->number_of_records = count($search_results);
    $this->number_of_pages = ceil($this->number_of_records/$this->results_per_page);
    $this->orders_to_show = array_slice($search_results, $this->this_page_first_result, $this->results_per_page);
    

  }
}




?>
