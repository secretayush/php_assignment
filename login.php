<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_POST['username'];
  $pass = $_POST['pass'];
  if (($username !== 'user') || ($pass !== '123')) {    //checking credentials
    echo "Invalid username and password try again!!!";
    include 'php_assin7.php';
  }
  else{
    session_start();
    $_SESSION['username'] = $username;         // set to check login cond
    $_SESSION['q'] = $_GET['q'];
    include('query.php');
  }
}
else{
  echo "Error 404 not found!!!";
}
?>
