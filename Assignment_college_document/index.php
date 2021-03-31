<!DOCTYPE html>
<html>
<head>
  <title>College data</title>
</head>
<body>
  <?php
    include('College.php');
    include('Data.php');
    $obj = new College($college_data,$doc);
    $get_data = $obj->college_info();
    foreach ($get_data as $key => $value) {
      foreach ($value as $k => $v) {
        echo $k." : ".$v."<br>";
      }
     }
  ?>
</body>
</html>
