<?php
  //including employee.php file to create object of class employee
  include 'Employee.php';
  //creating object of class employee
  $obj = new Employee();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Employee queries</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
  <div class="container">
    <!-- first query solution in tablular form -->
    <h3>First question</h3>
    <table cellspacing="1px" border="1" cellpadding="10px" align="center">
      <tr>
        <th>First name</th>
      </tr>
      <!-- php code to get data from database and add table row -->
      <?php
        //calling query to and store result
        $data = $obj->query('ed.employee_first_name','employee_details_table ed INNER JOIN employee_salary_table es ON ed.employee_id=es.employee_id','es.employee_salary > 50000');
        // travesing through the returned result
        while ($row = mysqli_fetch_assoc($data)) {
          // adding table row in firt name in column
          echo "<tr><td>".$row['employee_first_name']."</td></tr>";
        }
      ?>
    </table>
    <!-- showing result of 2nd query -->
    <h3>Second question</h3>
    <table cellspacing="1px" border="1" cellpadding="10px" align="center">
      <tr>
        <th>Last name</th>
      </tr>
      <!-- php code to get data from database and add table row -->
      <?php
        //calling query to and store result
        $data = $obj->query('employee_last_name','employee_details_table','graduation_percentile > 70');
        // travesing through the returned result
        while ($row = mysqli_fetch_assoc($data)) {
          // adding td in firt name and salary column
          echo "<tr><td>".$row['employee_last_name']."</td></tr>";
        }
      ?>
    </table>
    <!-- showing result of 3rd query -->
    <h3>Third question</h3>
    <table cellspacing="1px" border="1" cellpadding="10px" align="center">
      <tr>
        <th>Employee code name</th>
      </tr>
      <!-- php code to get data from database and add table row -->
      <?php
        //calling query to and store result
        $data = $obj->query('ec.employee_code_name','((employee_code_table ec INNER JOIN employee_salary_table es ON ec.employee_code=es.employee_code) INNER JOIN employee_details_table ed ON es.employee_id=ed.employee_id)','ed.graduation_percentile < 70');
        // travesing through the returned result
        while ($row = mysqli_fetch_assoc($data)) {
          // adding table row in employee code
          echo "<tr><td>".$row['employee_code_name']."</td></tr>";
        }
      ?>
    </table>
    <!-- showing result of 4th query -->
    <h3>Fourth question</h3>
    <table cellspacing="1px" border="1" cellpadding="10px" align="center">
      <tr>
        <th>Full name</th>
      </tr>
      <!-- php code to get data from database and add table row -->
      <?php
        //calling query to and store result
        $data = $obj->query('CONCAT(ed.employee_first_name, " ",ed.employee_last_name) as full_name','((employee_code_table ec INNER JOIN employee_salary_table es ON ec.employee_code=es.employee_code) INNER JOIN employee_details_table ed ON es.employee_id=ed.employee_id)','ec.employee_domain <> "Java"');
        // travesing through the returned result
        while ($row = mysqli_fetch_assoc($data)) {
          // adding table row in firt name and salary column
          echo "<tr><td>".$row['full_name']."</td></tr>";
        }
      ?>
    </table>
    <!-- showing result of 5th query -->
    <h3>Fifth question</h3>
    <table cellspacing="1px" border="1" cellpadding="10px" align="center">
      <tr>
        <th>Domain</th>
        <th>Total salary</th>
      </tr>
      <!-- php code to get data from database and add table row -->
      <?php
        $data = $obj->query('sum(es.employee_salary) as tot_sal, ec.employee_domain','((employee_code_table ec INNER JOIN employee_salary_table es ON ec.employee_code=es.employee_code) INNER JOIN employee_details_table ed ON es.employee_id=ed.employee_id)','es.employee_salary <> 3000','group by ec.employee_domain');
        // travesing through the returned result
        while ($row = mysqli_fetch_assoc($data)) {
          // adding table row in Domain and total salary column
          echo "<tr><td>".$row['employee_domain']."</td>
          <td>".$row['tot_sal']."</td></tr>";
        }
      ?>
    </table>
    <!-- showing result of 6th query -->
    <h3>Sixth question</h3>
    <table cellspacing="1px" border="1" cellpadding="10px" align="center">
      <tr>
        <th>Domain</th>
        <th>Total salary</th>
      </tr>
      <!-- php code to get data from database and add table row -->
      <?php
        $data = $obj->query('sum(es.employee_salary) as tot_sal, ec.employee_domain','((employee_code_table ec INNER JOIN employee_salary_table es ON ec.employee_code=es.employee_code) INNER JOIN employee_details_table ed ON es.employee_id=ed.employee_id)','es.employee_salary > 30000','group by ec.employee_domain');
        // travesing through the returned result
        while ($row = mysqli_fetch_assoc($data)) {
          // adding table row in domain and salary column
          echo "<tr><td>".$row['employee_domain']."</td>
          <td>".$row['tot_sal']."</td></tr>";
        }
      ?>
    </table>
    <!-- showing result of 6th query -->
    <h3>Seventh question</h3>
    <table cellspacing="1px" border="1" cellpadding="10px" align="center">
      <tr>
        <th>Employee Id</th>
     </tr>
      <!-- php code to get data from database and add table row -->
      <?php
        $data = $obj->query('es.employee_id','((employee_code_table ec INNER JOIN employee_salary_table es ON ec.employee_code=es.employee_code) INNER JOIN employee_details_table ed ON es.employee_id=ed.employee_id)','ec.employee_code IS NULL');
        // travesing through the returned result
        while ($row = mysqli_fetch_assoc($data)) {
          // adding table row employee id
          echo "<tr><td>".$row['employee_id']."</td></tr>";
        }
      ?>
    </table>
  </div>
</body>
</html>
