<?php
    define("DB_HOST", "localhost");
    define("DB_USER", "root");
    define("DB_PASS", "root");
    define("DB_NAME", "project");

$connection = mysqli_connect (DB_HOST, DB_USER, DB_PASS, DB_NAME);

function getIframe($connect, $nr) {
    $my_sql = "SELECT * FROM iframes WHERE id=$nr;";
    $result = mysqli_query($connect, $my_sql);
    if($result) {
        $result = mysqli_fetch_assoc($result);
        return $result;
    }

}

function createIframe($connect, $src, $href, $label) {
    $my_sql = "INSERT INTO iframes VALUES('','$src','$href','$label')";
    $result = mysqli_query($connect, $my_sql);
}

function deleteIframe ($connect, $idNr) {
    $my_sql = "DELETE FROM iframes WHERE id=$idNr";
    $result = mysqli_query($connect, $my_sql);
}

 function getIframes ($connect) {
     $my_sql = "SELECT * FROM iframes ORDER BY id ASC";
     $result = mysqli_query($connect, $my_sql);
     return $result;
     // foreach ($result as $value) {
     //    echo $value['id']." ".$value['name']." ".$value['lname']."<br />";
     // }
}

function countIframes ($connect){
    $fullObject = getIframes($connect);
    $counted = mysqli_num_rows($fullObject);
    echo $counted;
}

function getArticle ($connect, $nr) {
    $my_sql = "SELECT * FROM articles WHERE id=$nr;";
    $result = mysqli_query($connect, $my_sql);
    if($result) {
        $result = mysqli_fetch_assoc($result);
        return $result;
    }
}

function getAlbumLinks ($connect) {
    $my_sql = "SELECT artLinks FROM iframes ORDER BY id ASC";
    $result = mysqli_query($connect, $my_sql);
    return $result;
    // foreach ($result as $value) {
    //    echo $value['id']." ".$value['name']." ".$value['lname']."<br />";
    // }
}


function addMessage ($connect, $name, $email, $message) {
    $my_sql = "INSERT INTO messages VALUES('','$name','$email','$message')";
    $result = mysqli_query($connect, $my_sql);
}


 ?>
