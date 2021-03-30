<?php
  //class contains diff of 2 matrix
  class Matrix{
    public $mat_1;
    public $mat_2;
    function __construct(){
      $this->mat_1 = array(
        array(5,4,5),
        array(4,5,4),
        array(5,4,5)
      );
      $this->mat_2 = array(
        array(1,1,1),
        array(2,2,2),
        array(3,3,3)
      );
    }
    public function diff()
    {
      if (sizeof($mat_1) != sizeof($mat_2)) {
        echo "Size of matrix is not equal";
      }
      else{
        echo "Matrix 1:<br>";
        for ($i=0; $i < sizeof($this->mat_1); $i++) {
          for ($j=0; $j <sizeof($this->mat_1); $j++) {
            echo " ".$this->mat_1[$i][$j]." ";
          }
          echo "<br>";
        }
        echo "<br>Matrix 2: <br>";
        for ($i=0; $i < sizeof($this->mat_1); $i++) {
          for ($j=0; $j <sizeof($this->mat_1); $j++) {
            echo " ".$this->mat_2[$i][$j]." ";
          }
          echo "<br>";
        }
        echo "<br>Difference of 2 matrix : <br>";
        for ($i=0; $i < sizeof($this->mat_1); $i++) {
          for ($j=0; $j <sizeof($this->mat_1); $j++) {
            $diff = abs($this->mat_2[$i][$j]-$this->mat_1[$i][$j]);
            echo " ".$diff." ";
          }
          echo "<br>";
        }
      }
    }
  }

?>
