<?php
include_once ('./php/oder_list_classes.php');


//-------------------PAGES-------------------
if(isset($_GET['page'])){
  $current_page = $_GET['page']; //change page if pages link is pressed
}else {                           //define by loading page (default)
  $current_page = 1;
}
//-------------------SORTING-------------------
if (isset($_GET['sort']) && $_GET['change_sort'] == 1) { //if any of th sort link is pressed in table
  $sort = $_GET['sort'];
  if ($sort == 'ASC') {
    $sort = 'DESC';
  }
}elseif (isset($_GET['sort']) && $_GET['change_sort'] == 0) { //if pages are changing
    $sort = $_GET['sort'];
}else{                           //define by loading page (default)
  $sort = 'ASC';
}
//----------------------ORDER_BY----------------------
if (isset($_GET['order_by'])) {   //if th links are pressed
  $order_by = $_GET['order_by'];
}else {                          //define by loading page (default)
  $order_by = 'id';
}

//-------------------ORDER CLASS CREATION-------------------
$allOrders = new order_list ($order_by, $sort, $current_page);

//----------------------SEARCH------------------------------

if (!isset($_GET['srch_phrase']) || $_GET['srch_phrase'] == "") {     //if search button is pressed and search input is blank
  $srch_phrase = "";
  $search = "";
  $allOrders->get_orders_without_search();
}else {
  $srch_phrase = $_GET['srch_phrase'];
}

if(isset($_GET['submit']) && $_GET['submit'] === "Search"){        //if search button is pressed and searh input not blank
  $srch_phrase = $_GET['srch_phrase'];
  $allOrders->get_orders_with_search($srch_phrase);
  $search = "Search";
  $current_page == 1;
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
    <style>.highlight {text-decoration: underline;
                       font-weight: bold;
                      }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="row" style="height: 100px;">
        <div class="col-sm-12">
          <div class="text-center mt-5">
            <form class="" action="orders.php" method="get">
              <input type="hidden" name="order_by" value="<?php echo ($order_by)?>" />
              <input type="hidden" name="sort" value="<?php echo ($sort)?>" />
              <input type="hidden" name="page" value="1" />  <!--THIS ALWAYS BRINGS TO FIRST WHEN SEARCHING-->
              <input type="hidden" name="change_sort" value="0" />
              <input type="text" name="srch_phrase" value="">
              <input type="submit" name="submit" value="Search" />
            </form>
          </div>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-sm-12 text-center">
          <p class="h1 fira_font mb-3">Orders</p>
          <div>
            <?php
            for ($page=1; $page <= $allOrders->number_of_pages; $page++) {
              echo ('<a class="page h4 mr-3" pagenr="'.$page.'" href="?order_by='.$order_by.'&&sort='.$sort.'&&page='.$page."&&change_sort=0"."&&srch_phrase=".$srch_phrase."&&submit=".$search.'">'.$page.'</a>');
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
                <th><a class="columns" col-name="id" href='?order_by=id&&sort=<?php echo($sort)."&&page=".$current_page."&&change_sort=1"."&&srch_phrase=".$srch_phrase."&&submit=".$search?>'>Id</a></th>
                <th><a class="columns" col-name="name" href='?order_by=name&&sort=<?php echo($sort)."&&page=".$current_page."&&change_sort=1"."&&srch_phrase=".$srch_phrase."&&submit=".$search?>'>Name</a></th>
                <th><a class="columns" col-name="email" href='?order_by=email&&sort=<?php echo($sort)."&&page=".$current_page."&&change_sort=1"."&&srch_phrase=".$srch_phrase."&&submit=".$search?>'>Email</a></th>
                <th><a class="columns" col-name="sh_addr" href='?order_by=sh_addr&&sort=<?php echo($sort)."&&page=".$current_page."&&change_sort=1"."&&srch_phrase=".$srch_phrase."&&submit=".$search?>'>Shipping Address</a></th>
                <th><a class="columns" col-name="qty" href='?order_by=qty&&sort=<?php echo($sort)."&&page=".$current_page."&&change_sort=1"."&&srch_phrase=".$srch_phrase."&&submit=".$search?>'>Quantity</a></th>
                <th><a class="columns" col-name="order_id" href='?order_by=order_id&&sort=<?php echo($sort)."&&page=".$current_page."&&change_sort=1"."&&srch_phrase=".$srch_phrase."&&submit=".$search?>'>Order id</a></th>
                <th><a class="columns" col-name="time_stamp" href='?order_by=time_stamp&&sort=<?php echo($sort)."&&page=".$current_page."&&change_sort=1"."&&srch_phrase=".$srch_phrase."&&submit=".$search?>'>Date</a></th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($allOrders->orders_to_show as $key => $value) {
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

  <script defer>
    var currentPage = <?php echo $current_page?>;
    var currentOrderBy = "<?php echo $order_by ?>";
    var pages = document.getElementsByClassName("page");
    var columns = document.getElementsByClassName("columns");
    function highlight (obj, attr, current) {
      for (var i = 0; i < obj.length; i++) {
        if (obj[i].getAttribute(attr) == current) {
          obj[i].classList.add("highlight");
        }else {
          obj[i].classList.remove("highlight");
        }
      }
    }
    highlight(pages, "pagenr", currentPage);
    highlight(columns, "col-name", currentOrderBy);
  </script>
  </body>
</html>
