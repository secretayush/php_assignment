<?php
  include('Data.php');
  $obj = new Data();
  if (mysqli_connect_errno()) {
    echo "error in connection to database!!!";
  }
  if (isset($_POST['send'])){
    $obj->store_data();
  }
 ?>

<!DOCTYPE html>
<html>
<head>
  <title>Ipl tournament</title>
</head>
<body>
  <!-- form to post data in data base -->
  <h1>Added match data </h1>
  <form action="" method="post">
    <label for="venue">Venue : </label>
    <select name="venue">
      <!-- code to select the values from table and show in dropdown menu -->
      <?php
      $query2 = "select * from venues;";
      $result2 = $obj->conn->query($query2);
      while($rows1 = mysqli_fetch_assoc($result2)){
        echo '<option value="'.$rows1['v_name'].'">'.$rows1['v_name'].'</option>';
      }
      ?>
    </select><br> <br>

    <label for="date_match">Date of match : </label>
    <input type="date" name="date_match"> <br><br>

    <label for="team1">Team 1 : </label>
    <select name="team1">
      <?php
      $query1 = "select t_name from teams;";
      $result1 = $obj->conn->query($query1);
      while ($rows2 = mysqli_fetch_assoc($result1)){
        echo '<option value="'.$rows2['t_name'].'">'.$rows2['t_name'].'</option>';
      }
      ?>
    </select><br><br>

    <label for="team2">Team 2 : </label>
    <select name="team2">
      <?php
      $query1 = "select t_name from teams;";
      $result1 = $obj->conn->query($query1);
      while ($rows2 = mysqli_fetch_assoc($result1)){
        echo '<option value="'.$rows2['t_name'].'">'.$rows2['t_name'].'</option>';
      }
      ?>
    </select><br><br>

    <label for="captain1">Captain team 1 :</label>
    <select name="captain1">
      <?php
      $query1 = "select t_captain from teams;";
      $result1 = $obj->conn->query($query1);
      while ($rows1 = mysqli_fetch_assoc($result1)){
        echo '<option value="'.$rows1['t_captain'].'">'.$rows1['t_captain'].'</option>';
      }
      ?>
    </select><br><br>

    <label for="captain2">Captain team 2 : </label>
    <select name="captain2">
      <?php
      $query1 = "select t_captain from teams;";
      $result1 = $obj->conn->query($query1);
      while ($rows1 = mysqli_fetch_assoc($result1)){
        echo '<option value="'.$rows1['t_captain'].'">'.$rows1['t_captain'].'</option>';
      }
      ?>
    </select><br><br>

    <label for="toss">Toss won by : </label>
    <select name="toss">
      <?php
      $query1 = "select t_name from teams;";
      $result1 = $obj->conn->query($query1);
      while ($rows1 = mysqli_fetch_assoc($result1)){
        echo '<option value="'.$rows1['t_name'].'">'.$rows1['t_name'].'</option>';
      }
      ?>
    </select><br><br>

    <label for="match_win">Match won by : </label>
    <select name="match_win">
      <?php
      $query1 = "select t_name from teams;";
      $result1 = $obj->conn->query($query1);
      while ($rows1 = mysqli_fetch_assoc($result1)){
        echo '<option value="'.$rows1['t_name'].'">'.$rows1['t_name'].'</option>';
      }
      ?>
    </select><br><br>

    <input type="submit" name="send" value="send"> <br>
  </form>
</body>
</html>
