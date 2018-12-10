
$(document).ready(function(){
console.log("inside ready");

$('#fs').click(function()
{
if($("#email").val()==''||$("#uname").val()==''||$("#password").val()==''||$("#confirm_password").val()=='')
{
  alert("please provide required details");
  return;
}

console.log($('#userForm').serialize());
var params=$('#userForm').serialize();
$.ajax(
{
  type:"POST",
  url: 'signup.php',
  data: params,
  success: function(output)
  {
    var temp=output;
    console.log(temp);
    window.location = "user_details.html";
    //sdocument.getElementById("user_name").innerHTML = temp;
   
 }
  
}

  );




});





});












var check = function() {
  if (document.getElementById('password').value ==
    document.getElementById('confirm_password').value||document.getElementById('confirm_password').value=='') {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = '';
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'Password is not matching';
  }
}

function validateEmail(emailField){
  var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

  if (reg.test(emailField.value) == false && emailField.value!='') 
  {
    document.getElementById('e-message').style.color = 'red';
    document.getElementById('e-message').innerHTML = 'Not a valid email ID';
  }
  else{
    document.getElementById('e-message').style.color = 'green';
    document.getElementById('e-message').innerHTML = '';
  }

  return true;

}