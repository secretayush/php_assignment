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
    public function arrsort($arr) {
      usort($arr,function($a,$b){
        return $a['pd'] <=> $b['pd'];
      });
      return $arr;
    }
    public function arrange(){
      $data = $this->arrsort($this->data);
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
