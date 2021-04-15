<?php
  require_once 'vendor/autoload.php';
  use login\Login;
  // Create the object of class
  $obj = new Login();
  if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // condition to check which button is set
    if (isset($_POST['google'])) {
      $obj->google_login();
    }
    if (isset($_POST['github'])) {
      $obj->github_login();
    }
  }
 ?>
 <!DOCTYPE html>
 <html>
 <head>
   <title>Login</title>
   <link rel="stylesheet" type="text/css" href="styles.css">
 </head>
 <body>
  <!-- Form to take user info as input -->
  <div class='container'>
    <h1>Login In</h1>
    <form action="" method="post">
      <button name="google" >Login Using Google</button><br><br>
      <button name="github">Loin Using Github</button><br><br>
    </form>
  </div>
 </body>
 </html>
