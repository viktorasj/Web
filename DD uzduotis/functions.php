<?php
session_start ();
function hoursToMinutes($xxs)
{
    $time=$xxs;
        $timesplit=explode(':',$time);
        $min=($timesplit[0]*60)+($timesplit[1]);
        return $min;
}



function vechileFuelUssage ($departed_minutes, $arrived_to_client_minutes, $protracted, $departed_from_client_minutes, $arrived_minutes, $fl_going, $fl_staying, $fl_loading){

    $going_time = (($arrived_to_client_minutes - $departed_minutes) + ($arrived_minutes - $departed_from_client_minutes));
    $_SESSION['going_time'] = $going_time;
    $going_time = $going_time/60;

    $staying_time = ($departed_from_client_minutes-($protracted+$arrived_to_client_minutes));
    $_SESSION['staying_time'] = $staying_time;
    $staying_time = $staying_time/60;

    $loading_time = $protracted/60;
    $_SESSION['loading_time'] = $protracted;

    $vechileFuelUssage = ($going_time * $fl_going) + ($staying_time * $fl_staying) + ($loading_time * $fl_loading);
    // $vechileFuelUssage = round($vechileFuelUssage, 3);
    return $vechileFuelUssage;
}




 ?>
