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
  <title>User info</title></head>
<body>
  <div class="container">
    <h1>Show the local system information</h1>
    <form action="" method="post">
      <button name="show">Show details</button>
    </form>
    <!--Condition to check if button is set then show information -->
    <?php if (isset($_POST['show'])) { ?>
    <ul>
      <li>Header : <?php echo $obj->header; ?></li>
      <li>Browser : <?php echo $obj->browser; ?></li>
      <li>User name : <?php echo $obj->username; ?></li>
      <li>OS info : <?php echo $obj->osinfo; ?></li>
    </ul>
  <?php } ?>
  </div>
</body>
</html>
