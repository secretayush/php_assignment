<?php
  /**
   * Student class to store student operations
   */
  class Student
  {
    public $student;
    public $subject;

    function __construct($student,$subject)
    {
      $this->student = $student;
      $this->subject = $subject;
    }
    public function subject_fetch($grade){
      // $temp = array();
      foreach ($this->subject as $key => $value){
        if ($grade == $key) {
          for ($i=0; $i < sizeof($value); $i++){
            $temp[$i] = $value[$i];
          }
        }
      }
      return $temp;
    }
    public function student_marks($id){
      $temp = array();
      for ($i=0; $i < sizeof($this->student); $i++) {
        if ($id == $this->student[$i]['id']) {
          $temp = $this->student[$i]['marks'];
        }
      }
      return $temp;
    }
    public function result(){
      $check = 0;
      for ($i=0; $i < sizeof($this->student); $i++) {
        $count_p = 0;
        $count_f = 0;
        $result = "nil";
        $str_return .= "<tr>
        <td>".$this->student[$i]['name']."</td>
        <td>".$this->student[$i]['dob']."</td>
        <td>".$this->student[$i]['grade']."</td>
        <td>";
        foreach ($this->subject[$this->student[$i]['grade']] as $j => $val){
          //stores min marks of respective sub
          $check = $this->subject[$this->student[$i]['grade']][$j]['min'];
          //loop through student marks
          foreach ($this->student[$i]['marks'] as $key => $value) {
            if ($key == $this->subject[$this->student[$i]['grade']][$j]['id']) {
              //cond to check if pass or fail
              $str_return .= $key."(".$value." , ".$check.")<br>";
              if ($value >= $check) {
                $count_p += 1;
              }
              else{
                $count_f += 1;
              }
            }
          }
        }
        //if not appered then fail
        $total_sub = sizeof($this->subject[$this->student[$i]['grade']]);
        $count_f = $count_f + ($total_sub- sizeof($this->student[$i]['marks']));
        for ($x=0; $x < ($total_sub- sizeof($this->student[$i]['marks'])); $x++) {
          $str_return .= "Not appered<br>";
        }
        //percentage calculate
        $per = ($count_f/$total_sub)*100;
        // cond to check result
        if ($per > 60) {
          $result = 'Fail';
        }
        else{
          $result = 'Pass';
        }
          $str_return .= "</td><td>".$result."</td></tr>";
      }
      return $str_return;
    }
  }
?>
