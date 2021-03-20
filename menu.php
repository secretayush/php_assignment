<?php
  session_start();
  if (isset($_SESSION['username']) && ( $_SESSION['exp_time'] > time())) {
    $data = "
    <h1>Welcome to the menu page</h1>
    <a href='php_assin1.php'>Assignment 1</a><br>
    <a href='php_assin2.php'>Assignment 2</a><br>
    <a href='php_assin3.php'>Assignment 3</a><br>
    <a href='php_assin4.php'>Assignment 4</a><br>
    <a href='php_assin5.php'>Assignment 5</a><br>
    <a href='php_assin6.php'>Assignment 6</a><br><br><br>
    <a href='logout.php'>Click to logout</a><br>

    ";
    echo $data;

  }
  else{
    echo "Please login";
    include 'php_assin7.php';
  }

?>
