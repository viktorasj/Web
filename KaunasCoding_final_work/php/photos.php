

<?php
include_once ('database_functions.php');
$result = getImagePaths ($connection);
$photoPaths = [];
foreach ($result as $path) {
$photoPaths[]= "./".ltrim($path['image_path'], "/.");
}
foreach ($photoPaths as $i => $path) {?>
    <img class="fullSizeImg" style="display: none;" id="photo<?php echo $i ?>" src="about:blank" data-src="<?php echo $path ?>">
<?php } ?>
