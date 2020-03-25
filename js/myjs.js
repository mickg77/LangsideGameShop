$('#passwordbox').blur(function() {
  //we have left the box with the bananas id


});


$(document).keypress(function(e) {
  //when the key is pressed

  if (document.getElementById("passwordbox").value.length < 8) {
    //alert("your password needs to be at least 8 characters");
    document.getElementById("pwdfeedback").innerHTML = "Password too short";
  } else {
    document.getElementById("pwdfeedback").innerHTML = "";
  }


  if ($(":input").is(":focus") == 0) {
    switch (e.which) {
      //a on a keyboard is 97, b is 98 according to ASCII values
      case 108:
        window.location = "index.php";
        break;
      case 100:
        window.location = "display.php";
        break;
      case 105:
        window.location = "insert.php";
        break;
    }
  } //end of if

});
