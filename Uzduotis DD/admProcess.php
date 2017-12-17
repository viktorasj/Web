<?php
include_once ('functions.php');
include_once ('db_functions.php');


if (isset($_GET['addVechile'])) {
    $toAddVechile = $_GET['toAddVechile'];
    $toAddFl_staying = $_GET['toAddFl_staying'];
    $toAddFl_going = $_GET['toAddFl_going'];
    $toAddFl_loading = $_GET['toAddFl_loading'];

    $toAddVechile = str_replace(" ","_", $toAddVechile);
    $toAddVechile = str_replace("_pri","", $toAddVechile);

    addVechile ($connection, $toAddVechile, $toAddFl_staying, $toAddFl_going, $toAddFl_loading);
    header( "Location: adminSide.php" );

}

if (isset($_GET['deleteSelected'])) {
    foreach ($_GET['checked'] as $value) {
        $checked[] = $value;
    }
    foreach ($checked as $vechileToRemove) {
        removeVechiles ($connection, $vechileToRemove);
        removeFromFuelTable ($connection, $vechileToRemove);
    }
    header( "Location: adminSide.php" );
}

if (isset($_GET['addNewDriver'])) {
     $driverName = $_GET['newDriver'];
     $driverPassword = $_GET['newDriverPassword'];
     addDriver ($connection, $driverName, $driverPassword);
     header( "Location: adminSide.php" );
 }

 if (isset($_GET['deleteSelectedDrivers'])) {
     foreach ($_GET['checked'] as $value) {
         $checked[] = $value;
     }
     foreach ($checked as $driverToDelete) {
         deleteDriver ($connection, $driverToDelete);
     }
     header( "Location: adminSide.php" );
 }



 ?>
