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
   <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  
 </head>
 <body class="bg-danger">
  <!-- Form to take user info as input -->
  <div class='container-md text-center mt-5 shadow mb-5 bg-light rounded p-5'>
    <h1 class="text-danger mb-3">Login in</h1>
    <form action="" method="post">
      <button name="google" class="btn btn-primary px-3">Login Using Google</button><br><br>
      <button name="github"class="btn btn-primary px-3  ">Loin Using Github</button><br><br>
    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
 </body>
 </html>
