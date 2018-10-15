<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Edit gallery</title>
        <link rel="stylesheet" href="../libs/bootstrap/css/bootstrap.min.css">
        <script src="../libs/jQuery/jquery-3.2.1.min.js" defer></script>
        <script src="../libs/bootstrap/js/bootstrap.min.js" defer></script>
    </head>
    <body>
<?php
include_once ('database_functions.php');

if(isset($_GET['deleteSelectedPhotos'])) {
    foreach ($_GET["checkedPhotos"] as $photoId){
        $imgToDelete = getImagePathsById ($connection, $photoId);
        unlink($imgToDelete['image_path']);
        unlink($imgToDelete['thumb_path']);
        deleteImagePaths ($connection, $photoId);

    }
}
?>
<div class="container">


  <div style="display: flex; justify-content: center">
  <input type="button" style="width: 200px; height: 50px; font-size: 20px; background-color: rgb(97, 161, 36)" onclick="location.href='admin.php';" value="Back to AdminSide" />
  </div>

  <br>
  <br>

  <div style="padding: 20px; border: 1px solid #000; background-color: rgba(1, 255, 147, 0.45)">
      <form action="upload_image.php" method="post" enctype="multipart/form-data">
            <h2>Select image to upload:</h2>
            <br>
            <input style="width: 300px; height: 50px; font-size: 20px;" type="file" name="fileToUpload" id="fileToUpload">
            <br>
            <br>
            <input style="width: 200px; height: 50px; font-size: 20px; background-color: #3bd01a" type="submit" value="Upload Image" name="submit">
    </form>
  </div>
    <br>
    <br>
    <div class="text-center" style="width: 1000px">


    <form action="edit_gallery.php" method="get">
        <table class="mx-auto" >
            <tr>
                <th class="text-center"></th>
                <th class="text-center">Id</th>
                <th class="text-center">Image</th>
            </tr>
            <?php
            $result = getImagePaths ($connection);
            while ($row = mysqli_fetch_array($result)){ ?>
            <tr>
                <td ><input type="checkbox" name="checkedPhotos[]" value="<?php echo $row['id'] ?>"></td>
                <td style="border: 1px solid #000"> <h3 style="margin:20px"><?php echo($row['id'])?></h3> </td>
                <td style="border: 1px solid #000"> <img style="width: 150px; margin: 20px;"src="<? echo($row['image_path']) ?>" alt=""></td>
            </tr>
            <?php } ?>
        </table>
        <br>
        <button style="width: 200px; font-size: 20px; background-color: rgb(223, 76, 76)" type="submit" name="deleteSelectedPhotos">Delete <b>SELECTED</b> Photos</button>
    </form>
</div>



  </div>
    </body>
</html>
