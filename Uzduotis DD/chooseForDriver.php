<!DOCTYPE html>
<html>
    <head>
        <title>Tr. priemones pasirinkimas</title>
<?php

include_once ('header.php');
include_once ('db_functions.php');

session_start ();

if ($_SESSION['username'] != "") {
}
else {
    ?>
    <script type="text/javascript">
        alert ('Neesate prisijunges');
    </script>

<?php
    header( "Location: index.php" );
}
 ?>
<div class="container">

 <div class="wrapper2">
    <form class="form-signin2 text-center" action="driver.php" method="get">
    <br>
    <br>
    <br>
    <br>
    <br>
    <h3 class="form-signin-heading" >Pasirinkite vairuojamą transporto priemonę</h3>
    <br>
        <select class="form-control2 chooseSelect2" name="vechile" id="selectedCar" autofocus>
            <?php
            $test = selectAllVechiles ($connection);
            for ($i=0; $i < mysqli_num_rows($test); $i++) {
                $row = mysqli_fetch_array($test); ?>
                <option value="<?php print_r($row['TABLE_NAME']) ?>"><?php  echo (str_replace("_"," ", $row['TABLE_NAME']))?></option>
        <?php    } ?>
        </select>
        <br>
        <br>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="selectVechile">Pasirinkti</button>
    </form>
     </div>
</div>

<script src="./libs/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
