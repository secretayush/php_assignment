<?php
  //including data in the html to create object of class
  include('Data.php');
  //created object of data class
  $obj = new Data();
  //if button send is clicked then run below code
  if (isset($_POST['send'])){
    $result = $obj->store_data();
  }
 ?>
<!DOCTYPE html>
<html>
<head>
  <title>Ipl tournament</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
  <div class="container">
    <!-- form to post match data in data base -->
    <h1>Added match data </h1>
    <form class="match" action="" method="post">
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
    <!-- display the result if data inserted or not -->
    <?php
      echo $result;
    ?>
    <!-- to show the data in tabluar form from database -->
    <div class="show">
      <div class="flex1">
        <!-- show teams table  -->
        <form action="" method="post">
          <button name="show_table">Show Team table</button>
          <!-- conditon if show_table button is set then  -->
          <?php if (isset($_POST['show_table'])) { ?>
          <!-- table when button is set  -->
          <table cellpadding="5px" border="1">
            <tr>
              <th>Team id</th>
              <th>Team name</th>
              <th>Team captain</th>
            </tr>
          <?php
              //query to select team table
              $result = $obj->show_data('*','teams');
              //travasing through the selected value using associtive array
              while ($rows1 = mysqli_fetch_assoc($result)){
                echo '<tr><td>'.$rows1['t_id'].'</td>
                <td>'.$rows1['t_name'].'</td>
                <td>'.$rows1['t_captain'].'</td></tr>';
              }
            }
          ?>
          </table>
        </form>
      </div>
      <!-- to show venue table  -->
      <div class="flex2">
        <form action="" method="post">
          <button name="show_venue">Show Venue table</button>
          <!-- condition to check if button isset then display the table containing data of table -->
          <?php if (isset($_POST['show_venue'])) { ?>
          <table cellpadding="5px" border="1">
            <tr>
              <th>Venue id</th>
              <th>Venue name</th>
            </tr>
          <?php
              //calling fun to get data from database ipl
              $result = $obj->show_data('*','venues');
              //travasing through the selected value using associtive array
              while ($rows1 = mysqli_fetch_assoc($result)){
                echo '<tr><td>'.$rows1['v_id'].'</td>
                <td>'.$rows1['v_name'].'</td></tr>';
              }
            }
          ?>
          </table>
        </form>
      </div>
      <!-- to show venue table  -->
      <div class="flex3">
        <!-- form to set the show_match button -->
        <form action="" method="post">
          <button name="show_match">Show match table</button>
          <!-- condition to check if button isset then display the table containing data of table -->
          <?php if (isset($_POST['show_match'])) { ?>
            <!-- table to display the result  -->
          <table cellpadding="5px" border="1">
            <!-- table headings -->
            <tr>
              <th>Venue</th>
              <th>Date</th>
              <th>Team 1</th>
              <th>Captain 1</th>
              <th>Team 2</th>
              <th>Captain 2</th>
              <th>Toss</th>
              <th>Match won</th>
            </tr>
          <?php
              //calling the result in a valrible and display the data using loop
              $result = $obj->show_data('m.m_id, m.match_date, m.toss, m.result, v.v_name, t1.t_name as team1,t1.t_captain as captain1, t2.t_name as team2,t2.t_captain as captain2','matchs m INNER JOIN teams t1 on m.team_1=t1.t_id INNER JOIN teams t2 ON m.team_2=t2.t_id INNER JOIN venues v ON m.v_id = v.v_id');
              //travasing through the selected value using associtive array
              while ($rows1 = mysqli_fetch_assoc($result)){
                echo '<tr>
                <td>'.$rows1['v_name'].'</td>
                <td>'.$rows1['match_date'].'</td>
                <td>'.$rows1['team1'].'</td>
                <td>'.$rows1['captain1'].'</td>
                <td>'.$rows1['team2'].'</td>
                <td>'.$rows1['captain2'].'</td>
                <td>'.$rows1['toss'].'</td>
                <td>'.$rows1['result'].'</td></tr>';
              }
            }
          ?>
          </table>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
