<?php
//autoload to load the todo class
require_once 'vendor/autoload.php';

use Src\Todo;

$obj = new Todo();
//starting a session
session_start();
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  if (isset($_POST['add'])) {
    $result_add = $obj->add_task($_POST['task']);
  } elseif (isset($_POST['show'])) {
    $result_show = $obj->show_task();
  } elseif (isset($_POST['logout'])) {
    $obj->logout();
  }
}
// condition if query parameter is set or not
if (isset($_GET['id'])) {
  $obj->delete_task($_GET['id']);
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>Todo list</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body class="bg-light">
  <!-- add tasks in this below form -->
  <div class='container text-center pt-5 w-50'>
    <form action="" method="post" class="input-group mb-3">
      <input type="text" class="form-control" name="task" placeholder="Add Todo here...">
      <input type="submit" name="add" value="Add" class="btn btn-primary">
    </form>
    <!-- Show the result that value is added -->
    <div>
      <?php
      if (isset($result_add)) {
        echo "<br>Added value";
      }
      ?>
    </div>
    <div>
      <form action="" method="post">
        <input type="submit" name="show" value="show" class="btn btn-dark m-5 px-3">
      </form>
    </div>
    <!-- To show the table in data base  -->
    <div>
      <?php
      if (isset($result_show)) {
      ?>
        <table border="1" cellpadding="15px" align="center" class="table table-striped table-hover shadow p-3 mb-5 bg-white rounded">
          <thead class="thead-dark">
            <tr>
              <th>Task</th>
              <th>Completed</th>
            </tr>
          </thead>
          <?php
          while ($row = mysqli_fetch_assoc($result_show)) {
            echo "<tr>
            <td>" . $row['task'] . "</td>
            <td><a href='?id=" . $row['todo_id'] . "')'>Completed</a></td>
            </tr>";
          }
          ?>
        </table>
      <?php } ?>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
</body>

</html>