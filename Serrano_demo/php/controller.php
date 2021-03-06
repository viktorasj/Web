<?php
include_once ('./db_conn.php');
include_once ('./classes.php');
include_once ('./functions.php');


if (isset($_POST) && isset($_FILES)) {
  $food = new food();
  $upload_images = new upload_images ();
  if($_POST['request_type'] === "add food")  {
    if($_POST['food_type'] === "pizza") {
      $food->addFood ($_POST['food_name'],
                      $_POST['food_ingridients'],
                      $_POST['food_price_medium'],
                      $_POST['food_price_big'],
                      "./img/thumbs/"."thumb_".$_POST['food_img_norm'],
                      "./img/normal/".$_POST['food_img_norm'],
                      // "./img/thumbs/".$_POST['food_type']."_thumb_".$_POST['food_img_norm'],
                      // "./img/normal/".$_POST['food_type']."_".$_POST['food_img_norm'],
                      $_POST['food_cat'],
                      $_POST['food_type']
                      );
      $upload_images->tryToUpload($_FILES);

    }
    if($_POST['food_type'] === "salad" || $_POST['food_type'] === "rolls" || $_POST['food_type'] === "other") {
      $food->addFood ($_POST['food_name'],
                      $_POST['food_ingridients'],
                      $_POST['food_price'],
                      $_POST['food_price'],
                      "./img/thumbs/"."thumb_".$_POST['food_img_norm'],
                      "./img/normal/".$_POST['food_img_norm'],
                      "none",
                      $_POST['food_type']
                      );
       $upload_images->tryToUpload($_FILES);
     }
  }
  if($_POST['request_type'] === "get food")  {
    $requested_food = $food->getFood ($_POST['food_type']);
    $return_arr = [];
    while ($row = mysqli_fetch_assoc($requested_food)) {
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

  if ($_POST['request_type'] === "edit food") {
    if($_POST) {
      $food->updateFood($_POST['edited_product_id'],
                        $_POST['edited_product_name'],
                        $_POST['edited_product_ingridients'],
                        $_POST['edited_product_price_medium'],
                        $_POST['edited_product_price_big'],
                        $_POST['edited_product_cat'],
                        $_POST['edited_product_type']
                      );
    };
    if($_FILES) {
      $received_row = $food->getRowById ($_POST['edited_product_type'], $_POST['edited_product_id']);
      deleteExistingImages ($received_row);
      $_FILES['image_file'] = $_FILES['edited_image_file']; //for image proccessing in functions.php, cannot read variable with edited_image_file;
      unset($_FILES['edited_image_file']); //for image proccessing in functions.php
      $upload_images->tryToUpload($_FILES);
      $food_img_thumb = "./img/thumbs/"."thumb_".$_FILES["image_file"]["name"];
      $food_img_normal = "./img/normal/".$_FILES["image_file"]["name"];
      $food->updateFoodImagesDb($_POST['edited_product_id'], $_POST['edited_product_type'], $food_img_thumb, $food_img_normal);
    }
  }
  
  if ($_POST['request_type'] === "delete food by id") {
    $received_row = $food->getRowById ($_POST['food_type'], $_POST['id']);
    deleteExistingImages ($received_row);
    $msg = $food->deleteFoodById($_POST['id'], $_POST['food_type']);
    echo($msg);
  }
}
?>
