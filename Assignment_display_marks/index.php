<!DOCTYPE html>
<html>
<head>
  <title>Student marks</title>
</head>
<body>
  <?php
    include('Student.php');
    $student = array(
      array('id'=>'st1','name'=>'John','dob'=>'20042000','grade'=>'12','marks'=> array('H' => 16, 'E' => 45)),
      array('id'=>'st2','name'=>'Ram','dob'=>'22042000','grade'=>'9','marks'=> array('H' => 26, 'E' => 40))
    );
    $subject = array(
      '9' => array(
        array('name'=> 'Hindi','id' => 'H', 'min' => '20'),
        array('name'=> 'English','id' => 'E', 'min' => '25'),
        array('name'=> 'Science','id' => 'S', 'min' => '20')
      ),
      '10' => array(
        array('name'=> 'Hindi','id' => 'H', 'min' => '20'),
        array('name'=> 'English','id' => 'E', 'min' => '25'),
        array('name'=> 'Science','id' => 'S', 'min' => '20')
      ),
      '12' => array(
        array('name'=> 'Hindi','id' => 'H', 'min' => '20'),
        array('name'=> 'English','id' => 'E', 'min' => '25'),
        array('name'=> 'Science','id' => 'S', 'min' => '20')
      )
    );
    $obj = new Student($student,$subject);
    $obj->get_data();
    echo ($obj->subject_fetch('12'));
    $obj->student_marks('st1');
  ?>
  <table cellspacing="0px" border="1">
    <tr>
      <th>Name</th>
      <th>DOB</th>
      <th>Grade</th>
      <th>Subject</th>
      <th>Result</th>
    </tr>
    <?php $obj->result();?>
  </table>
</body>
</html>
