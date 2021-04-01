<?php
  /**
   *Product order
   */
  class Product
  {
    public $data;
    function __construct($data)
    {
      $this->data = $data;
    }
    //aranging the students
    public function bubble_sort($arr) {
      $size = count($arr)-1;
      for ($i=0; $i<$size; $i++) {
        for ($j=0; $j<$size-$i; $j++) {
            $k = $j+1;
            if ($arr[$k]['pd'] < $arr[$j]['pd']) {
                // Swap elements at indices: $j, $k
                list($arr[$j], $arr[$k]) = array($arr[$k], $arr[$j]);
            }
        }
      }
    return $arr;
    }
    public function arrange(){
      $data = $this->bubble_sort($this->data);
      for ($i=1; $i < count($data); $i++){
        $tot = 0;
        if ($data[$i]['pd'] == $data[$i-1]['pd']) {
          $tot += $data[$i]['sp']+$data[$i-1]['sp'];
          $data[$i]['sp'] = $tot;
        }
      }
      foreach ($data as $key => $value) {
        $data[$key]['ct'] = $data[$key]['ct']."-".$data[$key]['pd'];
      }
      return $data;
    }
  }
?>
