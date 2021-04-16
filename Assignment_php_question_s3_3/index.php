<!DOCTYPE html>
<html>
<head>
  <title>Calculator using ajax</title>
   <!-- Bootstrap CSS -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  
</head>
<body class="bg-warning">
  <div class="container-md text-center mt-5 shadow mb-5 bg-light rounded p-5">
    <h1 class="mb-4">Calculator</h1>
    <label for="num1">Number 1 </label>
    <input type="number" name="num1" id="num1"><br><br>
    <label for="num2">Number 2 </label>
    <input type="number" name="num2" id="num2"><br><br>
    <div class="btn-group mt-3">
      <button name="add" id="add" class="btn btn-primary px-3">ADD</button>
      <button name="sub" id="sub" class="btn btn-primary px-3">SUBTRACT</button>
      <button name="mul" id="mul" class="btn btn-primary px-3">MULTIPLY</button>
      <button name="div" id="div" class="btn btn-primary px-3">DIVIDE</button>
    </div>
    <div id="result" class="mt-3 text-warning"></div>
  </div>
  <!-- included ajax  -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
 
  <!-- include javascript file  -->
  <script type="text/javascript" src="calc.js"></script>
</body>
</html>
