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
    $this->dbname = "nfq";

    $conn = new mysqli ($this->servername, $this->username, $this->password, $this->dbname);
    mysqli_query($conn, "SET NAMES 'utf8'");
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    } 
    return $conn;
  }
}
?>
