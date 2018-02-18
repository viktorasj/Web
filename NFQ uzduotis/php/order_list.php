<?php
include_once ('./classes.php');
include_once ('./f_show_order_results.php');

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Orders</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div class="container-fluid">
  <!-- search div -->
  <div class="row form_div">
    <div class="col-md-12">
      <form class="mt-5 mb-5 text-center" action="order_list.php" method="get">
        <input type="text" name="searchin_phrase" value="">
        <button type="submit" name="search">Search</button>
      </form>
    </div>
  </div>
  <!--begining of order table div-->
  <div class="row order_table">
    <div class="col-md-12">
      <p class="text-center h3 mb-3 fill_up_headline"><a href="./order_list.php">Orders</a></p>
      <?php
            $newOrder = new order(); // creates an object
            $column_names = $newOrder->getColNames(); //getting column names from database
            $results_per_page = 7; // can change it

            if (!isset($_GET['sort']) && !isset($_GET['search'])) {
              $allOrders = showResults($newOrder, 'getOrders', $results_per_page, "", "", "");
            }
            // if searching - reload $allOrders to search results
            elseif (isset($_GET['searchin_phrase']) && $_GET['searchin_phrase'] === "") {
              header('Location: ./order_list.php');
            }
            elseif (isset($_GET['searchin_phrase'])) {
              $allOrders = showResults($newOrder, 'searchOrders', $results_per_page, $_GET['searchin_phrase'], "", "");
            }
            elseif (isset($_GET['sort'])) {
              $allOrders = showResults($newOrder, 'sortOrders', $results_per_page, "", $_GET['sort'], $_GET['column_name']);
            }
      ?>
    </div>
    </div>
      <!-- table itself -->
            <table class="mx-auto">
              <tr>
                <?php foreach ($column_names as $key => $value) {?>
                  <th class="text-center tr_th_<?php echo $key?>" style="border: 2px solid black">
                    <?php echo $value ?>
                    <form class="" action="order_list.php" method="get">
                      <input type="hidden" name="column_name" value="<?php echo $key ?>">
                      <button class="sort_button" type="submit" name="sort" value="ASC">&#9650;</button>
                      <button class="sort_button" type="submit" name="sort" value="DESC">&#9660;</button>
                    </form>
                  </th>
                <?php }?>
              </tr>
              <?php while ($row = mysqli_fetch_assoc($allOrders)) { ?>
               <tr>
                <td class="table_data"><?php echo $row['id'] ?></td>
                <td class="table_data"><?php echo $row['name'] ?></td>
                <td class="table_data"><?php echo $row['last_name'] ?></td>
                <td class="table_data"><?php echo $row['email'] ?></td>
                <td class="table_data"><?php echo $row['shipping_adr'] ?></td>
                <td class="table_data"><?php echo $row['qty'] ?></td>
                <td class="table_data"><?php echo $row['order_price'] ?></td>
                <td class="table_data"><?php echo $row['order_number'] ?></td>
                <td class="table_data"><?php echo $row['date'] ?></td>
               </tr>
             <?php }?>
          </table>
    </div>
  </div>
  <!-- end of table div -->


  <script type="text/javascript" src="../lib/jquery/jquery-3.2.1.min.js" defer></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" defer></script>
  <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" defer></script>
</body>
</html>
