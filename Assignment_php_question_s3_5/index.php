<?php
  //Including the feed php file to create object of class
  require_once 'vendor/autoload.php';
  use Src\Feed;
  $obj = new Feed();
  if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $obj->show_feed();
  }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Tweets from twitter Api</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  
</head>
<body>
  <div class="container-md text-center mt-5 shadow mb-5 bg-light rounded p-5">
    <!-- condition to check if the sumbit button is set or not -->
    <?php if (!isset($_POST['submit'])) { ?>
    <h1>Send Twetter feeds</h1>
    <form action="" method="post">
      <button name="submit" id="send" class="btn btn-primary px-3">Show feed</button>
    </form>
  <?php } ?>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
 
</body>
</html>
