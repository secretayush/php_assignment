<?php
  /**
   * Seating arrangement
   */
  class Seat
  {
    public $data;
    function __construct($data)
    {
      $this->data = $data;
    }
    //aranging the students
    public function arrangment()
    {
      $temp_1 = array();
      $temp_2 = array();
      foreach ($this->data as $key => $value) {
        if ($value['gender'] == 'F') {
            array_push($temp_1,$value['name']);
          }
        else{
          array_push($temp_2,$value['name']);
        }
      }
      $j = 0;
      $x = 0;
      $k = 0;
      //running through to fetch alternate student data
      for ($i=0; $i < count($this->data); $i++) {
        if ($i%2 == 0 && count($temp_1)>$j) {
          $temp[$k] = $temp_1[$j];
          $j++;
        }
        else{
          $temp[$k] = $temp_2[$x];
          $x++;
        }
        $k++;
      }
      return $temp;
    }
  }
?>
