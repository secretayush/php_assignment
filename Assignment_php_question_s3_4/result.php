<!-- This file is create to create class object -->
<?php
  include 'Form.php';
  $obj = new Form();
  //Condition to check if number1 and number2 is set
  if (!empty($_GET['mail'])) {
    //Send form data in the below function
    $obj->send_data(trim($_GET['fname']),trim($_GET['lname']),trim($_GET['mail']));
  }
  else{
    echo "Email should not be empty";
  }
?>
