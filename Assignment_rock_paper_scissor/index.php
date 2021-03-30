<!DOCTYPE html>
<html>
<head>
  <title>Rock paper scissors</title>
</head>
<body>
  <!-- form to take input from user -->
  <form action="" method="post">
    <label>Enter your input and select one button:</label> <br>
    <input type="radio" name="game" value="Rock">Rock <br>
    <input type="radio" name="game" value="Paper">Paper <br>
    <input type="radio" name="game" value="Scissor">Scissor <br>
    <button>Play</button>
  </form>
  <?php
    $check_arr = [2,3,4];
    include 'Game.php';
    // creating object of class game
    $obj = new Game();
    //calling function of class
    $var = $obj->game_rules($_POST['game']);
    if ($var == 0) {
      echo "<br>Please select any one option!";
    }
    elseif ($var == 1) {
      echo "<br>Draw Play again<br>";
    }
    elseif (in_array($var,$check_arr)) {
      echo "<br>You Loss!!!<br>";
    }
    else{
      echo "<br>You Win!!!<br>";
    }
  ?>
</body>
</html>
