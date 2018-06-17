<?php
class dbh {
  private $servername;
  private $username;
  private $password;
  private $dbname;

  protected function connect() {
    $this->servername = "localhost";
    $this->username = "root";
    $this->password = "root";
    $this->dbname = "serrano";

    $conn = new mysqli ($this->servername, $this->username, $this->password, $this->dbname);
    mysqli_query($conn, "SET NAMES 'utf8'");
    return $conn;
  }
}

    // function createPizza($connect, $name , $ing , $pr_1 ,  $pr_2 ,  $lnk1 ,  $lnk2 ,  $cat ) {
    //     $my_sql = "INSERT INTO pizza VALUES('','$name','$ing','$pr_1', '$pr_2', '$lnk1', '$lnk2', '$cat')";
    //     $result = mysqli_query($connect, $my_sql);
    // }
    //
    // function getPizzas($connect) {
    //     $my_sql = "SELECT * FROM pizza";
    //     $result = mysqli_query($connect, $my_sql);
    //     // $result = mysqli_fetch_assoc($result);
    //     return $result;
    // }
    //
    // function getSalad($connect) {
    //     $my_sql = "SELECT * FROM salad";
    //     $result = mysqli_query($connect, $my_sql);
    //     // $result = mysqli_fetch_assoc($result);
    //     return $result;
    // }
    //
    //
    //


?>
