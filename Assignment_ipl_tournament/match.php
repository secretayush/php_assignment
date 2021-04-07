<?php
  //including data in the html to create object of class
  include('Data.php');
  //created object of data class
  $obj = new Data();
  //if button send is clicked then run below code
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
  <!-- form to post match data in data base -->
  <h1>Added match data </h1>
  <form action="" method="post">
    <!-- venue input -->
    <label for="venue">Venue : </label>
    <select name="venue">
      <!-- selecting the values from table and show in dropdown menu -->
      <?php
        //query to fetch all the columns from venues table
        $query2 = "select * from venues;";
        //sending the query in mysql server and storing result
        $result2 = $obj->conn->query($query2);
        //travasing through the selected value using associtive array
        while($rows1 = mysqli_fetch_assoc($result2)){
          //creating multiple options of drop down menu
          echo '<option value="'.$rows1['v_name'].'">'.$rows1['v_name'].'</option>';
        }
      ?>
    </select><br><br>
    <!-- date of match input -->
    <label for="date_match">Date of match : </label>
    <input type="date" name="date_match"> <br><br>
    <!-- Team 1 input from drop down options -->
    <label for="team1">Team 1 : </label>
    <!-- selecting the values from table and show in dropdown menu -->
    <select name="team1">
      <?php
        //query to fetch t_name from teams table
        $query1 = "select t_name from teams;";
        //sending the query in mysql server and storing result
        $result1 = $obj->conn->query($query1);
        while ($rows2 = mysqli_fetch_assoc($result1)){
          echo '<option value="'.$rows2['t_name'].'">'.$rows2['t_name'].'</option>';
        }
      ?>
    </select><br><br>
    <!-- Team 2 input from drop down options -->
    <label for="team2">Team 2 : </label>
    <select name="team2">
      <!-- selecting the values from table and show in dropdown menu -->
      <?php
        //query to fetch t_name from teams table
        $query1 = "select t_name from teams;";
        //sending the query in mysql server and storing result
        $result1 = $obj->conn->query($query1);
        //travasing through the selected value using associtive array
        while ($rows2 = mysqli_fetch_assoc($result1)){
          echo '<option value="'.$rows2['t_name'].'">'.$rows2['t_name'].'</option>';
        }
      ?>
    </select><br><br>
    <!-- Captain 1 input from drop down options -->
    <label for="captain1">Captain team 1 :</label>
    <!-- selecting captain from drop down table -->
    <select name="captain1">
      <?php
        //query to fetch t_captain from teams table
        $query1 = "select t_captain from teams;";
        //sending the query in mysql server and storing result
        $result1 = $obj->conn->query($query1);
        //travasing through the selected value using associtive array
        while ($rows1 = mysqli_fetch_assoc($result1)){
          echo '<option value="'.$rows1['t_captain'].'">'.$rows1['t_captain'].'</option>';
        }
      ?>
    </select><br><br>
    <!-- Captain 2 input from drop down options -->
    <label for="captain2">Captain team 2 : </label>
    <select name="captain2">
      <?php
        //query to select t_captain from teams table
        $query1 = "select t_captain from teams;";
        //sending the query in mysql server and storing result
        $result1 = $obj->conn->query($query1);
        //travasing through the selected value using associtive array
        while ($rows1 = mysqli_fetch_assoc($result1)){
          echo '<option value="'.$rows1['t_captain'].'">'.$rows1['t_captain'].'</option>';
        }
      ?>
    </select><br><br>
    <!-- Toss input from drop down options -->
    <label for="toss">Toss won by : </label>
    <select name="toss">
      <?php
        //query to select t_namefrom teams table
        $query1 = "select t_name from teams;";
        //sending the query in mysql server and storing result
        $result1 = $obj->conn->query($query1);
        //travasing through the selected value using associtive array
        while ($rows1 = mysqli_fetch_assoc($result1)){
          echo '<option value="'.$rows1['t_name'].'">'.$rows1['t_name'].'</option>';
        }
      ?>
    </select><br><br>
    <!-- take input of winner from the match  -->
    <label for="match_win">Match won by : </label>
    <select name="match_win">
      <?php
        //query to select t_name from teams table
        $query1 = "select t_name from teams;";
        //sending the query in mysql server and storing result
        $result1 = $obj->conn->query($query1);
        //travasing through the selected value using associtive array
        while ($rows1 = mysqli_fetch_assoc($result1)){
          echo '<option value="'.$rows1['t_name'].'">'.$rows1['t_name'].'</option>';
        }
      ?>
    </select><br><br>
    <!-- Submit the data onclick -->
    <input type="submit" name="send" value="send"> <br>
  </form>
</body>
</html>
