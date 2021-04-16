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
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
  <!-- Admin pannel to approve users -->
  <div class="container text-center w-50 pt-5">
    <h1>List of users Not verified</h1>
    <table border="1" cellpadding="15px" class="table table-striped table-hover shadow p-3 mb-5 bg-white rounded mt-3">
      <th>Username</th>
      <th>Approve</th>
      <?php
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
            <td>" . $row['username'] . "</td>
            <td><a href='?id=" . $row['username'] . "')'>Approve</a></td>
            </tr>";
      }
      ?>
    </table>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>

</body>

</html>