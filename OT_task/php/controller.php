<?php
include_once ('./db_conn.php');
include_once ('./classes.php');
include_once ('./validation.php');

if(isset($_POST)){
  if ($_POST['request_type'] === "get comment count") {
    $result = new comments();
    $count = $result -> getCommentNr();
    echo ($count);
    }

  if ($_POST['request_type'] === "get all replies") {
    $result = new comments();
    $replies = $result -> getAllReplies();
    $return_arr = [];
    while ($row = mysqli_fetch_assoc($replies)) {
         $row_array['id'] = $row['id'];
         $row_array['name'] = $row['who'];
         $row_array['email'] = $row['email'];
         $row_array['comment'] = $row['reply_comment'];
         $row_array['belongs_to'] = $row['belongs_to_id'];
         $row_array['date'] = $row['date'];
         array_push($return_arr, $row_array);
     }
     echo json_encode($return_arr);
    }
   if ($_POST['request_type'] === "add comment") {
     $error_msg = validate($_POST['name'], $_POST['email'], $_POST['comment']);
     if($error_msg !== "false"){
       $comment_id = [];
       $comment_id['error_msg'] = $error_msg;
       echo json_encode($comment_id);
       return;
     }
     $result = new comments ();
     $comment_id = $result -> addComment ($_POST['email'], $_POST['name'], $_POST['comment']);
     $comment_id = mysqli_fetch_assoc($comment_id);
     $comment_id['error_msg'] = "false";
     echo json_encode($comment_id);
   }

   if ($_POST['request_type'] === "add reply") {
     $error_msg = validate($_POST['name'], $_POST['email'], $_POST['comment']);
     if($error_msg !== "false"){
       $reply = [];
       $reply['error_msg'] = $error_msg;
       echo json_encode($reply);
       return;
     }
     $result = new comments ();
     $reply = $result -> addReply ($_POST['email'], $_POST['name'], $_POST['comment'], $_POST['belongs_to_id']);
     $reply = mysqli_fetch_assoc($reply);
     $reply['error_msg'] = $error_msg;
     echo json_encode($reply);
    }
  }




?>
