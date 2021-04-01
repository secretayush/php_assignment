<!DOCTYPE html>
<html>
<head>
  <title>Cricket</title>
</head>
<body>
  <?php
    include('Cricket.php');
    include('Data.php');
    $obj = new Cricket($data);
    //max score by a player
    echo "Max score in tournament = ".$obj->max_score_player()."<br>";
    $max_score_match = $obj->max_score_match();
    //max score in match
    echo "Max score in a match list : <br>";
    foreach ($max_score_match as $key => $value) {
      echo $key." : ".$value."<br>";
    }
    //winner of tournament
    $winner = $obj->tournament_winner();
    //cond if more than one winner
    if (count($winner)>1) {
      echo "Tournament Drawed : <br>";
      foreach ($winner as $key => $value) {
        echo $value."<br>";
      }
    }
    else{
      echo "Winner : ".$winner[0];
    }
  ?>
</body>
</html>
