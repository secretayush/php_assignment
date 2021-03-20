<!DOCTYPE html>
<html>
<head>
  <title>Assignment 6</title>
  <style>
    .pagination {
      display: inline-block;
    }

    .pagination a {
      color: black;
      float: left;
      padding: 8px 16px;
      text-decoration: none;
    }
    .pagination a.active {
      background-color: #4CAF50;
      color: white;
    }

    .pagination a:hover
    {
      background-color: #ddd;
    }
  </style>
</head>
<body>
  <!-- creating a form -->
  <?php
    session_start();
    // cond to check if already logedinor not
    if (isset($_SESSION['username']) && ( $_SESSION['exp_time'] > time())){
      $data = '
      <h1>Form 6</h1>

      <form action="form6.php" method="post" enctype="multipart/form-data">

        <!-- using post method to send the data to assin.php file -->
        <label for="fname">First name: </label>
        <input type="text" name="fname" id="fname"><br><br>


        <label for="lname">Last name: </label>
        <input type="text" name="lname" id="lname"><br><br>


        <label for="fullname">Full name: </label>
        <input type="text" name="fullname" id="fullname" readonly><br><br>

        <!-- assignment 2 -->
        <label for="file">Upload image: </label>
        <input type="file" name="file"><br><br>

        <!-- assignment 3 -->
        <label for="marks">Enter Marks: </label>
        <textarea id="marks" name="marks" rows="5" cols="20" placeholder="eg: English|80">
        </textarea><br><br>


        <!-- assignment 4 -->
        <label for="mob_no">Enter Mobile number: </label>
        <input type="text" name="mob_no" maxlength="13"><br><br>


        <!-- assignment 5 -->
        <label for="mail">Enter Email: </label>
        <input type="text" name="mail"><br><br>



        <!-- on button click it will trigger the assin.php file -->
        <button>Submit</button><br>
      </form>

      <div class="pagination">
          <br><br>
        <a href="php_assin1.php">1</a>
        <a href="php_assin2.php">2</a>
        <a href="php_assin3.php">3</a>
        <a href="php_assin4.php">4</a>
        <a href="php_assin5.php">5</a>
        <a href="php_assin6.php">6</a>
    </div>
    ';
    echo $data;
    }
    else{
      echo "Please login Session time out!";
      // Store the uri of this page
      $_SESSION['redirect'] = $_SERVER['REQUEST_URI'];
      //include the login form page
      include 'php_assin7.php';
    }
  ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  $(document).ready(function(){
    // when ever value changes then display value of form in full name
    $('form').change(function () {
      $("#fullname").val($('#fname').val() + " " + $('#lname').val());
    });
  });
</script>
</body>
</html>
