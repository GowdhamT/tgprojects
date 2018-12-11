$(document).ready(function(){
console.log("inside ready");


$('#logOut').click(function()
{
$.ajax(
{
  type:"GET",
  url: 'signout.php',
  success: function(output)
  {
      window.location = "index.html";
   }
  
});
});



$.ajax(
{
  type:"GET",
  url: 'userdetails.php',
  success: function(output)
  {
    
    console.log(output);
    var temp=JSON.parse(output.toString());
    console.log(temp);
    document.getElementById("user_name").innerHTML = temp.name;
    document.getElementById("email").value = temp.mailid;
    document.getElementById("gender").value = temp.gender;
    document.getElementById("degree").value = temp.degree;
    document.getElementById("dept").value = temp.dept;
    document.getElementById("colg").value = temp.colg;
    document.getElementById("dob").value = temp.dob;
    document.getElementById("uname").value = temp.name;


    //var temp = <?php echo json_encode(output);?>;
  
    //console.log(temp);
   //document.getElementById("user_name").innerHTML = temp[name];

    //document.getElementById("email").innerHTML = temp;
   
 }
  
}

  );

});