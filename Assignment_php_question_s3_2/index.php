<?php
  require_once 'vendor/autoload.php';
  use Src\User;
  $obj = new User();
  if ($_SERVER['REQUEST_METHOD'] == "POST") {
    //stores the information abouth the system
    $obj->getinfo();
  }
?>
<!DOCTYPE html>
<html>
<head>
  <title>User info</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<body class="bg-light">
  <div class="container-md text-center mt-5 shadow mb-5 bg-light rounded p-5">
    <h1 class="mb-4">Show the local system information</h1>
    <form action="" method="post">
      <button name="show" class="btn btn-primary px-3">Show details</button>
    </form>
    <!--Condition to check if button is set then show information -->
    <?php if (isset($_POST['show'])) { ?>
    <ul class="list-group mt-3">
      <li class="list-group-item">Header : <?php echo $obj->header; ?></li>
      <li class="list-group-item">Browser : <?php echo $obj->browser; ?></li>
      <li class="list-group-item">User name : <?php echo $obj->username; ?></li>
      <li class="list-group-item">OS info : <?php echo $obj->osinfo; ?></li>
    </ul>
  <?php } ?>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
 
</body>
</html>
