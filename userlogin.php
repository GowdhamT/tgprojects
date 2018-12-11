<?php
$mail_id = $_GET['user_id'];
$pwd = $_GET['pwd'];
$servername   = "localhost";
$database = "database";
$username = "id8190638_gauti";
$password = "gauti123@";

// Create connection
$check=0;
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}
  
mysqli_select_db($conn,"id8190638_mysql");
$sql="SELECT * FROM usercredentials WHERE user_mail_id = '".$mail_id."' and user_pwd ='".$pwd."'   ";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result)) {
    
    $check=1;
    
}
session_start();
$_SESSION['user_id']=$mail_id;
mysqli_close($conn);
if($check==1)
echo 'login success';
?>