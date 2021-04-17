// Jquery program to send data through get method to php function
$(document).ready(function(){
  $("button").click(function(){
    // store the numbers in varables
    var fname = $("#fname").val();
    var lname = $("#lname").val();
    var mail = $("#mail").val();
    //Ajax to send the data in query paramenters
    $.ajax({
      url : "result.php",
      type : "GET",
      data :{"fname": fname, "lname" : lname, "mail" : mail},
      success : function(data){
        $("#result").html(data);
      }
    });
  });
});
