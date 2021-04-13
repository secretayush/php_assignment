<?php
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
      $sql = "select * from user where username = '".$username."'";
      $data = $this->conn->query($sql);
      if (empty($data)) {
        $result = "Username is invalid Register asap!!";
      }
      else{
        $pass_db = mysqli_fetch_assoc($data);
        if (password_verify($password, $pass_db['password'])) {
          $result = "Loged In!!";
          $row = mysqli_fetch_assoc($data);
          $_SESSION['username'] = $row['username'];
          header("location:welcome.php");
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
      $password = password_hash($password, PASSWORD_DEFAULT);
      $sql = 'insert into user(username, password, sec_question, sec_answer) values("'.$username.'","'.$password.'","'.$question.'","'.$answer.'")';

      $data = $this->conn->query($sql);
      if (!$data) {
        echo "Something is wrong";
      }
    }
  }
  /**
   * Forgot password function handles the modification of pass of valid user
   * id = ayush
   * pass qaz
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
