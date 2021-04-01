<!DOCTYPE html>
<html>
<head>
  <title>College data</title>
</head>
<body>
  <?php
    include('College.php');
    include('Data.php');
    include('Document.php');
    //array of object to store doc data
    $doc_arr = array();
    //1st college
    $doc_arr[0] = new Document();
    $doc_arr[0]->doc_name = 'doc name 1';
    $doc_arr[0]->doc_type = 'A';
    $doc_arr[0]->doc_college = '1';
    $doc_arr[0]->doc_sent = '1';

    //2nd college
    $doc_arr[1] = new Document();
    $doc_arr[1]->doc_name = 'doc name 2';
    $doc_arr[1]->doc_type = 'B';
    $doc_arr[1]->doc_college = '2';
    $doc_arr[1]->doc_sent = '0';

    $obj = new College($college_data,$doc_arr); //doc_arr is array of object of document class
    $get_data = $obj->college_info();
    foreach ($get_data as $key => $value) {
      foreach ($value as $key1 => $value1) {
        if ($key1 == 'doc') {
          foreach ($value1 as $key2 => $value2) {
            if ($key2 == 'doc_college' && empty($value2)) {
              foreach ($value2 as $key3 => $value3) {
                echo $key3." : ".$value3."<br>";
              }
            }
            else{
              echo $key2." : ".$value2."<br>";
            }
          }
        }
        else{
          echo ($key1." : ".$value1."<br>");
        }
      }
  }
  ?>
</body>
</html>
