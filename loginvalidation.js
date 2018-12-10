console.log("outside ready");
$(document).ready(function(){
console.log("inside ready");
  $("#submit").click(function(){

    var user_mail_id=$("#emailField").val();
    var user_pwd=$("#password").val();
if(user_mail_id==''||user_pwd=='')
{
  alert("please provide credentials");
  return;
}

    console.log("inside click : ");
    console.log(user_mail_id);
    console.log(user_pwd);
$.ajax(
{
  type:"GET",
  url: 'userlogin.php',
  data: {user_id: user_mail_id,pwd:user_pwd},
  success: function(output)
  {
    var temp=output;
    console.log(temp);
   if(temp=='login success')
   {
    //alert("success");
    window.location = "user_details.html";

   }
 else
 {
alert("invalid credentials");
 }
    //document.getElementById("txtHint").innerHTML = output;
 }
  
}

  );



  });
});






  function validateEmail(emailField){
    var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

    if (reg.test(emailField.value) == false) 
    {
        alert('Invalid Email Address');
        return false;
    }

    return true;

}


function showUser(emailField) {
  
    if (emailField == "") {
        document.getElementById("txtHint").innerHTMLs = "";
        return;
    } else { 
console.log("name: "+emailField.value);
$.ajax(
{
  type:"GET",
  url: 'userlogin.php',
  data: {q: emailField.value},
  success: function(output)
  {
    document.getElementById("txtHint").innerHTML = output;
  }
}

  );

       /* if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
       
        xmlhttp.open("GET","userlogin.php?q="+str,true);
        xmlhttp.send();
         xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
                console.log("res: "+this.responseText);
            }
        };*/
    }
}
