<!DOCTYPE html>
<html>
<head>
  <title>Seat arrangement</title>
</head>
<body>
  <?php
    include('Seat.php');
    include('Data.php');
    $obj = new Seat($data);
    $get_data = $obj->arrangment();
    foreach ($get_data as $key => $value) {
      echo " Name : ".$value."<br>";
    }
  ?>
</body>
</html>
