<!DOCTYPE html>
<html>
<head>
  <title>IPL</title>
</head>
<body>
  <!-- form to add teams fields -->
  <h1>Form to input teams fields</h1>
  <form action="" method="post">
    <label for="t_name">Team name : </label>
    <input type="text" name="t_name"><br><br>

    <label for="c_name">Captain name : </label>
    <input type="text" name="c_name"><br><br>

    <input type="submit" name="team" value="Add team">
  </form>
  <hr>
  <hr>
  <!-- form to input venue field -->
  <h1>Form to input venues fields</h1>
  <form action="" method="post">
    <label for="v_name">Venue name :</label>
    <input type="text" name="v_name"><br><br>

    <input type="submit" name="venue" value="Add venue"><br>
  </form>
  <hr>
  <hr>
  <a href="match.php"><h3>To add match click here</h3></a><br>
  <!-- php code to send data in teams and venues table  -->
  <?php
    include 'Data.php';
    $obj = new Data();
    if (isset($_POST['team'])) {
      $obj->add_team($_POST['t_name'],$_POST['c_name']);
    }
    if (isset($_POST['venue'])) {
      $obj->add_venue($_POST['v_name']);
    }
   ?>
</body>
</html>
