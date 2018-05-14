<?php
function compress($source, $destination, $quality) {
      $info = getimagesize($source);

      if ($info['mime'] == 'image/jpeg')
          $image = imagecreatefromjpeg($source);

      elseif ($info['mime'] == 'image/gif')
          $image = imagecreatefromgif($source);

      elseif ($info['mime'] == 'image/png')
          $image = imagecreatefrompng($source);

      imagejpeg($image, $destination, $quality);
  }

  function checkImage ($target) {
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

  function checkIfFileExist ($target) {
    if (file_exists($target)) {
        $message = "err Nuotrauka egzistuoja";
        echo ($message);
        return false;
    }
    else {
      return true;
    }
  }

  function checkFileSize ($target) {
    if ($target > 5000000) {
        $message = "err Prisegtas per didelė nuotrauka";
        echo ($message);
        return false;
    }
    else {
      return true;
    }
  }

  function uploadImageFile ($fileName, $destination) {
    move_uploaded_file($fileName, $destination);
    $message = "added Produktas pridėtas";
    $source_img = $destination;
    $destination_img = '../img/thumbs/'.'thumb_'.basename($destination);
    compress($source_img, $destination_img, 50);
    echo ($message);
    return;
  }

  function deleteExistingImages ($received_row) {
    unlink('.'.$received_row['food_img_norm']);
    unlink('.'.$received_row['food_img_thumb']);
  }
  ?>
