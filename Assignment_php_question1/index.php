<?php
  // including mail.php file
  include 'Mail.php';
  // condoition to check if send button is set then run inner code
  if (isset($_POST['send'])) {
    // create object of class mail
    $obj = new Mail();
    // store the responce from the send mail function
    $response = $obj->send_mail($_POST['name'],$_POST['mail'],$_POST['message']);
  }
 ?>
<!DOCTYPE html>
<html>
<head>
  <title>1st assignment</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
  <!-- main container to store the form in middle of web page -->
  <div class="container">
    <!-- form to take inputs from user -->
    <form action="" method="post">

      <label for="name">Name : </label>
      <input type="txt" name="name"><br><br>
      <label for="mail">Email : </label>
      <input type="email" name="mail"><br><br>
      <label for="message">Message: </label>
      <textarea name="message" rows="4" cols="33"></textarea><br><br>
      <input type="submit" name="send" value="Send">
    </form>
    <div>
      <?php echo $response; ?>
    </div>
  </div>
</body>
</html>
