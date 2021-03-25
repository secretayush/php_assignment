<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send mail</title>
    <link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>
    <!-- incluing php class -->
    <div class="container">
        <form action="Mail.php" method="post">
            <label for="email">Email: </label>
            <input type="text" name="email"><br>
            <button>Send</button>
        </form>
    </div>
</body>
</html>
