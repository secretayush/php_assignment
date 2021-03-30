<?php
  //class contains diff of 2 matrix
  class Matrix{
    public $mat_1;
    public $mat_2;
    function __construct($mat_1,$mat_2){
      $this->mat_1 = $mat_1;
      $this->mat_2 = $mat_2;
    }
    //matrix function checks size of 2d matrix
    public function matrix_function()
    {
      if (sizeof($this->mat_1) != sizeof($this->mat_2)) {
        echo "Size of matrix is not equal";
      }
      else{
        echo "Matrix 1:<br>";
        $this->show_matrix($this->mat_1);
        echo "<br>Matrix 2: <br>";
        $this->show_matrix($this->mat_2);
        echo "<br>Difference of 2 matrix : <br>";
        $diff_mat = $this->diff_matrix($this->mat_1,$this->mat_2);
        $this->show_matrix($diff_mat);
      }
    }
    //function to find diffrence of 2 matrix
    public function diff_matrix($mat_1,$mat_2){
      $diff_mat;
      for ($i=0; $i < sizeof($mat_1); $i++) {
        for ($j=0; $j <sizeof($mat_1); $j++) {
          $diff = abs($mat_2[$i][$j]-$mat_1[$i][$j]);
          $diff_mat[$i][$j] = " ".$diff." ";
        }
      }
      return $diff_mat;
    }
    //function to show matrix
    public function show_matrix($matrix){
      for ($i=0; $i < sizeof($matrix); $i++) {
        for ($j=0; $j <sizeof($matrix); $j++) {
          echo " ".$matrix[$i][$j]." ";
        }
        echo "<br>";
        }
    }
  }

?>
