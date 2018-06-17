<?php
include_once ('./db_conn.php');
include_once ('./classes.php');

if(isset($_GET)){
     $food_type = $_GET['foodType'];
     $result = new food();
     $food = $result -> getFood($food_type);
     $return_arr = [];
     while ($row = mysqli_fetch_assoc($food)) {
        $row_array['id'] = $row['id'];
        $row_array['food_name'] = $row['food_name'];
        $row_array['food_ingridients'] = $row['food_ingridients'];
        $row_array['food_price_medium'] = $row['food_price_medium'];
        $row_array['food_price_big'] = $row['food_price_big'];
        $row_array['food_img_thumb'] = $row['food_img_thumb'];
        $row_array['food_img_norm'] = $row['food_img_norm'];
        $row_array['food_cat'] = $row['food_cat'];
        $row_array['food_type'] = $row['food_type'];
        array_push($return_arr, $row_array);
    }
    echo json_encode($return_arr);
  }
?>
