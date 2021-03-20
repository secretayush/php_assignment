<!DOCTYPE html>
<html>
<head>
  <title>Assignment</title>
</head>
<body>
  <?php
  // start session to check if logedin or not
  session_start();
  if (!isset($_SESSION['username']) || ($_SESSION['exp_time'] < time())){
    $data = '
      <h1>Login page!</h1>

      <form action="login.php" method="post" enctype="multipart/form-data">

        <!-- using post method to send the data to assin.php file -->
        <label for="username">User name: </label>
        <input type="text" name="username" placeholder="username = user"><br><br>


        <label for="pass">Password: </label>
        <input type="password" name="pass" placeholder="password = 123"><br><br>

        <!-- on button click it will trigger the assin.php file -->
        <button>login</button><br>
      </form>
      ';
    echo $data;
  
  }

  else{
    echo 'Already logedin';
    include 'menu.php';
  }
  ?>
</body>
</html>
