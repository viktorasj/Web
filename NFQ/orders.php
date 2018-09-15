<?php
include_once ('./php/oder_list_classes.php');


if (isset($_GET['order'])) {
  $order_by = $_GET['order'];
}else {
  $order_by = 'id';
}

if (isset($_GET['sort'])) {
  $sort = $_GET['sort'];
  if ($sort == 'ASC') {
    $sort = 'DESC';
  }else {
    $sort = 'ASC';
  }
}else {
  $sort = 'ASC';
}

$allOrders = new order_list ($order_by, $sort);
if(isset($_GET['submit'])){
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
          <p class="h1 fira_font">Orders</p>
        </div>
      </div>
      <div class="row" style="height: 100px;">
        <div class="col-sm-12">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col"><a class="add_underline" href='?order=id&&sort=<?php echo($sort)?>'>Id</a></th>
                <th><a class="add_underline" href='?order=name&&sort=<?php echo($sort)?>'>Name</a></th>
                <th><a class="add_underline" href='?order=email&&sort=<?php echo($sort)?>'>Email</a></th>
                <th><a class="add_underline" href='?order=sh_addr&&sort=<?php echo($sort)?>'>Shipping Address</a></th>
                <th><a class="add_underline" href='?order=qty&&sort=<?php echo($sort)?>'>Quantity</a></th>
                <th><a class="add_underline" href='?order=order_id&&sort=<?php echo($sort)?>'>Order id</a></th>
                <th><a class="add_underline" href='?order=time_stamp&&sort=<?php echo($sort)?>'>Date</a></th>
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
