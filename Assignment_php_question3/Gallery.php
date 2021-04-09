<?php
/**
  * class of gallary images
  */
  class Gallery
  {
    public $conn;
    function __construct()
    {
      //connecting database to php code
      define('DB_SERVER', 'localhost');
      define('DB_USERNAME', 'ayush');
      define('DB_PASSWORD', 'Ayush@123');
      define('DB_NAME', 'gallery');
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
    public function upload_image($file,$temp_name,$desc)
    {
      $path = 'uploads/'.$file;
      if (empty($file)) {
        $result = "Please include image file.";
      }
      // move the uploaded file to the upload to server folder
      $upload_file_check = move_uploaded_file($temp_name,$path);
       if ($upload_file_check) {
        if ($this->query_insert('image',$desc,$path)) {
          $result = "inserted and uploaded!";
        }
        else{
          $result = "wrong!!";
        }
       }
       else{
        $result = "wrong";
       }
       return $result;
    }
    // function to insert discription and path of image in mysql database
    public function query_insert($insert,$desc,$path)
    {
      //dynamic query generator to generate querys using parameters
      $query = "insert into ".$insert."(img_dec,img_path) values('".$desc."', '".$path."')";
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
