<?php
include_once ('db_functions.php');
include_once ('driver.php');
include_once ('functions.php');

if(isset($_GET['ajaxVechile'])){
    setAjaxVechile ($connection, $_GET['ajaxVechile']);
    header( "Location: driver.php" );
}


if(isset ($_GET['submit_driver_details'])) {
        session_start ();
        $selectedVechile = $_SESSION['selectedVechile'];
        $date = $_GET['date'];
        $_SESSION['testinis'] = $date;
        $dayRoute = $_GET['dayRoute'];
        $departed = $_GET['departed'];
        $speedo_start = $_GET['speedo_start'];
        $arrived_to_client = $_GET['arrived_to_client'];
        $protracted = $_GET['protracted'];
        $departed_from_client = $_GET['departed_from_client'];
        $arrived = $_GET['arrived'];
        $speedo_finish = $_GET['speedo_finish'];

        $last = getLastQuery($connection, $selectedVechile);
        $last_speedo = $last['speedo_finish'];

        $fuel_usage = getFuelUsage ($connection, $selectedVechile);
        $fl_staying = $fuel_usage['fl_staying'];
        $fl_going = $fuel_usage['fl_going'];
        $fl_loading =  $fuel_usage['fl_loading'];

        $departed_minutes = hoursToMinutes($departed);
        $arrived_to_client_minutes = hoursToMinutes($arrived_to_client);
        $departed_from_client_minutes = hoursToMinutes($departed_from_client);
        $arrived_minutes = hoursToMinutes($arrived);

        $fuel = vechileFuelUssage ($departed_minutes, $arrived_to_client_minutes, $protracted, $departed_from_client_minutes, $arrived_minutes, $fl_going, $fl_staying, $fl_loading);
        $driver = $_SESSION['username'];
        $speedo = $speedo_finish-$speedo_start;

        if (($arrived_to_client_minutes - $departed_minutes)<= 0 ) {
            $_SESSION['error'] = "Blogai įvesti išvykimo iš terminalo arba atvykimo pas klientą laikai";
            header( "Location: driver.php" );
        }
        elseif (($departed_from_client_minutes-$arrived_to_client_minutes) <= 0){
            $_SESSION['error'] = "Blogai įvesti atvykimo pas klientą arba išvykimo iš kliento laikai";
            header( "Location: driver.php" );
        }
        elseif(($arrived_minutes-$departed_from_client_minutes) <= 0){
            $_SESSION['error'] = "Blogai įvesti išvykimo iš kliento arba atvykimo į terminalą laikai";
            header( "Location: driver.php" );
        }
        elseif(($protracted + $arrived_to_client_minutes) > $departed_from_client_minutes){
            $_SESSION['error'] = "Blogai įvesti arvykimo pas klientą, krovimo arba išvykimo iš kliento laikai";
            header( "Location: driver.php" );
        }
        elseif($speedo_start>$speedo_finish){
            $_SESSION['error'] = "Blogai įvesti spidometro parodymai";
            header( "Location: driver.php" );
        }
        // elseif ($speedo_start>$last_speedo) {
        //     $_SESSION['error'] = "Isvykimo spidometro parodymai didesni uz paskutinio atvykimo";
        //     header( "Location: driver.php" );
        // }
        else{
            echo $date." ".$dayRoute." ".$departed." ".$speedo_start." ".$arrived_to_client." ".$protracted." ".$departed_from_client." ".$arrived." ".$speedo_finish." ".$speedo." ".$fuel." ".$selectedVechile." ".$driver;
            // $_SESSION['error'] = $fuel;
        insertVechileData ($connection, $date, $dayRoute, $departed, $speedo_start, $arrived_to_client, $protracted, $departed_from_client, $arrived, $speedo_finish, $speedo, $fuel, $selectedVechile, $driver, $_SESSION['going_time'], $_SESSION['staying_time'], $_SESSION['loading_time']);
        header( "Location: driver.php" );
}

}



?>
