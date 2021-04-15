<!-- This file is create to create class object -->
<?php
  require_once 'vendor/autoload.php';
  use Src\Calculator;
  $obj = new Calculator();
  //Condition to check if number1 and number2 is set
  if (isset($_GET['num1']) && isset($_GET['num2'])) {
    //call the function to get output from the calc function
    $obj->calc($_GET['num1'],$_GET['num2'],$_GET['operator']);
  }
  else{
    echo "Filed is empty";
  }
?>
