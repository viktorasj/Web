<?php
include_once ('./php/oder_list_classes.php');


//-------------------PAGES-------------------
if(isset($_GET['page'])){
  $current_page = $_GET['page']; //change page if pages link is pressed
}
else {//define by loading page (default)
  $current_page = 1;
}
//-------------------SORTING-------------------
if (isset($_GET['sort']) && $_GET['change_sort'] == 1) { //if any of th sort link is pressed in table
  $sort = $_GET['sort'];
  if ($sort == 'ASC') {
    $sort = 'DESC';
  }else {
    $sort = 'ASC';
  }
}elseif (isset($_GET['sort']) && $_GET['change_sort'] == 0) { //if pages are changing
    $sort = $_GET['sort'];
}else{ //define by loading page (default)
  $sort = 'ASC';
}
//-------------------ORDERS-------------------
if (isset($_GET['order_by'])) {
  $order_by = $_GET['order_by'];
}else {
  $order_by = 'id';
}

$allOrders = new order_list ($order_by, $sort, $current_page);
if(isset($_GET['submit'])){ // if searching
  $allOrders->search($_GET['srch_phrase']);
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Order list</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Fira+Sans|Michroma">
      <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
      <link rel="stylesheet" href="./css/custom.css" />
  </head>
  <body>
    <div class="container">
      <div class="row" style="height: 100px;">
        <div class="col-sm-12">
          <div class="text-center mt-5">
            <form class="" action="orders.php" method="get">
              <input type="text" name="srch_phrase" value="">
              <input type="submit" name="submit" value="Search" />
            </form>
          </div>
        </div>
      </div>
      <div class="row" style="height: 100px;">
        <div class="col-sm-12 text-center">
          <p class="h1 fira_font mb-3">Orders</p>
          <div>
            <?php
            for ($page=1; $page <= $allOrders->number_of_pages; $page++) {
              echo ('<a class="h4 mr-3" href="?order_by='.$order_by.'&&sort='.$sort.'&&page='.$page."&&change_sort=0".'">'.$page.'</a>');
            }
            ?>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <table class="table table-bordered">
            <thead>
              <tr class="add_underline">
                <th><a href='?order_by=id&&sort=<?php echo($sort)."&&page=".$current_page."&&change_sort=1"?>'>Id</a></th>
                <th><a href='?order_by=name&&sort=<?php echo($sort)."&&page=".$current_page."&&change_sort=1"?>'>Name</a></th>
                <th><a href='?order_by=email&&sort=<?php echo($sort)."&&page=".$current_page."&&change_sort=1"?>'>Email</a></th>
                <th><a href='?order_by=sh_addr&&sort=<?php echo($sort)."&&page=".$current_page."&&change_sort=1"?>'>Shipping Address</a></th>
                <th><a href='?order_by=qty&&sort=<?php echo($sort)."&&page=".$current_page."&&change_sort=1"?>'>Quantity</a></th>
                <th><a href='?order_by=order_id&&sort=<?php echo($sort)."&&page=".$current_page."&&change_sort=1"?>'>Order id</a></th>
                <th><a href='?order_by=time_stamp&&sort=<?php echo($sort)."&&page=".$current_page."&&change_sort=1"?>'>Date</a></th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($allOrders->allOrders as $key => $value) {
                echo('<tr>
                        <td>'.$value['id'].'</td>'.
                        '<td>'.$value['name'].'</td>'.
                        '<td>'.$value['email'].'</td>'.
                        '<td>'.$value['sh_addr'].'</td>'.
                        '<td>'.$value['qty'].'</td>'.
                        '<td>'.$value['order_id'].'</td>'.
                        '<td>'.$value['time_stamp'].'</td>
                      <tr>');
                }

              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </body>
</html>
