<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);



$servername   = "localhost";
$database = "database";
$username = "id8190638_gauti";
$password = "gauti123@";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}
  
mysqli_select_db($conn,"id8190638_mysql");
//$stmt=$conn->prepare("INSERT INTO USER_DETAILS VALUES (?,?,?,?,?,?,?)");

    $name=$_POST['uname'];
$mailid=$_POST['email'];
$gender=$_POST['gender'];
$dob=$_POST['dob'];
$colg=$_POST['colg'];
$degree=$_POST['degree'];
$dept=$_POST['dept'];
if ( $stmt=$conn->prepare("INSERT INTO user_details VALUES (?,?,?,?,?,?,?)") ) {
    $stmt->bind_param("sssssss",$name,$mailid,$gender,$dob,$colg,$degree,$dept);


    
}
else {
    print_r("Errormessage: %s\n", $conn->error);
}

if($stmt->execute())
{
    $stmt->close();
}
else
{
    echo $conn->error;
}



//$stmt->bind_param("sssssss",$name,$mailid,$gender,$dob,$colg,$degree,$dept);
$user_data=array();





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

session_start();
$_SESSION['user_id']=$mailid;



$stmt1=$conn->prepare("INSERT INTO usercredentials VALUES (?,?)");
$stmt1->bind_param("ss",$mailid,$pwd);
$pwd=$_POST['password'];


$stmt1->execute();
$stmt1->close();
//echo "user credentials stored";











?>