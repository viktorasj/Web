<!DOCTYPE html>
<html>
    <head>
        <title>Uzduotis</title>
<?php
include_once ('header.php');
include_once ('db_functions.php');
include_once ('functions.php');

getAjaxVechile ($connection);
$ajaxVechile = mysqli_fetch_array(getAjaxVechile ($connection));
if ($ajaxVechile['ajax_vechile_name']) {
    $selectedVechile = $ajaxVechile['ajax_vechile_name'];
    $_SESSION['selectedVechile'] = $selectedVechile;
}
?>
        <br />
        <form class="logout-button" action="driver.php" method="get">
            <button type="submit" name="logout">Išsiregistruoti</button>
        </form>
        <form class="choose-button-vechile">
            <button type="button" name="chooseOther">Pasirinkti kitą automobilį</button>
        </form>

        <div id="chooseVechileDiv">
            <select id="select-vechile-driver" name="">
                <?php $result = selectAllVechiles ($connection);
                    while ($row = mysqli_fetch_array($result)) { ?>
                        <option class="optionClass" value="<?php echo $row['TABLE_NAME'] ?>"><?php echo (str_replace("_"," ", $row['TABLE_NAME'])) ?></option>
                    <?php } ?>
            </select>
            <script type="text/javascript">
                document.getElementById('select-vechile-driver').value = "<?php echo $_SESSION['selectedVechile'];?>";
            </script>
        </div>

<?php
if(isset($_GET['chooseOther'])){
    header( "Location: index.php" );
};

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
if(isset($_GET['logout'])){
    $_SESSION['username'] = "";
    header( "Location: index.php" );
};

if(isset($_GET['selectVechile'])){
    $_SESSION['selectedVechile'] = $_GET['vechile'];
    $selectedVechile = $_SESSION['selectedVechile'];
};
if(isset($selectedVechile)) {
$selectedVechile = $_SESSION['selectedVechile'];
}
else {
$selectedVechile = $_SESSION['selectedVechile'];
}

if ($ajaxVechile['ajax_vechile_name' != ""]) {
    $selectedVechile = $ajaxVechile['ajax_vechile_name'];
    $_SESSION['selectedVechile'] = $selectedVechile;
}




?>
<br />
<h3 class="text-center panel2">Esate prisijungę kaip <?php echo $_SESSION['username']?></h3>
<br />
<h3 class="text-center">Pasirinktas automobilis - <?php echo (str_replace("_"," ", $selectedVechile)) ?></h3>
<div class="container-fluid">
<form class="mt-5" id="ani" action="process.php" method="get">
    <table class="mx-auto">
        <tr class="tableRow">
            <th class="text-center">Nr</th>
            <th class="date-formation text-center">Data</th>
            <th class="route-formation text-center">Maršrutas</th>
            <th class="departed-formation text-center">Išvyko iš<br /> terminalo</th>
            <th class=" text-center">Spidometro <br /> parodymai</th>
            <th class=" text-center">Atvyko pas<br /> klientą</th>
            <th class=" text-center">Iškrovimas<br /> min</th>
            <th class=" text-center">Išvyko iš<br /> kliento</th>
            <th class=" text-center">Atvyko į<br /> terminalą</th>
            <th class=" text-center">Spidometro<br /> parodymai</th>
            <th class=" text-center">Atstumas</th>
            <!-- <th class=" text-center">Kuras</th> -->
        </tr>



    <?php if(isset($_GET['submit_driver_details']) || isset($_SESSION['selectedVechile'])){
                if (isset($_SESSION['error'])) {
                ?>  <p class="error text-center"><?php echo ($_SESSION['error']);?> </p>
                <?php $_SESSION['error'] = "";
                }
                $selectedVechile = $_SESSION['selectedVechile'];
                $result = getVechileData ($connection, $selectedVechile, $_SESSION['username']);
                $fuel_usage = getFuelUsage ($connection, $selectedVechile);
                $fl_staying = $fuel_usage['fl_staying'];
                $fl_going = $fuel_usage['fl_going'];
                $fl_loading =  $fuel_usage['fl_loading'];
                    while ($row = mysqli_fetch_array($result)) : ?>
                    <tr>
                    <td class="text-center inn"><?php echo $row['id']?></td>
                    <td class="date-formation text-center inn"><?php echo $row['date']?></td>
                    <td class="route-formation text-center inn"><?php echo $row['dayRoute']?></td>
                    <td class="departed-formation text-center inn"><?php echo date('H:i', strtotime($row['departed']))?></td>
                    <td class=" text-center inn"><?php echo $row['speedo_start']?></td>
                    <td class=" text-center inn"><?php echo date('H:i', strtotime($row['arrived_to_client']))?></td>
                    <td class=" text-center inn"><?php echo $row['protracted']?></td>
                    <td class=" text-center inn"><?php echo date('H:i', strtotime($row['departed_from_client']))?></td>
                    <td class=" text-center inn"><?php echo date('H:i', strtotime($row['arrived']))?></td>
                    <td class=" text-center inn"><?php echo $row['speedo_finish']?></td>
                    <td class=" text-center inn"><?php echo $row['distance']?></td>
                    <!-- <td class=" text-center inn"> -->
                        <!-- <?php echo $row['fuel']?> -->
                    <!-- </td> -->
                    </tr>
                    <?php endwhile;


            }

            $last = getLastQuery($connection, $selectedVechile);
            $last_speedo = $last['speedo_finish'];

            ?>

        <tr>
            <td></td> <!--NR -->
            <td><input class="date-formating text-center span2" type="text" name="date" value="" data-date-format="yyyy-mm-dd" id="dp2" required placeholder="Pasirinkite datą"></td>
            <td><input class="route-formation text-center" type="text" name="dayRoute" value="" placeholder="Įveskite maršrutą"></td>
            <td><input class="timepicker text-center" type="text" name="departed" placeholder="Pasirinkite laiką"></td>
            <td><input class="text-center" type="number" name="speedo_start" value="<?php echo $last_speedo ?>" min="<?php echo $last_speedo ?>" required></td>
            <td><input class="timepicker text-center" type="text" name="arrived_to_client" placeholder="Pasirinkite laiką"></td>
            <td>        <select class="protracted-formation text-center" name="protracted">
                            <?php $i=0;while ($i<=100) { ?>
                                <option class="text-center" value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php $i +=10; } ?>
                        </select>
            </td>
            <td><input class="timepicker text-center" type="text" name="departed_from_client" value="" placeholder="Pasirinkite laiką"></td>
            <td><input class="timepicker text-center" type="text" name="arrived" value="" placeholder="Pasirinkite laiką"></td>
            <td><input class="text-center" type="number" name="speedo_finish" value="" required placeholder="Įveskite kilometrus"></td>
            <td><button class="driver-button" type="submit text-center" name="submit_driver_details" value="1">Įrašyti įrašą</button></td>
        </tr>

    </table>
</form>
</div>


<script src="./libs/jQuery/jquery-3.2.1.min.js"></script>
<script src="./libs/bootstrap/js/bootstrap.min.js"></script>
<script src="./libs/datepicker/js/foundation-datepicker.js"></script>
<script src="./libs/timepicki/js/timepicki.js"></script>
<script type="text/javascript" src="./js/script.js"></script>

</body>
</html>
