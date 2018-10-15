<?php
include_once ('db_conn.php');
include_once ('classes.php');

$result = new comments();
$comments = $result -> getAllComments();
while ($row = mysqli_fetch_assoc($comments)) {
  echo('<div class="row justify-content-sm-center comment" comment_id="'.$row['id'].'">');
  echo('<div class="col-sm-12 comment-area mt-3">');
  echo('<div class="p-1" style="width: 100%">');
  echo('<strong>'.$row['who'].'</strong>');
  echo('<span class="ml-2">'.$row['date'].'</span>');
  echo('<span class="float-right mr-3 reply_btn">');
  echo('<img class="mr-1" src="./svg/reply.svg" alt="reply_icon">Reply</span>');
  echo('</div>');
  echo('<p>'.$row['comment'].'</p>');
  echo('</div>');
  echo('</div>');
}

?>
