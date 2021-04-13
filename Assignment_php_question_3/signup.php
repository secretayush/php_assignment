<?php
  //create object of register class
  include 'Register.php';
  $obj = new Register();
  //if button is set then run below code
  if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $obj->signup($_POST['username'],$_POST['password'],$_POST['question'],$_POST['answer']);
  }
 ?>
<!DOCTYPE html>
<html>
<head>
  <title>Sign up</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
  <div class="container">
  <h1>Sign up</h1>
  <!-- Signup form -->
  <form action="" method="post">
    <label for="username">Username : </label>
    <input type="text" name="username"><br><br>
    <label for="password">Password : </label>
    <input type="password" name="password"><br><br>
    <label for="question">Security question : </label>
    <select name="question">
      <option value="dob">What is your DOB?</option>
      <option value="place">What is your place of birth?</option>
      <option value="mother_toung">What is your mother toung?</option>
      <option value="best_friend">What is your best friend name?</option>
    </select><br><br>
    <label for="answer">Answer : </label>
    <input type="text" name="answer"><br><br>
    <input type="submit" name="register" value="Sign UP">
  </form>
  <!-- redirect to the login page -->
  <div>
    <a href="index.php">Sign in</a>
  </div>
</div>
</body>
</html>
