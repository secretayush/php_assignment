<?php
/**
  * Calculator to calculate 2 numbers
  */
 class Calculator{
  /**
   * This function calculates 2 number using the respective operator
   */
  public function calc($num1,$num2,$operator)
  {
    // switch to ckeck different cases of calculator
    switch ($operator) {
      case 'add':
        $result = $num1+$num2;
        break;
      case 'sub':
        $result = $num1-$num2;
        break;
      case 'mul':
        $result = $num1*$num2;
        break;
      case 'div':
        $result = $num1/$num2;
        break;
      default:
        $result = "Invalid";
        break;
    }
    echo $result;
  }
 }
 ?>
