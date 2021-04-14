<?php
  //Including the feed php file to create object of class
  include 'Feed.php';
  $obj = new Feed();
  if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $obj->show_feed();
  }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Form using ajax</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
  <div class="container">
    <!-- condition to check if the sumbit button is set or not -->
    <?php if (!isset($_POST['submit'])) { ?>
    <h1>Send Twetter feeds</h1>
    <form action="" method="post">
      <button name="submit" id="send">Show feed</button>
    </form>
  <?php } ?>
  </div>
</body>
</html>
