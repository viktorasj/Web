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
    $this->dbname = "orca";

    $conn = new mysqli ($this->servername, $this->username, $this->password, $this->dbname);
    mysqli_query($conn, "SET NAMES 'utf8'");
    return $conn;
  }
}
?>
