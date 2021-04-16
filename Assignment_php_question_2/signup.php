<?php
//autoloder to load the todo class
require_once 'vendor/autoload.php';

use Src\Register;

$obj = new Register();
$result = "";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $result = $obj->signup($_POST['username'], $_POST['password'], $_POST['question'], $_POST['answer']);
}
if ($result) {
  header("location:index.php");
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>Sign up</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
  <div class="container text-center w-50 pt-5">
    <h1>Sign up</h1>
    <form action="" method="post" class="input mb-3 shadow p-3 mb-5 bg-white rounded bg-warning">
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
      <input type="submit" name="register" value="Sign UP" class="btn btn-primary">
    </form>
    <!-- login button -->
    <div>
      <button class="btn btn-danger m-3 px-5">
        <a href="index.php">Sign in</a>
      </button>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>

</body>

</html>