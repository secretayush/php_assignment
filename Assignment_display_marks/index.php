<!DOCTYPE html>
<html>
<head>
  <title>Student marks</title>
</head>
<body>
  <?php
    include('Student.php');
    include('Data.php');
    $obj = new Student($student,$subject);
    //display grade subjects details
    echo "<br>Subject : <br>";
    $get_mark = $obj->subject_fetch('12');
    if (empty($get_mark)) {
      echo "Not found grade!!";
    }
    else{
      foreach ($get_mark as $key => $value) {
        foreach ($value as $k => $v) {
          echo $k." : ".$v."<br>";
        }
      }
    }
    // display student marks function
    echo "<br>Student marks : <br>";
    $get_stu_mark = $obj->student_marks('st1');
    if (empty($get_stu_mark)) {
      echo "Details Not found!!";
    }
    else{
      foreach ($get_stu_mark as $key => $value) {
        echo $key." : ".$value."<br>";
      }
    }
  ?>
  <table cellspacing="0px" border="1">
    <tr>
      <th>Name</th>
      <th>DOB</th>
      <th>Grade</th>
      <th>Subject</th>
      <th>Result</th>
    </tr>
    <?php echo ($obj->result());?>
  </table>
</body>
</html>
