<?php
  require_once 'vendor/autoload.php';
  use innoraft\Register;
  $obj = new Register();
  if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $obj->forgot($_POST['username'],$_POST['question'],$_POST['answer'],$_POST['new']);
  }
 ?>
<!DOCTYPE html>
<html>
<head>
  <title>Forgot password</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
  <div class="container">
    <h1>Forgot password</h1>
    <form action="" method="post">
      <label for="username">Username : </label>
      <input type="text" name="username"><br><br>
      <label for="question">Security question : </label>
      <select name="question">
        <option value="dob">What is your DOB?</option>
        <option value="place">What is your place of birth?</option>
        <option value="mother_toung">What is your mother toung?</option>
        <option value="best_friend">What is your best friend name?</option>
      </select><br><br>
      <label for="answer">Answer : </label>
      <input type="text" name="answer"><br><br>
      <label for="new">New password : </label>
      <input type="password" name="new"><br><br>
      <input type="submit" name="forgot" value="sumbit">
    </form>
     <div>
      <a href="index.php">Sign in</a>
    </div>
     <div>
      <a href="signup.php">Sign up</a>
    </div>
  </div>
</body>
</html>
