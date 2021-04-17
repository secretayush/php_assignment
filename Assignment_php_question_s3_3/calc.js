// Jquery code to send data in php function and get result from php function
$(document).ready(function(){
  $("button").click(function(){
    // store the numbers in varables
    var num1 = $("#num1").val();
    var num2 = $("#num2").val();
    var operator = $(this).attr('id');
    //Ajax to send the data in query paramenters
    $.ajax({
      url : "result.php",
      type : "GET",
      data :{"num1": num1, "num2" : num2, "operator" : operator},
      success : function(data){
        $("#result").html(data);
      }
    });
  });
});
