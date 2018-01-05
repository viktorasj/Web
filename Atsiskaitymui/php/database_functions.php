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

function createIframe($connect, $src, $href, $label, $imageLink) {
    $my_sql = "INSERT INTO iframes VALUES('','$src','$href','$label', '$imageLink')";
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
function getAlbumById ($connect, $id) {
    $my_sql = "SELECT * FROM iframes where id=$id";
    $result = mysqli_query($connect, $my_sql);
    $result = mysqli_fetch_assoc($result);
    return $result;
    }



function addMessage ($connect, $name, $email, $message) {
    $my_sql = "INSERT INTO messages VALUES('','$name','$email','$message', NOW())";
    $result = mysqli_query($connect, $my_sql);
}

function getMessages ($connect) {
    $my_sql = "SELECT * FROM messages ORDER BY date DESC";
    $result = mysqli_query($connect, $my_sql);
    return $result;
}
function deleteAllMessages ($connect) {
    $my_sql = "DELETE FROM `messages`";
    mysqli_query($connect, $my_sql);
}
function deleteMessages ($connect, $id) {
    $my_sql = "DELETE FROM `messages`WHERE id=$id";
    mysqli_query($connect, $my_sql);
}



function getAboutArticle ($connect) {
    $my_sql = "SELECT article FROM articles where id=1";
    $result = mysqli_query($connect, $my_sql);
    $result = mysqli_fetch_assoc($result);
    return $result;
}

function updateAboutArticle ($connect, $textToSend) {
    $textToSend = mysqli_real_escape_string($connect, $textToSend);
    $my_sql = "UPDATE articles SET article = '$textToSend' WHERE id=1";
    $result = mysqli_query($connect, $my_sql);
}

function getLogin ($connect) {
    $my_sql = "SELECT * FROM users";
    $result = mysqli_query($connect, $my_sql);
    return $result;
}
function deleteUsers ($connect, $id) {
    $my_sql = "DELETE FROM `users`WHERE id=$id";
    mysqli_query($connect, $my_sql);
}
function addUsers ($connect, $name, $password, $status) {
    $my_sql = "INSERT INTO users VALUES('','$name','$password','$status')";
    $result = mysqli_query($connect, $my_sql);
}

function addImagePath($connect, $image_path, $thumb_path) {
    $my_sql = "INSERT INTO images VALUES('','$image_path','$thumb_path')";
    $result = mysqli_query($connect, $my_sql);
}

function getImagePaths ($connect) {
    $my_sql = "SELECT * FROM images";
    $result = mysqli_query($connect, $my_sql);
    return $result;
    }

function deleteImagePaths ($connect, $id) {
    $my_sql = "DELETE FROM `images` WHERE id=$id";
    $result = mysqli_query($connect, $my_sql);
}

function getImagePathsById ($connect, $id) {
    $my_sql = "SELECT * FROM images where id=$id";
    $result = mysqli_query($connect, $my_sql);
    $result = mysqli_fetch_assoc($result);
    return $result;
    }

function getLastColor ($connect) {
    $my_sql = "SELECT * FROM color ORDER BY id DESC";
    $result = mysqli_query($connect, $my_sql);
    $result = mysqli_fetch_assoc($result);
    return $result;
    }

function addNewColor ($connect, $color_code) {
    $my_sql = "INSERT INTO color VALUES('','main','$color_code')";
    $result = mysqli_query($connect, $my_sql);
}

function getLasts ($connect) {
    $my_sql = "SELECT * FROM color ORDER BY id";
    $result = mysqli_query($connect, $my_sql);
    if (mysqli_num_rows($result)>=3){
        $start = mysqli_num_rows($result)-3;
        $my_sql = "SELECT * FROM color WHERE id != (SELECT MAX(id) FROM color) ORDER BY id LIMIT $start, 3";
        $result = mysqli_query($connect, $my_sql);
        return $result;
    }
    return $result;
}



 ?>
