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
    $input = $_POST['game'];
    include 'index.php';
    // creating object of class game
    $obj = new Game();
    //calling function of class
    $obj->condition($input);
  ?>
</body>
</html>
