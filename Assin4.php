<?php
    // cond to check if post request
    class Assin4{
        public $l_name;
        public $file;
        public $mark;
        public $pattern;
        public $f_name;
        public $mob_no;
        public $check;
        public $temp_name;  
        function __construct(){
            $this->l_name =  $_POST["lname"];
            $this->f_name =  $_POST["fname"];
            $this->file = $_FILES['file']['name'];
            $this->mark = $_POST['marks'];
            $this->pattern = "/[A-Za-z]+\|[0-9]+/";
            $this->mob_no = $_POST['mob_no'];
            $this->check = "/\+91+[0-9]{10}/";
            $this->temp_name = $_FILES['file']['tmp_name'];       //move the uploaded file to the upload folder
        }
        public function get_data(){
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // cond to check valid string or not
                if ( empty($this->f_name) || empty($this->l_name)) {
                  echo "Name field is empty<br>";
                  include "php_assin4_oop.php";
                }
                elseif ((ctype_alpha($this->f_name) == false) || (ctype_alpha($this->l_name) == false)) {
                  echo "Not a valid name";
                  include "php_assin4_oop.php";
                }
                elseif (empty($this->file)) {
                  echo "Please include image file.";
                  include "php_assin4_oop.php";
                }
                elseif ((empty($this->mark)) || (preg_match($this->pattern,$this->mark) == 0)){
                  echo "Please enter marks properly.<br>";
                  include "php_assin4_oop.php";
                }
                // condition to check if indian and valid number or not
                elseif (preg_match($this->check,$this->mob_no)==0) {
                  echo "Moble number is invalid.<br>";
                  include "php_assin4_oop.php";
                }
                else{
                  // assignment 2
                  $upload_file_check = move_uploaded_file($this->temp_name,$this->file);
                  $file_prop = explode('.',$this->file);
                  // cond to check if image is properly uploaded or not
                  if ($upload_file_check) {
                    echo "<br><img src='".$this->file."' title='".$file_prop[0]."' height='300px' width='200px' alt='".$file_prop[0]."'><br>";
                    echo $_POST['fullname'];      //print full name under the image
                  }
                  else{
                    echo "Image is not properly uploaded.<br>";
                    include "php_assin4_oop.php";
                  }
                  //assignment 3
                  // 1d array of marks and subject togther
                  $mark_arr = array('');
                  $k=0;
                  $this->mark = explode("\n",$this->mark);
                  // 2d array of marks table
                  foreach ($this->mark as $value) {
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
                  </tr>";
                  for($i=0;$i<count($mark_arr);$i++){
                    echo "<tr>
                            <td>".$mark_arr[$i][0]."</td>
                            <td>".$mark_arr[$i][1]."</td>
                            </tr>";
                  }
                  echo "</table>";
                  echo "<br>Accepted Indain number and the length of mobile number is 10 and Moble number is ".$this->mob_no;
                }
              }
              else{
                echo "Not a post method<br>";
              }
        }
    }
    $obj = new Assin4();
    $obj->get_data();
?>
