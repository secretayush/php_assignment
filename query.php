<?php
  session_start();
  //to redirect url to matched query paramneter
  switch ($_SESSION['q']) {
    case '1':
      header('Location:php_assin1.php');
      break;
    case '2':
      header('Location:php_assin2.php');
      break;
    case '3':
      header('Location:php_assin3.php');
      break;
    case '4':
      header('Location:php_assin4.php');
      break;
    case '5':
      header('Location:php_assin5.php');
      break;
    case '6':
      header('Location:php_assin6.php');
      break;

    default:
      echo "Please enter Proper query parameter in url eg: ?q=4";
      break;
  }
?>
