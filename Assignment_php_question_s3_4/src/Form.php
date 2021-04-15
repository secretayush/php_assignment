<?php
  namespace Src;
  /**
  * Add data into form using ajax
  */
 class Form{
  public $conn;
  /**
   * Construction to connect database to php code
   * initilize the connection varable of class.
  */
  function __construct()
  {
    //connecting database to php code
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'ayush');
    define('DB_PASSWORD', 'Ayush@123');
    define('DB_NAME', 'form_ajax');
    // establishing connection to mysql server
    $this->conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);
    // condition to check if connection is properly established or nor
    if (mysqli_connect_errno()) {
      echo "Error in connection to database!!!";
    }
  }
  /**
   *  Close connect to database.
   */
  function __destruct(){
    $this->conn->close();
  }
  /**
   * Insert data in the database also check if email id is already inserted or not
   */
  public function send_data($fname,$lname,$mail)
  {
    $sql = 'select * from info where email ="'.$mail.'"';
    $data = $this->conn->query($sql);
    // Condition to check if data is already present in data base or not
    if (mysqli_num_rows($data) == 0) {
      $sql = 'insert into info values("'.$fname.'","'.$lname.'","'.$mail.'")';
      $data = $this->conn->query($sql);
      $result = "<div align='center'>Data inserted in Database</div>";
    }
    else{
      $result = "<div align='center'>Data is already inserted</div>";
    }
    echo $result;
  }
 }
 ?>
