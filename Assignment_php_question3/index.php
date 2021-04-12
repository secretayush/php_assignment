<!-- php code to send the data in database and disply the photo galary -->
<?php
  //including gallery class and creating object of gallery class
  include 'Gallery.php';
  $obj = new Gallery();
  //run the below code when upload button is clicked
  if (isset($_POST['upload'])) {
    $file = $_FILES['file']['name'];
    $temp_name = $_FILES['file']['tmp_name'];
    $desc = $_POST['desc'];
    $result = $obj->upload_image($file,$temp_name,$desc);
  }
  //run the code when gallery button is clicked
  if (isset($_POST['gallery'])) {
    $data = $obj->query_show('*','image');
  }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Gallery assignment</title>
  <!-- incluing style sheet -->
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
  <!-- main container -->
  <div class="container">
    <!-- first flex box -->
    <div class="flex1">
      <!-- form to upload data in database  -->
      <form method="post" action="" enctype="multipart/form-data">
        <!-- add discription of image -->
        <label for="desc">Add discription : </label>
        <input type="text" name="desc"><br><br>
        <label for="file">Upload image :</label>
        <input type="file" name="file"><br><br>
        <input type="submit" name="upload" value="upload">
        <!-- show message that code is uploaded or not -->
        <div class="result">
          <?php echo $result; ?>
        </div>
      </form>
    </div>
    <!-- second flex box -->
    <div class="flex2">
      <!-- set the button when shw gallery is clicked and display all the images -->
      <form method="post" action="">
        <button name="gallery">Show galley</button>
      </form>
      <div class="box">
        <!-- fetching images from database and showng them on web page -->
        <?php
          if (isset($data)) {
            // travasing through and creating gallery of images
            while ($row = mysqli_fetch_assoc($data)) {
              // display images from the data base using path varaible
              echo "<div class='gallery'>
              <img src='".$row['img_path']."' alter='".$row['img_dec']."' height='150px' width='200px'>
              <div>".$row['img_dec']."</div>
              </div>";
            }
          }
        ?>
      </div>
    </div>
  </div>
</body>
</html>
