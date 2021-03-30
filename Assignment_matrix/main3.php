<!DOCTYPE html>
<html>
<head>
  <title>Table</title>
</head>
<body>
  <table cellspacing="0px" border="1">
    <?php
      include 'index3.php';
      // creating object of class game
      $obj = new Matrix(5);
      //calling function of class
      $obj->table();
    ?>
  </table>
</body>
</html>
