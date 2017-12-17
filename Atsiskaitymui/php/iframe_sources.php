<?php
include_once ('./database_functions.php');

$sources = getIframes($connection);
?>

<?php foreach ($sources as $k => $source) : ?>
        <iframe class="visIframes" style="border: 0; width: 27vw; height: 82vh;" playerid="<?php echo "music".$k?>" src="about:blank" data-src="<?php echo $source['src']?>" seamless><a href="<?php echo $source['href']?>"><?php $source['label']?></a></iframe>
<?php endforeach;

?>
