<!DOCTYPE html>
<html>
<head>
  <title>Gists add</title>
</head>
<body>
  <form action="" method="post">
    <label for="text">Text area</label>
    <textarea name="code" rows="4" cols="20"></textarea>
    <input type="submit" name="button">
  </form>
  <?php
    if (isset($_POST['button'])) {
      include('Gists.php');

      $url = 'https://api.github.com/gists';
      //access token
      $access = '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';

      if (empty(json_decode($_POST['code']))) {
        echo "Incorrect formate!!";
      }
      else{
        $obj = new Gists($url,$_POST['code'],$access);
        $obj->gists_write();

      }
    }
  ?>
</body>
</html>
