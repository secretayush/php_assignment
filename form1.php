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

      // cond to check valid string or not

      if ( empty($f_name) || empty($l_name)) {

        echo "Field is empty<br>";
        include "php_assin1.html";
      }
      elseif ((ctype_alpha($f_name) == false) || (ctype_alpha($l_name) == false)) {
        echo "Not a valid name";
        include "php_assin1.html";
      }
      else{

        $full_name = $_POST['fullname'];
        echo "Hello ".$full_name;
      }


  }
  else{
     echo "Not a post method<br>";
  }

?>
</body>
</html>
