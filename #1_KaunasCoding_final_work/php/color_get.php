<?php
include_once ('database_functions.php');
$color = getLastColor($connection);
?>
<script type="text/javascript">
    var mainSiteColor = "<?php echo $color['color_code'] ?>";
</script>
