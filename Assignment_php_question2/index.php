<!--
Php code to get rondom link from giphy api
Please add your key to run this code properly from giphy website. -->
<?php
  include 'Api.php';
  $obj = new Api();
  $link = $obj->get_random_gif();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Giphy</title>
  <!-- Includeing styles file -->
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
  <!-- Container to containe gif -->
  <div class="container">
    <?php
      echo "<img src='".$link." alter='Somthing is wrong'>";
     ?>
  </div>
</body>
</html>
