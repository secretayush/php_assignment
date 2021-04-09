<?php
/**
  * class to store and show code snippets
  */
  class Code
  {
    // then connection varable to establish connection between the database and php code file
    public $conn;
    function __construct()
    {
      //connecting database to php code
      define('DB_SERVER', 'localhost');
      define('DB_USERNAME', 'ayush');
      define('DB_PASSWORD', 'Ayush@123');
      define('DB_NAME', 'code_snippets');
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
    //upload data in database
    public function upload_code($desc,$lang,$code_snippet)
    {
      // condition to check if any data is empty
      if (empty($desc)||empty($lang)||empty($code_snippet)) {
        $result = "Field is empyty.";
      }
      //calling query insert function to insert the data in databse
      elseif ($this->query_insert($desc,$lang,$code_snippet)) {
        $result = "Uploaded snippets!";
      }
      //else store these some problem
      else{
        $result = "Data is not inserted in database !!";
      }
      // return the result
      return $result;
    }
    // function to insert discription ,language and snippet in mysql database
    public function query_insert($desc,$lang,$code_snippet)
    {
      //dynamic query generator to generate querys using parameters
      $query = 'insert into code(code_dec,code_snippet,code_lang) values("'.$desc.'","'.$code_snippet.'","'.$lang.'")';
      //send query to mysql server
      $result = $this->conn->query($query);
      return $result;
    }
    // query to show data from database
    public function query_show($select='',$from='')
    {
      //dynamic query generator to generate querys using parameters
      $query = "select ".$select." from ".$from;
      //send query to mysql server
      $result = $this->conn->query($query);
      return $result;
    }
  }
?>
