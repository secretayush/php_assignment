<?php
  //using autoload psr4 to load todo class
  require_once 'vendor/autoload.php';
  use Src\Todo;
  $obj = new Todo();
  $result = "";
  if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $result = $obj->login($_POST['user'],$_POST['pass']);
  }
 ?>
 <!DOCTYPE html>
 <html>
 <head>
   <title>Assignment 1</title>
   <link rel="stylesheet" type="text/css" href="styles.css">
 </head>
 <body>
  <!-- Form to take user info as input -->
  <div class='container'>
    <h1>Login to create todo list!</h1>
    <form action="" method="post">
      <label for="user">Username : </label>
      <input type="text" name="user" placeholder="ayush"><br><br>
      <label for="pass">Password : </label>
      <input type="password" name="pass" placeholder="12345"><br><br>
      <input type="submit" name="login" value="Login">
      <?php echo $result; ?>
    </form>
  </div>
 </body>
 </html>
