<!DOCTYPE html>
<html>
<head>
  <title>Form using ajax</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
  <div class="container">
    <h1>Send data in database</h1>
    <!-- inserting data into databse using ajax -->
    <label for="fname">First name <input type="text" name="fname" id="fname"></label><br><br>
    <label for="lname">Last name <input type="text" name="lname" id="lname"></label><br><br>
    <label for="mail">Email <input type="email" name="mail" id="mail"></label><br><br>
    <button name="sumbit" id="send">SUMBIT</button>
    <div id="result"></div>
  </div>
  <!-- included ajax  -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- include javascript file  -->
  <script type="text/javascript" src="data.js"></script>
</body>
</html>
