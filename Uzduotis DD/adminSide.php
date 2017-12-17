<!DOCTYPE html>
<html>
    <head>
        <title>AdminSide</title>
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

if(isset($_GET['logout'])){
    $_SESSION['username'] = "";
    header( "Location: index.php" );
};
?>


<div class="container-fuid">
    <div class="row mb-3">
        <div class="col-md-12">
            <form class="logout-button" action="adminSide.php" method="get">
                <button type="submit" name="logout">Išsiregistruoti</button>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-md-5">
            <button class="btn btn-lg btn-primary btn-block mx-auto" id="showDrivers" type="button">Įtraukti naują/ ištrinti vairuotoją</button>
                    <form class="" action="admProcess.php" method="get">
                        <div id="divForShowingDrivers" class="mx-auto">
                        <table class="mx-auto full-table-font-size mt-2">
                            <tr>
                                <th class="bn"></th>
                                <th class="text-center">Vairuotojo vardas</th>
                                <th class="text-center">Vairuotojo slaptazodis</th>
                            </tr>
                            <?php $driversList = getDrivers ($connection);
                            while($row = mysqli_fetch_array($driversList)) { ?>
                                <tr>
                                    <td class="bn"><input type="checkbox" name="checked[]" value="<?php echo $row['username']?>"></td>
                                    <td class="text-center"><?php echo $row['username'] ?></td>
                                    <td class="text-center"><?php echo $row['password'] ?></td>
                                </tr>
                            <?php } ?>
                            <tr>
                                <td class="bn"></td>
                                <td class="bn text-center"><input  type="text" name="newDriver" value="" placeholder="Vairuotojas"> </td>
                                <td class="bn text-center"><input  type="text" name="newDriverPassword" value="" placeholder="Slaptazodis"> </td>
                            </tr>
                        </table>
                        <div class="buttons-from-driver-table">
                            <button class="text-center" type="submit" name="addNewDriver" value="">Įtraukti naują vairuotoją</button>
                            <button class="text-center" type="submit" name="deleteSelectedDrivers" value="">Ištrinti pažymėtus vaituotojus</button>
                        </div>
                        </div>
                    </form>
        </div>
        <div class="col">
            <button class="btn btn-lg btn-primary btn-block mx-auto" type="button" id="showVechiles" >Automobiliai ir kuro normos</button>
            <form class="" action="admProcess.php" method="get">
                <div id="divForShowingVechiles" class="mx-auto">
                <table class="full-table-font-size mx-auto mt-2">
                    <tr>
                        <th class="bn"></th>
                        <th class="text-center">Automobilis</th>
                        <th class="text-center">Stovint l/h</th>
                        <th class="text-center">Važiuojant l/h</th>
                        <th class="text-center">Kraunant l/h</th>
                    </tr>
                    <tr>
                        <?php
                        $allFuelUssages = getAllFuelUsage ($connection);
                        while($row = mysqli_fetch_array($allFuelUssages)){?>
                            <td class="bn"><input type="checkbox" name="checked[]" value="<?php echo $row['vechile_name']?>"></td>
                            <td class="text-center"><?php echo (str_replace("_"," ", $row['vechile_name'])) ?></td>
                            <td class="text-center"><?php echo $row['fl_staying']?></td>
                            <td class="text-center"><?php echo $row['fl_going']?></td>
                            <td class="text-center"><?php echo $row['fl_loading']?></td>
                        </tr>
                    <?php } ?>
                    <tr>
                        <td class="bn"></td>
                        <td class="bn"><input class="text-center" type="text" name="toAddVechile" value="" placeholder="Įveskite automobilį"> </td>
                        <td class="bn"><input class="text-center" type="number" name="toAddFl_staying" value="" placeholder="Kuro norma stovint"> </td>
                        <td class="bn"><input class="text-center" type="number" name="toAddFl_going" value="" placeholder="Kuro norma vaziuojant"> </td>
                        <td class="bn"><input class="text-center" type="number" name="toAddFl_loading" value="" placeholder="Kuro norma kraunantis"> </td>
                    </tr>
                </table>
                <div class="buttons-from-vechiles-table">
                    <button type="submit" name="addVechile">Įvesti automobilį</button>
                    <button type="submit" name="deleteSelected">Ištrinti pažymėtus</button>
                </div>
                </div>
            </form>
    </div>
</div>


