<!-- This is the main page where the output is displayed -->
<?php
  // Create the object of Login class
  include 'Login.php';
  $obj = new Login();
  // condition to check if query parameter is set to google or github
  if ($_GET['q'] == 'google') {
    $obj->google_login();
  }
  elseif ($_GET['q'] == 'github') {
    $obj->github_login();
  }
 ?>
