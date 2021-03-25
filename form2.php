<?php
// cond to check if post request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $f_name =  $_POST["fname"];
  $l_name =  $_POST["lname"];
  // cond to check valid string or not
  if ( empty($f_name) || empty($l_name)) {
    echo "Field is empty<br>";
    include "php_assin2.php";
  }
  elseif ((ctype_alpha($f_name) == false) || (ctype_alpha($l_name) == false)) {
    echo "Not a valid name";
    include "php_assin2.php";
  }
  else{
    $file = $_FILES['file']['name'];                  // file's original path
    $temp_name = $_FILES['file']['tmp_name'];        // move the uploaded file to the upload folder
    $upload_file_check = move_uploaded_file($temp_name,$file);
    $file_prop = explode('.',$file);
    // cond to check if image is properly uploaded or not
    if ($upload_file_check) {
      echo "<br><img src='".$file."' title='".$file_prop[0]."' height='300px' width='200px' alt='".$file_prop[0]."'><br>";
      //print full name under the image
      echo $_POST['fullname'];
    }
    else{
      echo "Image is not properly uploaded.<br>";
      include "php_assin2.php";
    }
  }
}
else{
   echo "Not a post method<br>";
}
?>
