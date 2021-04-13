<?php
  // including the todo php class
  include 'Todo.php';
  $obj = new Todo();
  //starting a session
  session_start();
  if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['add'])) {
      $result_add = $obj->add_task($_POST['task']);
    }
    elseif (isset($_POST['show'])) {
      $result_show = $obj->show_task();
    }
    elseif (isset($_POST['logout'])) {
      $obj->logout();
    }
  }
  // condition if query paramenter is set or not
  if (isset($_GET['id'])) {
    $obj->delete_task($_GET['id']);
  }
?>
 <!DOCTYPE html>
 <html>
 <head>
   <title>Assignment 1</title>
   <link rel="stylesheet" type="text/css" href="styles.css">
 </head>
 <body>
  <!-- add tasks in this below form -->
  <div class='container'>
    <form action="" method="post">
      <label for="task">Add Task : </label>
      <input type="text" name="task"><br><br>
      <input type="submit" name="add" value="Add">
      <?php
        if (isset($result_add)) {
          echo "<br>Added value";
        }
       ?>
    </form>
    <div>
      <form action="" method="post">
        <input type="submit" name="show" value="show">
      </form>
    </div>
    <!-- To show the table in data base  -->
    <div>
    <?php
    if (isset($result_show)) {
      ?>
      <table border="1" cellpadding="15px" align="center">
        <th>Task</th>
        <th>Completed</th>
        <?php
          while ($row = mysqli_fetch_assoc($result_show)) {
            echo "<tr>
            <td>".$row['task']."</td>
            <td><a href='?id=".$row['todo_id']."')'>Completed</a></td>
            </tr>";
          }
        ?>
      </table>
    <?php }?>
    </div>
  </div>
 </body>
 </html>
