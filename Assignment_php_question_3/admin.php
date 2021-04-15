<?php
  //Register class to get method approve_user and show_data
  require_once 'vendor/autoload.php';
  use innoraft\Register;
  $obj = new Register();
  $result = $obj->show_user();
  if (isset($_GET['id'])) {
    $obj->approve_user($_GET['id']);
  }
 ?>
<!DOCTYPE html>
<html>
<head>
  <title>Admin dashboard</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
  <!-- Admin pannel to approve users -->
  <div class="container">
    <h1>List of users Not verified</h1>
    <table border="1" cellpadding="15px" align="center">
        <th>Username</th>
        <th>Approve</th>
        <?php
          while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
            <td>".$row['username']."</td>
            <td><a href='?id=".$row['username']."')'>Approved</a></td>
            </tr>";
          }
        ?>
    </table>
  </div>
</body>
</html>
