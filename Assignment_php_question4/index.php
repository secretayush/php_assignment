<!-- php code to send the data in database and display the code snnipet -->
<?php
  //including Code class and creating object of code class
  include 'Code.php';
  $obj = new Code();
  $result = "";
  //run the below code when upload button is clicked
  if (isset($_POST['upload'])) {
    //store data in varbles get data from post request method
    $desc = $_POST['desc'];
    $lang = $_POST['lang'];
    $code_snippet = $_POST['code'];
    //calling the upload code function to store the data in database
    $result = $obj->upload_code($desc,$lang,$code_snippet);
  }
  //run the code when show button is clicked
  if (isset($_POST['show'])) {
    //calling show function to store data in associtive array
    $data = $obj->query_show('*','code');
  }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Code snippets assignment</title>
  <!-- incluing style sheet -->
  <link rel="stylesheet" type="text/css" href="styles.css">
  <!-- script to include tiny code editor  -->
  <script src="https://cdn.tiny.cloud/1/ikpxpuqabksd866fcsjz4kt89egy6u7ypgomq1w2xh3moi13/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <!-- code snippet taking from tiny clouds platform -->
  <script>
    tinymce.init({
      selector: '#mytextarea'
    });
  </script>
</head>
<body>
  <!-- main container -->
  <div class="container">
    <!-- first flex box -->
    <div class="flex1">
      <!-- form to upload data in database  -->
      <form method="post" action="">
        <!-- add discription of code -->
        <label for="desc">Add code discription : </label>
        <input type="text" name="desc"><br><br>
        <!-- Enter programing language of code -->
        <label for="lang">Programming language : </label>
        <input type="text" name="lang"><br><br>
        <!-- Enter code snippet in data base -->
        <label for="file">Code snippet :</label>
        <textarea id="mytextarea" name="code">
          Enter code here
        </textarea>
        <!-- click button to send the data in data base -->
        <input type="submit" name="upload" value="upload code">
      </form>
    </div>
    <!-- show message that code is uploaded or not -->
    <div class="result">
      <?php echo $result; ?>
    </div>
    <!-- second flex box -->
    <div class="flex2">
      <!-- set the button when show code is clicked and display all the details -->
      <form method="post" action="">
        <button name="show">Show Code snippets</button>
      </form>
      <div class="box">
        <!-- fetching code details from database and showng them on web page -->
        <?php
          if (isset($data)) {
            // travasing through to show details
            while ($row = mysqli_fetch_assoc($data)) {
              // display code details from the data base using path varaible
              echo "<div class='snippets'>
              <div> Description :".$row['code_dec']."</div>
              <div> Language :".$row['code_lang']."</div>
              <div>Snippet : ".$row['code_snippet']."</div>
              </div>";
            }
          }
        ?>
      </div>
    </div>
  </div>
</body>
</html>
