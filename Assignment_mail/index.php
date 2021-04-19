<!DOCTYPE html>
<html>
<head>
  <title>API assignment</title>
  <link rel="stylesheet" href="php_style1.css">
</head>
<body>
  <?php
    include('Data.php');
    //creating object of class
    $response = new Data();
    //calling the get api fun to get data from this api
    $data = $response->get_api('https://www.innoraft.com/jsonapi/node/services');
    //calling the get_data function to fetch the data and show
    $response->get_data($data);
  ?>
</body>
</html>
