<?php
/**
 * Class to create queries
 */
class Employee
{
  // declaring connection varibale
  public $conn;
    function __construct()
    {
      //connecting database to php code
      define('DB_SERVER', 'localhost');
      define('DB_USERNAME', 'ayush');
      define('DB_PASSWORD', 'Ayush@123');
      define('DB_NAME', 'employee');
      // establishing connection to mysql server
      $this->conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);
      // condition to check if connection is properly established or nor
      if (mysqli_connect_errno()) {
        // connection faild
        echo "error in connection to database!!!";
      }
    }
    // close connect to database
    function __destruct(){
      $this->conn->close();
    }
    //query function which returns result of all question solution
    public function query($select='',$from='',$where='',$other='')
    {
      //dynamic query generator to generate querys using parameters
      $query = "select ".$select." from ".$from." where ".$where." ".$other."";
      //send query to mysql server
      $result = $this->conn->query($query);
      return $result;
    }
}
?>