<form class="" action="adminSide.php" method="get">
    <div class="row mt-5 panel2">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="text-center">Pasirinkite vairuotoją</h3>
                </div>
                <div class="col-md-6">
                    <h3 class="text-center">Pasirinkite mėnesį: </h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <select class="form-control2 chooseSelect" name="driver" id="driver" >
                        <?php
                        $test = getDrivers($connection);
                        print_r($test);
                        while ($row = mysqli_fetch_array($test)) : ?>
                            <option value="<?php echo($row['username']) ?>"><?php echo($row['username']) ?></option>
                    <?php endwhile; ?>
                    </select>
                    <script type="text/javascript">
                        document.getElementById('driver').value = "<?php echo $_GET['driver'] ?>";
                    </script>
                </div>
                <div class="col-md-6">
                    <select class="form-control2 chooseSelect text-center" name="month" id="selectedMonth">
                        <?php
                        for ($i=1; $i <= 12; $i++) { ?>
                            <option value="<?php echo $i ?>"><?php echo $i ?></option>
                    <?php    } ?>
                    </select>

                    <script type="text/javascript">
                        document.getElementById('selectedMonth').value = "<?php echo $_GET['month'];?>";
                    </script>
                </div>
            </div>
        </div>
                <div class="col-md-4">
                    <button class="choose-button btn btn-lg btn-primary btn-block" type="submit" name="selection">Pasirinkti</button>
                </div>
    </div>
</form>
    <div class="row panel2">
        <div class="col-md-4">
            <?php
            if (isset($_GET['selection'])) {
                $_SESSION['selectedDriver'] = $_GET['driver'];
                $_SESSION['selectedMonth'] = $_GET['month'];
            }

            if (isset($_SESSION['selectedDriver']) && isset($_SESSION['selectedMonth'])){
            ?>
            <p class="text-center">Pasirinktas vairuotojas: <?php echo $_SESSION['selectedDriver'] ?></p>

        </div>
        <div class="col-md-4">
            <p class="text-center">Pasirinktas mėnesis: <?php echo $_SESSION['selectedMonth'] ?></p>
            <?php

                $result = getData ($connection, $_SESSION['selectedDriver'], $_SESSION['selectedMonth']);
            }
            ?>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-12">
            <table class="mx-auto table-formating">
                <tr class="tableRow">
                    <th class="adm-1 text-center">Įrašo<br />Nr</th>
                    <th class="adm-2 date-formation text-center">Data</th>
                    <th class="adm-3 route-formation text-center">Maršrutas</th>
                    <th class="adm-4 text-center">Atstumas</th>
                    <th class="adm-5 text-center">Kuras</th>
                    <th class="adm-6 text-center">Vairuotas <br /> automobilis</th>
                    <th class="adm-7 text-center">Važiavo <br />(min)</th>
                    <th class="adm-8 text-center">Sunaudojo kuro <br /> važiuojant (l)</th>
                    <th class="adm-7 text-center">Stovejo <br />(min)</th>
                    <th class="adm-8 text-center">Sunaudojo kuro <br /> stovint (l)</th>
                    <th class="adm-7 text-center">Krovėsi <br />(min)</th>
                    <th class="adm-8 text-center">Sunaudojo kuro <br /> kraudamas (l)</th>
                </tr>
                <?php

                if(isset($_SESSION['selectedDriver']) && isset($_SESSION['selectedMonth'])) {

                $result = getData ($connection, $_SESSION['selectedDriver'], $_SESSION['selectedMonth']);
                for ($i=0; $i < count($result); $i++) {
                        while ($row = mysqli_fetch_array($result[$i])) { ?>
                <tr>
                            <td class="text-center inn"><?php echo $row['id']?></td>
                            <td class="date-formation text-center inn"><?php echo $row['date']?></td>
                            <td class="route-formation text-center inn"><?php echo $row['dayRoute']?></td>
                            <td class=" text-center inn"><?php echo $row['distance']?></td>
                            <td class=" text-center inn"><?php echo $row['fuel']?></td>
                            <td class=" text-center inn"><?php $tempVechileName = str_replace("_"," ", $row['vechile_name']); echo $tempVechileName?></td>
                            <td class=" text-center inn"><?php echo $row['going_time']?></td>
                            <td class=" text-center inn"><?php $resultFl = getFuelUsage ($connection, $row['vechile_name']);
                                                               $goResult = $resultFl['fl_going']*($row['going_time']/60);
                                                               echo round($goResult, 2) ?></td>
                            <td class=" text-center inn"><?php echo $row['staying_time']?></td>
                            <td class=" text-center inn"><?php $resultFl = getFuelUsage ($connection, $row['vechile_name']);
                                                               $goResult = $resultFl['fl_staying']*($row['staying_time']/60);
                                                               echo round($goResult, 2) ?></td>
                            <td class=" text-center inn"><?php echo $row['loading_time']?></td>
                            <td class=" text-center inn"><?php $resultFl = getFuelUsage ($connection, $row['vechile_name']);
                                                               $goResult = $resultFl['fl_loading']*($row['loading_time']/60);
                                                               echo round($goResult, 2) ?></td>
                        <?php }
                    }
                }?>
                </tr>
            </table>
        </div>
    </div>
</div>












    <script src="./libs/jQuery/jquery-3.2.1.min.js"></script>
    <script src="./libs/bootstrap/js/bootstrap.min.js"></script>
    <script src="./libs/datepicker/js/foundation-datepicker.js"></script>
    <script src="./libs/timepicki/js/timepicki.js"></script>
    <script type="text/javascript" src="./js/script.js"></script>
</body>
</html>
