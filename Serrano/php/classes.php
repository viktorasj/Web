<?php

  class food extends dbh {

    public function getFood ($food_type) {
      $sql = "SELECT * FROM $food_type";
      $result = $this->connect()->query($sql);
      return $result;
    }
    public function addFood ($food_name, $food_ingridients, $food_price_medium, $food_price_big, $food_img_thumb, $food_img_norm, $food_cat, $food_type) {
      $sql = "INSERT INTO $food_type VALUES('',
                                       '$food_name',
                                       '$food_ingridients',
                                       '$food_price_medium',
                                       '$food_price_big',
                                       '$food_img_thumb',
                                       '$food_img_norm',
                                       '$food_cat',
                                       '$food_type'
                                        )";

      $result = $this->connect()->query($sql);
      if(!$result){
        echo('error adding food');
      }
    }
  }

  class upload_images extends image_functions {
      private $target_dir = "../img/normal/";
      protected $files;
      private $target_file;
      private $targetFileSize;
      private $imageFileType;

      public function tryToUpload ($file){
        $this->files = $file;
        $this->target_file = $this->target_dir . basename($file["image_file"]["name"]);
        $this->targetFileSize = $file["image_file"]["size"];
        $this->imageFileType = strtolower(pathinfo($this->target_file,PATHINFO_EXTENSION));
        if ($this->checkImage($this->files["image_file"]["tmp_name"]) &&
              $this->checkIfFileExist($this->target_file) &&
              $this->checkFileSize($this->targetFileSize)) {
                uploadImageFile ($this->files["image_file"]["tmp_name"], $this->target_file);
          }
      }
  }


  class image_functions {
    public function compress($source, $destination, $quality) {
          $info = getimagesize($source);

          if ($info['mime'] == 'image/jpeg')
              $image = imagecreatefromjpeg($source);

          elseif ($info['mime'] == 'image/gif')
              $image = imagecreatefromgif($source);

          elseif ($info['mime'] == 'image/png')
              $image = imagecreatefrompng($source);

          imagejpeg($image, $destination, $quality);
      }

      public function checkImage ($target) {
          $check = getimagesize($target);
          if($check === false) {
          $message = "err Prisegtas failas - ne nuotrauka";
          echo ($message);
          return false;
        }
          else {
            return true;
          }
      }

      public function checkIfFileExist ($target) {
        if (file_exists($target)) {
            $message = "err Nuotrauka egzistuoja";
            echo ($message);
            return false;
        }
        else {
          return true;
        }
      }

      public function checkFileSize ($target) {
        if ($target > 5000000) {
            $message = "err Prisegtas per didelė nuotrauka";
            echo ($message);
            return false;
        }
        else {
          return true;
        }
      }

      public function uploadImageFile ($fileName, $destination) {
        move_uploaded_file($fileName, $destination);
        $message = "added Produktas pridėtas";
        $source_img = $destination;
        $destination_img = '../img//thumbs/'.'thumb_'.basename($destination);
        compress($source_img, $destination_img, 50);
        echo ($message);
        return;
      }
  }

  // public function addOrder () {
  //     $sql = "INSERT INTO orders VALUES('', '$this->name', '$this->last_name', '$this->email', '$this->shipping_adr', '$this->qty', '$this->order_price', '$this->order_number', NOW())";
  //     $result = $this->connect()->query($sql);
  //   }
  //
  //   public function getColNames() {
  //     $sql = "SELECT `COLUMN_NAME`FROM `INFORMATION_SCHEMA`.`COLUMNS`
  //     WHERE `TABLE_SCHEMA`='nfq'
  //     AND `TABLE_NAME`='orders'";
  //     $result = $this->connect()->query($sql);
  //     foreach ($result as $key => $value) {
  //       $array[] = $value['COLUMN_NAME']; //creates column names array
  //       $array[$value['COLUMN_NAME']] = $array[$key]; //sets keys of an array to original column numbers
  //       unset($array[$key]); // unsets old keys
  //     }
  //     $array = str_replace('_', ' ', $array); //replaces _ from column names
  //     $array = array_map('ucfirst', $array); // capitalize first letter
  //     return $array;
  //   }

  // public function getAllOrders () {
  //     $sql = "SELECT * FROM orders";
  //     $result = $this->connect()->query($sql);
  //     return $result;
  //   }

//   public function getOrders ($search, $start, $qty, $sort_type, $sort_col) {
//       $sql = "SELECT * FROM orders LIMIT $start, $qty";
//       $result = $this->connect()->query($sql);
//       return $result;
//     }
//
//   public function searchOrders ($search, $start, $qty, $sort_type, $sort_col) {
//       $search = mysqli_real_escape_string($this->connect(), $search);
//       $sql = "SELECT * FROM orders WHERE name LIKE '%$search%' OR
//                                          last_name LIKE '%$search%' OR
//                                          email LIKE '%$search%' OR
//                                          shipping_adr LIKE '%$search%' OR
//                                          qty LIKE '%$search%' OR
//                                          order_price LIKE '%$search%' OR
//                                          order_number LIKE '%$search%' OR
//                                          date LIKE '%$search%' LIMIT $start, $qty";
//       $result = $this->connect()->query($sql);
//       return $result;
//     }
//
//
//   public function sortOrders ($search, $start, $qty, $sort_type, $sort_col) {
//     $sql = "SELECT * FROM orders ORDER BY `$sort_col` $sort_type";
//     $result = $this->connect()->query($sql);
//     return $result;
//   }
// }
?>
