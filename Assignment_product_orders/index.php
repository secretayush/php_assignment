<!DOCTYPE html>
<html>
<head>
  <title>Product order</title>
</head>
<body>
  <?php
    include('Product.php');
    include('Data.php');
    $obj = new Product($data);
    $get_data = $obj->arrange();
    print("<pre>".print_r($get_data,true)."</pre>");
  ?>
</body>
</html>
