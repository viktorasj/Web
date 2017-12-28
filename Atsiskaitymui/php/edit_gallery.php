<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>testing</title>
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

<input type="button" style="width: 200px; height: 50px; font-size: 20px; background-color: rgb(97, 161, 36)" onclick="location.href='admin.php';" value="Back to AdminSide" />


        <form action="upload_image.php" method="post" enctype="multipart/form-data">
            <h2>Select image to upload:</h2>
            <input style="width: 300px; height: 50px; font-size: 20px;" type="file" name="fileToUpload" id="fileToUpload">
            <br>
            <input style="width: 200px; height: 50px; font-size: 20px; background-color: #3bd01a" type="submit" value="Upload Image" name="submit">
    </form>
    <br>
    <br>
    <form class="" action="edit_gallery.php" method="get">
        <table>
            <tr>
                <th></th>
                <th>Id</th>
                <th>Image</th>
            </tr>
            <?php
            $result = getImagePaths ($connection);
            while ($row = mysqli_fetch_array($result)){ ?>
            <tr>
                <td ><input type="checkbox" name="checkedPhotos[]" value="<?php echo $row['id'] ?>"></td>
                <td style="border: 1px solid #000"> <h3 style="margin:20px"><?php echo($row['id'])?></h3> </td>
                <td style="border: 1px solid #000"> <img style="width: 100px; margin: 20px;"src="<? echo($row['image_path']) ?>" alt=""></td>
            </tr>
            <?php } ?>
        </table>

        <button style="width: 200px; height: 50px; font-size: 20px; background-color: rgb(223, 76, 76)" type="submit" name="deleteSelectedPhotos">Delete <b>SELECTED</b> Photos</button>
    </form>




    </body>
</html>
