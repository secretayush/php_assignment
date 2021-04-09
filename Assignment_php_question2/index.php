<!-- php code to get rondom link from giphy api -->
<?php
  //api key
  $key = 'MOHdjBbgPYP7qQmZH9aQ3E5l201ZJXCL';
  // main url of api
  $url = 'https://api.giphy.com/v1/gifs/random?api_key='.$key.'&tag=&rating=g';
  include 'Api.php';
  //create object og class Api
  $obj = new Api($url);
  //store url link in varible
  $link = $obj->get_random_gif();
?>
<!DOCTYPE html>
<html>
<head>
  <title>2nd assignment</title>
  <!-- includeing styles file -->
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
  <!-- container to containe gif -->
  <div class="container">
    <!-- php code to display the gif using img tag -->
    <?php
      echo "<img src='".$link." alter='Somthing is wrong'>";
     ?>
  </div>
</body>
</html>
