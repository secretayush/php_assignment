<!-- php code to send data in teams and venues table  -->
<?php
  // to create object of data class including data.php file
  include 'Data.php';
  //creating object of data class
  $obj = new Data();
  //condition if team button is clicked
  if (isset($_POST['team'])) {
    // calling add team fun to add data in team table
    $obj->add_team($_POST['t_name'],$_POST['c_name']);
  }
  // cond to check if venue submit button is clicked
  if (isset($_POST['venue'])) {
    //calling function to add venue in venue table
    $obj->add_venue($_POST['v_name']);
  }
?>
<!DOCTYPE html>
<html>
<head>
  <title>IPL</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
  <div class="container form">
    <!-- form to add teams fields -->
    <h1>Form to input teams fields</h1>
    <!-- form to add teams in temas table -->
    <form action="" method="post">
      <!-- take team name as input -->
      <label for="t_name">Team name : </label>
      <input type="text" name="t_name"><br><br>
      <!-- take captain name as input -->
      <label for="c_name">Captain name : </label>
      <input type="text" name="c_name"><br><br>
      <!-- submit the button to add row -->
      <input type="submit" name="team" value="Add team">
    </form>
    <hr>
    <hr>
    <!-- form to input venue field -->
    <h1>Form to input venues fields</h1>
    <form action="" method="post">
      <!-- take venue name as input -->
      <label for="v_name">Venue name :</label>
      <input type="text" name="v_name"><br><br>
      <!-- submit venue details in venue table -->
      <input type="submit" name="venue" value="Add venue"><br>
    </form>
    <hr>
    <hr>
    <!-- redirect to the match data entry page -->
    <a href="match.php"><h3>To add match click here</h3></a><br>
  </div>
</body>
</html>
