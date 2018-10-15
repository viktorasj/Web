<?php
include_once ('database_functions.php');

$target_dir = "../images_art/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submited_iframe"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "<br />";
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        $iframe_link = htmlspecialchars($_POST['iframe_link']);
        $iframe_link = htmlspecialchars_decode($iframe_link);
        preg_match_all('/src=["\']?([^"\'>]+)["\']?/', $iframe_link, $match);
        $iframe_SRC = $match[1][0];
        preg_match_all('/href=["\']?([^"\'>]+)["\']?/', $iframe_link, $match);
        $iframe_HREF = $match[1][0];
        $frame_LABEL = strip_tags($iframe_link);
        $target_file= "./".ltrim($target_file, "/.");
        createIframe($connection, $iframe_SRC, $iframe_HREF, $frame_LABEL, $target_file);
        header('Location: edit_iframes.php');


    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

?>
