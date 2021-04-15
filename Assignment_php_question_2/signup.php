<?php
  //autoloder to load the todo class
  require_once 'vendor/autoload.php';
  use Src\Register;
  $obj = new Register();
  $result = "";
  if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $result = $obj->signup($_POST['username'],$_POST['password'],$_POST['question'],$_POST['answer']);
  }
  if ($result) {
    header("location:index.php");
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
  <div>
    <a href="index.php">Sign in</a>
  </div>
</div>
</body>
</html>
