<?php
  /**
     * Class containg operations of college
     */
    class College
    {
      public $college_data;
      public $doc;
      function __construct($college_data,$doc)
      {
        $this->college_data = $college_data;
        $this->doc = $doc;
      }
      public function college_info(){
        $temp = array();
        foreach ($this->college_data as $key => $value) {
          foreach ($value as $k => $v) {
            $temp[$key][$k] = $v;
          }
        }
        foreach ($this->doc as $key => $value) {
          foreach ($value as $k => $v) {
            if ($k != 'doc_college') {
              $temp[$key][$k] = $v;
            }
          }
          //if doc_college is empty then store all college details
          if (empty($value['doc_college'])) {
            $temp[$key]['doc_college'] = $this->college_data;
          }
          //cond for success or fail
          if ($temp[$key]['sent'] == 1) {
            $temp[$key]['sent'] = 'Success';
          }
          else{
            $temp[$key]['sent'] = 'Fail';
          }
        }
        return $temp;
      }
    }
?>
