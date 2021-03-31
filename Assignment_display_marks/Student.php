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
    public function get_data()
    {
      // $this->show_details($this->student);
      // $this->show_details($this->subject);
    }
    public function subject_fetch($grade){
      echo "<br>Subject : <br>";
      $flag = 0;
      foreach ($this->subject as $key => $value){
        if ($grade == $key) {
          $flag = 1;
          for ($i=0; $i < sizeof($value); $i++){
            foreach ($value[$i] as $k => $v) {
              echo $k." : ".$v."<br>";
            }
          }
        }
      }
      if ($flag == 0) {
        echo "<br>Not found grade!!";
      }
    }
    public function student_marks($id){
      $flag = 0;
      echo "<br>Marks list : <br>";
      for ($i=0; $i < sizeof($this->student); $i++) {
        if ($id == $this->student[$i]['id']) {
          $flag = 1;
          foreach ($this->student[$i]['marks'] as $key => $value) {
            echo $key." : ".$value."<br>";
          }
        }
      }
      if ($flag == 0) {
        echo "<br>Details not found!!!";
      }
    }
    public function result(){

      $check = 0;
      for ($i=0; $i < sizeof($this->student); $i++) {
        $count_p = 0;
        $count_f = 0;
        $result = "nil";
        echo "<tr>
        <td>".$this->student[$i]['name']."</td>
        <td>".$this->student[$i]['dob']."</td>
        <td>".$this->student[$i]['grade']."</td>
        <td>";
        for ($j=0; $j < sizeof($this->subject[$this->student[$i]['grade']]); $j++) {
          //stores min marks of respective sub
          $check = $this->subject[$this->student[$i]['grade']][$j]['min'];
          //loop through student marks
          foreach ($this->student[$i]['marks'] as $key => $value) {
            if ($key == $this->subject[$this->student[$i]['grade']][$j]['id']) {
              //cond to check if pass or fail
              echo $key."(".$value." , ".$check.")<br>";
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
          echo "Not appered<br>";
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
          echo "</td><td>".$result."</td></tr>";
      }
    }
    public function show_details($student){
      for ($i=0; $i < sizeof($student); $i++) {
        foreach ($student[$i] as $key => $value) {
          print_r("<br>".$value);
        }
      }
    }
  }
?>
