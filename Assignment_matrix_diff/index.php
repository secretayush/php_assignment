<!DOCTYPE html>
<html>
<head>
  <title>Matrix difference</title>
</head>
<body>
  <?php
    include 'Matrix.php';
    // creating object of class game
    $mat_1 = array(
        array(5,4,5),
        array(4,5,4),
        array(5,4,5)
      );
    $mat_2 = array(
        array(1,1,1),
        array(2,2,2),
        array(3,3,3)
      );
    $obj = new Matrix($mat_1,$mat_2);
    //calling function of class
    $obj->matrix_function();
  ?>
</body>
</html>
