<!DOCTYPE html>
<html>
<head>
  <title>Form using ajax</title> 
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>

<body class="bg-light">
  <div class='container-md text-center mt-5 shadow mb-5 bg-light rounded p-5'>
    <h1>Send data in database</h1>
    <!-- inserting data into databse using ajax -->
    <label for="fname">First name <input type="text" name="fname" id="fname"></label><br><br>
    <label for="lname">Last name <input type="text" name="lname" id="lname"></label><br><br>
    <label for="mail">Email <input type="email" name="mail" id="mail"></label><br><br>
    <button name="sumbit" id="send" class="btn btn-primary px-3">SUMBIT</button>
    <div id="result" class="mt-4 text-warning"></div>
  </div>
  <!-- included ajax  -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
 
  <!-- include javascript file  -->
  <script type="text/javascript" src="data.js"></script>
</body>
</html>
