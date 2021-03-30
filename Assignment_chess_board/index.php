<!DOCTYPE html>
<html>
<head>
  <title>Chess board</title>
  <style>
    .container{
      display: inline-block;
      margin: 0px;
      border:solid black 1px;
    }
    .white_box{
      margin: 0px;
      padding: 15px;
      display: inline-block;
    }
    .box{
      margin-bottom: -4px;
    }
    .black_box{
      margin: 0px;
      padding: 15px;
      background-color: black;
      display: inline-block;
    }
  </style>
</head>
<body>
  <div class="container">
    <?php
      include 'Chess.php';
      // creating object of class game
      $obj = new Chess();
      //calling function of class
      $obj->board();
    ?>
  </div>
</body>
</html>
