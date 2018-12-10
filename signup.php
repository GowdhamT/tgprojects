<?php

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

$stmt=$conn->prepare("INSERT INTO USER_DETAILS VALUES (?,?,?,?,?,?,?)");
$stmt->bind_param("sssssss",$name,$mailid,$gender,$dob,$colg,$degree,$dept);

$name=$_POST['uname'];
$mailid=$_POST['email'];
$gender=$_POST['gender'];
$dob=$_POST['dob'];
$colg=$_POST['colg'];
$degree=$_POST['degree'];
$dept=$_POST['dept'];

$user_data=array();



$stmt->execute();

$user_data=array(
 'name'=>$name,
 'mailid'=>$mailid,
 'gender'=>$gender,
 'dob'=>$dob,
 'colg'=>$colg,
 'degree'=>$degree,
 'dept'=>$dept

);

//echo "user details stored";

print_r(json_encode($user_data));


$file_name='user_data.json';

if(file_exists($file_name))
{
$getFile=file_get_contents($file_name);
$fileData=json_decode($getFile);
$fileData[]=$user_data;
$jsonData=json_encode($fileData);
file_put_contents($file_name, $jsonData);
}
else
{
file_put_contents($file_name, json_encode($user_data));

}




$stmt1=$conn->prepare("INSERT INTO USERCREDENTIALS VALUES (?,?)");
$stmt1->bind_param("ss",$mailid,$pwd);
$pwd=$_POST['password'];


$stmt1->execute();

//echo "user credentials stored";

session_start();
$_SESSION['user_id']=$mailid;










?>