<?php
    define("DB_HOST", "localhost");
    define("DB_USER", "root");
    define("DB_PASS", "root");
    define("DB_NAME", "core");

$connection = mysqli_connect (DB_HOST, DB_USER, DB_PASS, DB_NAME);

function insertVechileData ($connect, $date, $dayRoute, $departed, $speedo_start, $arrived_to_client, $protracted, $departed_from_client, $arrived, $speedo_finish, $speedo, $fuel, $selectedVechile, $driver, $going_time, $staying_time, $loading_time ){
    $my_sql = "INSERT INTO $selectedVechile VALUES('', '$date','$dayRoute','$departed','$speedo_start','$arrived_to_client','$protracted','$departed_from_client','$arrived','$speedo_finish','$speedo','$fuel', '$driver', '$selectedVechile', '$going_time', '$staying_time', '$loading_time')";
    $result = mysqli_query($connect, $my_sql);
}

function selectAllVechiles ($connect) {
    $my_sql = "SHOW TABLES FROM core";
    $result = mysqli_query($connect, $my_sql);
    $finish = mysqli_num_rows($result);
    $my_sql = "SELECT TABLE_NAME from information_schema.tables WHERE TABLE_SCHEMA = SCHEMA() AND TABLE_NAME NOT LIKE '%\_pri' ";
    $result = mysqli_query($connect, $my_sql);
    return $result;
}



function getVechileData ($connect, $selectedVechile, $driver) {
    $my_sql = "SELECT * FROM $selectedVechile WHERE driver='$driver' ORDER BY id";
    $result = mysqli_query($connect, $my_sql);
    if (mysqli_num_rows($result)>=10){
        $start = mysqli_num_rows($result)-10;
        $my_sql = "SELECT * FROM $selectedVechile ORDER BY id LIMIT $start, 10";
        $result = mysqli_query($connect, $my_sql);
        return $result;
    }
    return $result;
}

function getFuelUsage ($connect, $selectedVechile) {
    $my_sql = "SELECT * FROM 2fuel_usage_pri WHERE vechile_name = '$selectedVechile'";
    $result = mysqli_query($connect, $my_sql);
    $result = mysqli_fetch_array($result);
    return $result;
}

function getAllFuelUsage ($connect) {
    $my_sql = "SELECT * FROM 2fuel_usage_pri";
    $result = mysqli_query($connect, $my_sql);
    return $result;
}


function getLastQuery($connect, $selectedVechile) {
    $my_sql = "SELECT * FROM $selectedVechile ORDER BY id DESC LIMIT 1";
    $result = mysqli_query($connect, $my_sql);
    $result = mysqli_fetch_array($result);
    return $result;
}

function getLogin ($connect) {
    $my_sql = "SELECT * FROM 1users_pri";
    $result = mysqli_query($connect, $my_sql);
    return $result;
}

function getDrivers ($connect) {
    $my_sql = "SELECT * FROM 1users_pri WHERE status='driver'";
    $result = mysqli_query($connect, $my_sql);
    return $result;
}

function addDriver ($connect, $driverName, $driverPassword) {
    $my_sql = "INSERT INTO 1users_pri VALUES ('','$driverName', '$driverPassword', 'driver')";
    $result = mysqli_query($connect, $my_sql);
}

function deleteDriver ($connect, $driverName){
    $my_sql = "DELETE FROM 1users_pri WHERE username = '$driverName'";
    $result = mysqli_query($connect, $my_sql);
}

function getData ($connect, $driver, $month) {
    $vechiles = selectAllVechiles ($connect);
    $vechiles_array = [];
    $result = [];
    while($row = mysqli_fetch_array($vechiles)):
        $vechiles_array[] = ($row['TABLE_NAME']);
    endwhile;
    for ($i=0; $i < count($vechiles_array); $i++) {
        $my_sql = "SELECT * FROM $vechiles_array[$i] WHERE driver='$driver' AND MONTH(date) = '$month'";
        $temp = mysqli_query($connect, $my_sql);
        $result[] = $temp;
    }
    return $result;
    if (!$result) {
    printf("Error: %s\n", mysqli_error($conect));
    exit();
}
}

function addVechile ($connect, $toAddVechile, $toAddFl_staying, $toAddFl_going, $toAddFl_loading) {
    $my_sql = "CREATE TABLE $toAddVechile (
                id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                date DATE,
                dayRoute VARCHAR(255),
                departed TIME,
                speedo_start INT(11),
                arrived_to_client TIME,
                protracted INT(4),
                departed_from_client TIME,
                arrived TIME,
                speedo_finish INT(11),
                distance INT(11),
                fuel INT(11),
                driver VARCHAR(20),
                vechile_name VARCHAR(30),
                going_time INT (11),
                staying_time INT (11),
                loading_time INT (11)
); INSERT INTO 2fuel_usage_pri VALUES('','$toAddVechile','$toAddFl_staying','$toAddFl_going','$toAddFl_loading')";
$result = mysqli_multi_query ($connect, $my_sql);
if(!$result){
    echo mysqli_error($connect);
}
}

function removeVechiles ($connect, $vechileToRemove) {
    $my_sql = "DROP TABLE $vechileToRemove";
    $result = mysqli_query ($connect, $my_sql);
    if(!$result){
            echo mysqli_error($connect);
    }
}

function removeFromFuelTable ($connect, $vechileToRemove) {
    $my_sql = "DELETE FROM 2fuel_usage_pri WHERE vechile_name = '$vechileToRemove'";
    $result = mysqli_query ($connect, $my_sql);
    if(!$result){
            echo mysqli_error($connect);
    }
}

function setAjaxVechile ($connect, $ajaxVechileName) {
    $my_sql = "UPDATE 3temp_set_pri
                       SET
                           	ajax_vechile_name = '$ajaxVechileName'
                       WHERE id=1
                 ";
    $result = mysqli_query($connect, $my_sql);
}

function getAjaxVechile ($connect) {
    $my_sql = "SELECT * FROM 3temp_set_pri WHERE id=1";
    $result = mysqli_query($connect, $my_sql);
    return $result;
}

function initAjaxVechile ($connect) {
    $my_sql = "UPDATE 3temp_set_pri SET ajax_vechile_name = '' WHERE id=1";
    $result = mysqli_query($connect, $my_sql);
}

?>
