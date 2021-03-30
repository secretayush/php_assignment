<?php
  //class contains diff of 2 matrix
  class Matrix{
    public $size;
    public $mat_1;
    function __construct($size){
      $this->size = $size;
    }
    //function to show table of given size
    public function table()
    {
      echo "<br>Table:<br>";
      // loop through to print table of numbers
      for ($i=1; $i <= $this->size; $i++) {
        echo "<tr>";
        for ($j=1; $j <= $this->size; $j++) {
          echo "<th>".$i."*".$j."=".($i*$j)."</th>";
        }
        echo "</tr>";
      }
    }
  }
?>
