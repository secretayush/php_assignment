<!DOCTYPE html>
<html>
<head>
  <title>Form submit</title>
</head>
<body>
  <!-- 1st assignment -->
  <?php
  // cond to check if post request
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {

      $f_name =  $_POST["fname"];
      $l_name =  $_POST["lname"];
      $full_name = "Not a valid input";
      $flag = 0;

      // cond to check valid string or not
      if (($f_name == "") and ($l_name != "") and (ctype_alpha($l_name))) {
              $flag = 1;
              $full_name = $_POST['lname'];
      }
      elseif (($l_name == "") and ($f_name != "") and (ctype_alpha($f_name))) {
            $flag = 1;
            $full_name = $_POST['fname'];
      }
      elseif (($l_name != "") and ($f_name != "") and ((ctype_alpha($f_name)) and (ctype_alpha($l_name)))) {
            $flag = 1;
            $full_name = $_POST['fullname'];

      }


      // flag check cond
      if ($flag === 1) {
          $full_name = "Hello ".$full_name."<br>";
      }

      // assignment 2

      $file = $_FILES['file']['name'];
      // file's original path
      $temp_name = $_FILES['file']['tmp_name'];


      // move the uploaded file to the upload folder
      $upload_file_check = move_uploaded_file($temp_name,$file);
      $file_prop = explode('.',$file);

      // cond to check if image is properly uploaded or not
      if ($upload_file_check) {

        echo "<br><img src=".$file." title=".$file_prop[0]." height='300px' width='200px' alt=".$file_prop[0]."><br>";
      }
      else{
        echo "Image is not properly uploaded.<br>";
      }

    echo $full_name;

  }
  else{
     echo "Not a post method<br>";
  }

?>
</body>
</html>
