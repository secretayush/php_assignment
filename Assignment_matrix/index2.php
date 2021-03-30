<?php
  /**
   * Class to print chess board on web page
   */
  class Chess
  {

    public $size;
    function __construct()
    {
      $this->size = 8;
    }
    public function board(){
      // run through the 8X8 matrix and print the block
      for ($i=0; $i < $this->size; $i++) {
       echo "<div class='box'>";
       for ($j=0; $j < $this->size; $j++) {
        if (($i+$j)%2==0){
          echo "<span class='black_box'></span>";
        }
        else{
          echo "<span class='white_box'></span>";
        }
      }
      echo "</div>";
      }
    }

  }
?>
