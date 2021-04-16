<?php
//using autoload psr4 to load todo class
require_once 'vendor/autoload.php';

use Src\Todo;

$obj = new Todo();
$result = "";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $result = $obj->login($_POST['user'], $_POST['pass']);
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>Assignment 1</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
  <!-- Form to take user info as input -->
  <div class='container text-center w-50 pt-5'>
    <h1 class="text-success mb-5">Login to create todo list!</h1>
    <form action="" method="post" class="input mb-3 shadow p-3 mb-5 bg-white rounded">
      <label for="user">Username : </label>
      <input type="text" name="user" placeholder="ayush"><br><br>
      <label for="pass">Password : </label>
      <input type="password" name="pass" placeholder="12345"><br><br>
      <input type="submit" name="login" value="Login" class="btn btn-info px-3">
      <?php echo $result; ?>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
</body>

</html>