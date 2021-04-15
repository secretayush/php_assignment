<!-- This is the main page where the output is displayed -->
<?php
  // Create the object of Login class
  require_once 'vendor/autoload.php';
  use login\Login;
  $obj = new Login();
  // condition to check if query parameter is set to google or github
  if ($_GET['q'] == 'google') {
    $obj->google_login();
  }
  elseif ($_GET['q'] == 'github') {
    $obj->github_login();
  }
 ?>
