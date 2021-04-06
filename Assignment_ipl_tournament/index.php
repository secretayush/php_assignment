<!DOCTYPE html>
<html>
<head>
  <title>Ipl tournament</title>
</head>
<body>
  <!-- form to post data in data base -->
  <form action="" method="post">
    <label for="venue">Venue : </label>
    <input type="text" name="venue"> <br> <br>

    <label for="date_match">Date of match : </label>
    <input type="date" name="date_match"> <br><br>

    <label for="team1">Team 1 : </label>
    <input type="text" name="team1"> <br><br>

    <label for="team2">Team 2 : </label>
    <input type="text" name="team2"> <br><br>

    <label for="caption1">Captain team 1 : </label>
    <input type="text" name="captain1"> <br><br>

    <label for="caption2">Captain team 2 : </label>
    <input type="text" name="captain2"> <br><br>

    <label for="toss">Toss won by : </label>
    <input type="text" name="toss"> <br><br>

    <label for="match_win">Match won by : </label>
    <input type="text" name="match_win"> <br><br>
    <input type="submit" name="send" value="send"> <br>
  </form>
  <?php
    if (isset($_POST['send'])){
      include('Data.php');
      $obj = new Data();
      $obj->store_data();
    }
?>

</body>
</html>
