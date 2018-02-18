<?php
function showResults ($obj, $meth_name, $results_per_page, $search, $sort_type, $sort_col) {
  $allOrders = $obj;
  $allOrders = $obj->$meth_name ($search, 0, 100, $sort_type, $sort_col); //this function needed to calculate page quantity
  $number_of_results = mysqli_num_rows($allOrders);
  $number_of_pages = ceil($number_of_results/$results_per_page);
    if (!isset($_GET['page'])) {
      $page = 1;
    }
    else {
      $page = $_GET['page'];
    }
  $starting_limit_number = ($page-1)*$results_per_page;
  $allOrders = $obj->$meth_name ($search, $starting_limit_number, $results_per_page, $sort_type, $sort_col); ?>

<!-- navigation to table pages -->
<div class="row">
  <div class="col-md-12 mt-5 mb-5 paging">
<?php for ($page=1; $page <= $number_of_pages; $page++) {
  if ($meth_name === "getOrders"){ ?>
    <a class="page_numbers" href="order_list.php?page=<?php echo $page ?>"><?php echo $page ?></a> <!--prints pages-->
  <?php }
  }?>
  </div>
</div>

<?php
  return $allOrders;
}?>
