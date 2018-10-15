<?php

class comments extends dbh {

  public function getCommentNr () {
    $sql = "SELECT *
            FROM comments";
    $result1 = $this->connect()->query($sql);
    $result1 = mysqli_num_rows($result1);
    $sql = "SELECT *
            FROM replies";
    $result2 = $this->connect()->query($sql);
    $result2 = mysqli_num_rows($result2);
    return $result1+$result2;
  }

  public function addComment ($email, $name, $comment) {
    $sql = "INSERT INTO comments VALUES('',
                                     '$name',
                                     '$email',
                                     '$comment',
                                     NOW()
                                      )";
    $result = $this->connect()->query($sql);
    $sql = "SELECT *
            FROM comments
            WHERE id = (SELECT MAX(id) FROM comments)";
    $result = $this->connect()->query($sql);
    return $result;
    if(!$result){
      echo('error adding record');
    }
  }

  public function addReply ($email, $name, $comment, $belongs_to_id) {
    $sql = "INSERT INTO replies VALUES('',
                                     '$name',
                                     '$email',
                                     '$comment',
                                     '$belongs_to_id',
                                     NOW()
                                      )";
    $result = $this->connect()->query($sql);
    $sql = "SELECT date
            FROM replies
            WHERE id = (SELECT MAX(id) FROM replies)";
    $result = $this->connect()->query($sql);
    return $result;
    if(!$result){
      echo('error adding record');
    }
  }

  public function getAllComments(){
    $sql = "SELECT *
            FROM comments
            ORDER BY id
            DESC";
    $result = $this->connect()->query($sql);
    return $result;
    if(!$result){
      echo('error getting records');
    }
  }

  public function getAllReplies(){
    $sql = "SELECT *
            FROM replies
            ORDER BY id
            ASC";
    $result = $this->connect()->query($sql);
    return $result;
    if(!$result){
      echo('error getting records');
    }
  }

}

?>
