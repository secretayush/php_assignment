<!-- incluing php class -->
<?php
include 'Mail.php';
$request = new Mail();
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $mail = $_POST['email'];
    $request->check_mail($mail);
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Send mail</title>
    <link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>
    <div class="container">
        <form action="" method="post">
            <label for="email">Email: </label>
            <input type="text" name="email"><br>
            <button>Send</button>
        </form>
    </div>
</body>
</html>
