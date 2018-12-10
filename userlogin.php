<?php
$mail_id = $_GET['user_id'];
$pwd = $_GET['pwd'];
$servername   = "localhost";
$database = "database";
$username = "gauti";
$password = "gauti123@";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}
  
mysqli_select_db($conn,"mysql");
$sql="SELECT * FROM usercredentials WHERE user_mail_id = '".$mail_id."' and user_pwd ='".$pwd."'   ";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result)) {
    
    echo 'login success';
    
}
session_start();
$_SESSION['user_id']=$mail_id;
mysqli_close($conn);
?>