<?php
namespace innoraft;
/**
  * User registration and login
  */
 class Register
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
    define('DB_NAME', 'register');
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
   * Login function to check login credentials and login the user using session
   */
  public function login($username,$password)
  {
    //This script will start session to check user is loged in or set user logedin
    session_start();
    if (isset($_SESSION['username'])) {
      header("location:welcome.php");
    }
    //check if username is empty
    if (empty(trim($username))||empty(trim($password))) {
      $result = "User name cannot be blank";
    }
    else{
      //trim input username and password
      $username = trim($username);
      $password = trim($password);
      // query selects only if login id and password matches
      $sql = "select * from user where username = '".$username."' AND approve = 1";
      $data = $this->conn->query($sql);
      if (empty($data)) {
        $result = "Something is wrong!!";
      }
      else{
        $pass_db = mysqli_fetch_assoc($data);
        if (password_verify($password, $pass_db['password'])) {
          $result = "Loged In!!";
          $row = mysqli_fetch_assoc($data);
          $_SESSION['username'] = $row['username'];
          header("location:welcome.php");
        }
        else{
          $result = "Invalid Password or account is not verified!!";
        }
      }
    }
  return $result;
  }
  /**
   * Signup and register new user in data base
   */
  public function signup($username,$password,$question,$answer)
  {
    //trim input username and password
    $username = trim($username);
    $password = trim($password);
    $question = trim($question);
    $answer = trim($answer);
    //check if any filed is empty
    if (empty($username) || empty($password) || empty($question) || empty($answer)) {
      echo "Filed is empty";
    }
    else{
      //change password into hash code
      $password = password_hash($password, PASSWORD_DEFAULT);
      $sql = 'insert into user(username, password, sec_question, sec_answer) values("'.$username.'","'.$password.'","'.$question.'","'.$answer.'")';
      $data = $this->conn->query($sql);
      if (!$data) {
        echo "Already registerd";
      }
      else{
        //Sucessfull signup redirect to the login page
        header("location:index.php");
      }
    }
  }
  /**
   * Show the user data in admin pannle
   */
  public function show_user()
  {
    $sql = "select * from user  where approve = 0";
    $result = $this->conn->query($sql);
    return $result;
  }
  /**
   * Aprove user from admin dashboard
   */
  public function approve_user($username)
  {
    //update the approve value to 1 and set user can login
    $sql = 'update user set approve = 1 where username="'.$username.'"';
    $data = $this->conn->query($sql);
    if ($data) {
      header("location:admin.php");
    }
  }
  /**
   * Forgot password function handles the modification of pass of valid user
   */
  public function forgot($username,$question,$answer,$new_pass)
  {
    //trim input username and password
    $username = trim($username);
    $question = trim($question);
    $answer = trim($answer);
    //check if any filed is empty
    if (empty($username) || empty($question) || empty($answer)) {
      echo "<div>Filed is empty</div>";
    }
    else{
      $sql = 'select * from user where username="'.$username.'" AND sec_question="'.$question.'" AND sec_answer="'.$answer.'"';
      $data = $this->conn->query($sql);
      $row = mysqli_fetch_assoc($data);
      if ($row['username'] == $username) {
        // header("location:mofify.php");
          $password = password_hash($new_pass, PASSWORD_DEFAULT);
          $sql1 = 'update user set password="'.$password.'" where username="'.$username.'"';
          $data1 = $this->conn->query($sql1);
          if ($data1) {
            header("location:index.php");
          }
          else{
            echo "<div>something is wrong!!</div>";
          }
      }
      else{
        echo "<div>Question , answer or username dosenot matched!!</div>";
      }
    }
  }
}
?>
