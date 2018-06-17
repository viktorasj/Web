<?php
include_once ('database_functions.php');

if(isset($_POST["sumbited_news"])) {
  $title = $_POST['title'];
  $content = $_POST['content'];
  addNews($connection, $title, $content);
  header('Location: edit_news.php');
}

if(isset($_POST['deleteSelectedNews'])) {
    foreach ($_POST['checkedNews'] as $newsId){
        deleteSelectedNews ($connection, $newsId);
        header('Location: edit_news.php');

    }
}

if(isset($_POST['deleteSelectedNews'])) {
  if ($_POST['checkedNews'] == 0) {
    header('Location: edit_news.php');
  }
}


 ?>
