<?php
/**
  * Class to store and show code snippets contain.
  * varable:
  * conn to establish connection
  * methods:
  * upload code
  * show code
  * query to insert
  */
  class Code
  {
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
      define('DB_NAME', 'code_snippets');
      // establishing connection to mysql server
      $this->conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);
      // condition to check if connection is properly established or nor
      if (mysqli_connect_errno()) {
        // connection faild
        echo "error in connection to database!!!";
      }
    }
    /**
    *Close connect to database.
    */
    function __destruct(){
      $this->conn->close();
    }
    /**
     * Upload data in database the function takes discription , language and code snippet.
    */
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
      else{
        $result = "Data is not inserted in database !!";
      }
      return $result;
    }
    /**
     * Function to insert discription ,language and snippet in mysql database
    */
    public function query_insert($desc,$lang,$code_snippet)
    {
      $query = 'insert into code(code_dec,code_snippet,code_lang) values("'.$desc.'","'.$code_snippet.'","'.$lang.'")';
      $result = $this->conn->query($query);
      return $result;
    }
    /**
     * Query to show code data from database.
    */
    public function query_show($select='',$from='')
    {
      $query = "select ".$select." from ".$from;
      $result = $this->conn->query($query);
      return $result;
    }
  }
?>
