<?php
// cond to check if post request
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $f_name =  $_POST["fname"];
    $l_name =  $_POST["lname"];
    $file = $_FILES['file']['name'];
    $mark = $_POST['marks'];
    $pattern = "/[A-Za-z]+\|[0-9]+/";
    $mob_no = $_POST['mob_no'];
    $check = "/\+91+[0-9]{10}/";
    // cond to check valid string or not
    if ( empty($f_name) || empty($l_name)) {
      echo "Name field is empty<br>";
      include "php_assin4.php";
    }
    elseif ((ctype_alpha($f_name) == false) || (ctype_alpha($l_name) == false)) {
      echo "Not a valid name";
      include "php_assin4.php";
    }
    elseif (empty($file)) {
      echo "Please include image file.";
      include "php_assin4.php";
    }
    elseif ((empty($mark)) || (preg_match($pattern,$mark) == 0)){
      echo "Please enter marks properly.<br>".$mark;
      include "php_assin4.php";
    }
    // condition to check if indian and valid number or not
    elseif (preg_match($check,$mob_no)==0) {
      echo "Moble number is invalid.<br>";
      include "php_assin4.php";
    }
    else{
      // assignment 2
      $temp_name = $_FILES['file']['tmp_name'];        // move the uploaded file to the upload folder
      $upload_file_check = move_uploaded_file($temp_name,$file);
      $file_prop = explode('.',$file);
      // cond to check if image is properly uploaded or not
      if ($upload_file_check) {
        echo "<br><img src='".$file."' title='".$file_prop[0]."' height='300px' width='200px' alt='".$file_prop[0]."'><br>";
        echo $_POST['fullname'];      //print full name under the image
      }
      else{
        echo "Image is not properly uploaded.<br>";
        include "php_assin4.php";
      }
      //assignment 3
      // 1d array of marks and subject togther
      $mark_arr = array('');
      $k=0;
      $mark = explode("\n",$mark);
      // 2d array of marks table
      foreach ($mark as $key => $value) {
        $value = trim($value);
        if (!empty($value)) {
          $mark_arr[$k] = explode("|",$value);
          $k++;
        }
      }
      echo " <table border='1' cellpadding='5px'>
      <tr>
      <th>Subject</th>
      <th>Marks</th>
      </tr>
      ";
      for($i=0;$i<count($mark_arr);$i++){
        echo "<tr>
                <td>".$mark_arr[$i][0]."</td>
                <td>".$mark_arr[$i][1]."</td>
                </tr>";
      }echo "</table>";
      echo "<br>Accepted Indain number and the length of mobile number is 10 and Moble number is ".$mob_no;
    }
  }
  else{
    echo "Not a post method<br>";
  }
?>

