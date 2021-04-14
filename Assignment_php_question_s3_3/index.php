<!DOCTYPE html>
<html>
<head>
  <title>User info</title>
</head>
<body>
  <div class="container">
    <h1>Calculator</h1>

    <label for="num1">Number 1 <input type="number" name="num1" id="num1"></label><br><br>
    <label for="num2">Number 2 <input type="number" name="num2" id="num2"></label><br><br>
    <button name="add" id="add">ADD</button>
    <button name="sub" id="sub">SUBSTRACT</button>
    <button name="mul" id="mul">MULTIPLY</button>
    <button name="div" id="div">DIVIDE</button>
    <div id="result"></div>
  </div>
  <!-- included ajax  -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- include javascript file  -->
  <script type="text/javascript" src="calc.js"></script>
</body>
</html>
