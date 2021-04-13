<?php
/**
 * Todo list class to create a todo list of logedin user
 */
class Todo
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
    define('DB_NAME', 'todo_database');
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
      header("location:todo_list.php");
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
      $sql = "select * from users where username = '".$username."' AND password = '".$password."'";
      $data = $this->conn->query($sql);
      if (empty($data)) {
        $result = "Username or password is incorect!!";
      }
      else{
        $result = "Loged In!!";
        $row = mysqli_fetch_assoc($data);
        $_SESSION['username'] = $row['username'];
        header("location:todo_list.php");
      }
    }
  return $result;
  }
  /**
   * Add task to todo list of particular user.
   */
  public function add_task($task){
    $sql = "insert into todo_list(task, user) values('".$task."','".$_SESSION['username']."')";
    $result = $this->conn->query($sql);
    return $result;
  }
  /**
   * Show task to todo list of particular user.
   */
  public function show_task(){
    $sql = "select * from todo_list  where user='".$_SESSION['username']."'";
    $result = $this->conn->query($sql);
    return $result;
  }
  /**
   * Delete task from to todo list of particular user.
   */
  public function delete_task($task_id){
    $sql = "delete from todo_list where todo_id=".$task_id."";
    $result = $this->conn->query($sql);
    if ($result) {
      header("location:todo_list.php");
    }
    else{
      echo "Something is wrong";
    }
  }
}
?>
