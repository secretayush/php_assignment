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
        $this->doc = $doc;
        $this->college_data = $college_data;
      }
      public function college_info(){
        $temp = array();
        foreach ($this->college_data as $key => $value) {
          foreach ($value as $key1 => $value1) {
            $temp[$key][$key1] = $value1;       // key = 0 k=id
          }
          foreach ($this->doc[$key] as $key2 => $value2){
            if ($key2 == 'doc_sent' && $value2 == 1) {
              $this->doc[$key]->doc_sent = 'Success';
            }
            if ($key2 == 'doc_sent' && $value2 == 0){
              $this->doc[$key]->doc_sent = 'Fail';
            }
            //if doc_college is empty then store all college details
            if ($key2 == 'doc_college' && empty($value2)) {
              $temp[$key]['doc'] = $this->doc;
            }
            elseif($key2 == 'doc_college' && $value2 == $value['id']){
              $temp[$key]['doc'] = $this->doc[$key];
            }
          }
        }
        return $temp;
      }
    }
?>
