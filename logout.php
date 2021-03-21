<?php
  session_start();
  session_unset();
  session_destroy();
  echo "Loged out Login again!";
  include 'php_assin7.php'
?>
