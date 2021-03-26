<!-- creating a form -->
<!DOCTYPE html>
<html>
<head>
  <title>Assignment 4</title>
</head>
<body>
    <h1>Form 4</h1>
    <form action="form4.php" method="post" enctype="multipart/form-data">
      <!-- using post method to send the data to assin.php file -->
      <label for="fname">First name: </label>
      <input type="text" name="fname" id="fname"><br><br>
      <label for="lname">Last name: </label>
      <input type="text" name="lname" id="lname"><br><br>
      <label for="fullname">Full name: </label>
      <input type="text" name="fullname" id="fullname" readonly><br><br>
      <!-- assignment 2 -->
      <label for="file">Upload image: </label>
      <input type="file" name="file"><br><br>
      <!-- assignment 3 -->
      <label for="marks">Enter Marks: </label>
      <textarea id="marks" name="marks" rows="5" cols="20" placeholder="eg: English|80">
      </textarea><br><br>
      <!-- assignment 4 -->
      <label for="mob_no">Enter Mobile number: </label>
      <input type="text" name="mob_no" maxlength="13"><br><br>
      <!-- on button click it will trigger the assin.php file -->
      <button>Submit</button><br>
    </form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
// when ever value changes then display value of form in full name
  $('form').change(function () {
    $("#fullname").val($('#fname').val() + " " + $('#lname').val());
  });
});
</script>
</body>
</html>
