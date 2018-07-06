<?php

function validate ($name, $email, $comment) {
  $output_msg = "false";
    if (!$name || !$email || !$comment) {
      $output_msg = "Palikti tušti laukai";
    }
    elseif (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $output_msg = "Skaičiai varde negalimi";
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $output_msg = "Neteisingai įvestas el. paštas";
    }
  return $output_msg;
}


?>
