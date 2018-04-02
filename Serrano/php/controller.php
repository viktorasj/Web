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
                      "./img/thumbs/thumb_".$_POST['food_img_norm'],
                      "./img/normal/".$_POST['food_img_norm'],
                      $_POST['food_cat'],
                      $_POST['food_type']
                      );
      $upload_images->tryToUpload($_FILES);
    }
  }
}

// if (isset($_FILES["image_file"])) {
//   $target_dir = "../img/normal/";
//   $target_file = $target_dir . basename($_FILES["image_file"]["name"]);
//   $targetFileSize = $_FILES["image_file"]["size"];
//   $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
//   if (checkImage($_FILES["image_file"]["tmp_name"]) &&
//       checkIfFileExist($target_file) &&
//       checkFileSize($targetFileSize)) {
//         uploadImageFile ($_FILES["image_file"]["tmp_name"], $target_file);
//   }
// }

?>
