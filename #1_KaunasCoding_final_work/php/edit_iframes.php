<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Edit albums</title>
        <link rel="stylesheet" href="../libs/bootstrap/css/bootstrap.min.css">
        <script src="../libs/jQuery/jquery-3.2.1.min.js" defer></script>
        <script src="../libs/bootstrap/js/bootstrap.min.js" defer></script>

    </head>
    <body>

<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            var img = new Image;
            $('#preview').text(img.width);

            reader.onload = function (e) {
                $('#preview').attr('src', e.target.result);
            }


            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<?php include_once ('database_functions.php');

if(isset($_POST['deleteSelectedAlbums'])) {
    foreach ($_POST["checkedAlbums"] as $albumId){
        $albumArtToDelete = getAlbumById ($connection, $albumId);
        unlink(".".$albumArtToDelete['artLinks']);
        deleteIframe ($connection, $albumId);

    }
}
?>

<div class="container">

<div style="display: flex; justify-content: center">
<input type="button" style="width: 200px; height: 50px; font-size: 20px; background-color: rgb(97, 161, 36)" onclick="location.href='admin.php';" value="Back to AdminSide" />
</div>

<div class="">
    <ol>
        <li>Go to your <a href="https://sraunus.bandcamp.com/">Bandcamp</a> page </li>
        <li>Select album you want to add</li>
        <li>Click on artwork, click right mb and "save image as" somewhere</li>
        <li>Exit preview</li>
        <li>Search to "Share/embed" link around album artwork, click it</li>
        <li>On "Embed this album" menu click on the biggest layout</li>
        <li>On "select style" Click on the biggest layout again</li>
        <li>On layout option check "Show tracklist" (Show artwork must be "BIG")</li>
        <li>Choose dark theme in "themes"</li>
        <li>Copy whole Iframe link from start to end (html, not wordpress)</li>
        <li>Come back here and do next</li>



    </ol>
</div>

<form class="mt-5" action="upload_iframe.php" method="post" enctype="multipart/form-data">
    <input style="width: 1200px; font-size:24px;" type="text" name="iframe_link" value="" placeholder="Paste your IFRAME link from bandcamp here" required>
    <img class="mt-3 mb-3" style="width: 150px;" id="preview" src="about:blank" alt="">
    <br>
        <input class="mt-3" type="file" name="fileToUpload" id="fileToUpload" onchange="readURL(this);" required>
    <br>
    <button class="mt-3" type="submit" name="submited_iframe">Upload Iframe</button>
</form>
<br>
<br>
<form style="width: 25em" class="mx-auto" action="edit_iframes.php" method="post">
    <table>
        <tr>
            <th></th>
            <th>Album Label</th>
            <th>Artwork</th>
        </tr>
        <?php
        $iFrames = getIframes ($connection);
            while ($row = mysqli_fetch_assoc($iFrames)){?>
        <tr>
            <td><input class="mr-3" type="checkbox" name="checkedAlbums[]" value="<?php echo $row['id'] ?>"></td>
            <td style="border-top: 1px solid black; border-left: 1px solid black'"><?php echo $row['label']?></td>
            <td><img style="width: 100px;" src="<?php echo ".".$row['artLinks']?>" alt=""> </td>
        </tr>
            <?php }?>

    </table>
    <button style="margin-top: 3em; margin-bottom: 10em; width: 25em; height: 50px; font-size: 20px; background-color: rgb(223, 76, 76)" type="submit" name="deleteSelectedAlbums">Delete <b>SELECTED</b> albums</button>

</form>

</div>



    </body>
</html>
